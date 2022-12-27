<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class OrderService
{
	protected $orderRepository, $tableRepository, $clientRepository, $productRepository, $tenantRepository;

	public function __construct(OrderRepositoryInterface   $orderRepository,
								TableRepositoryInterface   $tableRepository,
								ClientRepositoryInterface  $clientRepository,
								ProductRepositoryInterface $productRepository,
								TenantRepositoryInterface  $tenantRepository)
	{
		$this->orderRepository = $orderRepository;
		$this->tableRepository = $tableRepository;
		$this->clientRepository = $clientRepository;
		$this->productRepository = $productRepository;
		$this->tenantRepository = $tenantRepository;
	}

	public function createNewOrder(array $order)
	{
		$productsOrder = $this->getProductsByOrder($order['products']);
		$identify = $this->getIdentifyOrder();
		$total = $this->getTotalOrder($productsOrder);
		$status = 'open';
		$comment = $order['comment'] ?? '';
		$tenantId = $this->getTenantIdByOrder($order['token_company']);
		$clientId = $this->getClientOrder();
		$tableId = $this->getTableIdByOrder($order['table'] ?? null);

		$order = $this->orderRepository->createNewOrder($identify, $total, $status, $comment, $tenantId, $clientId, $tableId);

		$this->orderRepository->registerProductsOrder($order->id, $productsOrder);
		return $order;
	}

	public function getOrderByIdentify(string $identify)
	{
		return $this->orderRepository->getOrderByIdentify($identify);
	}

	public function getOrdersByClient()
	{
		$clientId = $this->getClientOrder();
		return $this->orderRepository->getOrdersByClient($clientId);
	}


	private function getIdentifyOrder(int $qtCharacters = 8): string
	{
		$characters = '#abcdefghilkmnopqrstuvwxyz';
		$numbers = (((date('Ymd') / 12) * 24) * 60) + mt_rand(800, 9999);
		$characters .= $numbers;
		$identify = '';

		for ($i = 0; $i < $qtCharacters; $i++) {
			$identify .= $characters[mt_rand(0, strlen($characters) - 1)];
		}

		if ($this->orderRepository->getOrderByIdentify($identify)) {
			return $this->getIdentifyOrder($qtCharacters + 1);
		}

		return $identify;
	}

	private function getTotalOrder(array $products): float
	{
		$total = 0;

		foreach ($products as $product) {
			$total += $product['price'] * $product['quantity'];
		}

		return $total;
	}

	private function getProductsByOrder(array $productsOrder): array
	{
		$products = [];

		foreach ($productsOrder as $productOrder) {
			$product = $this->productRepository->getProductByUuid($productOrder['identify']);
			$products[] = [
				'product_id' => $product->id,
				'price' => $product->price,
				'quantity' => $productOrder['quantity']
			];
		}

		return $products;
	}

	private function getTenantIdByOrder(string $uuid)
	{
		return $this->tenantRepository->getTenantByUuid($uuid)->id;
	}

	private function getClientOrder(): ?string
	{
		return auth()->check() ? auth()->user()->id : null;
	}

	private function getTableIdByOrder(?string $uuid = null): ?string
	{
		if ($uuid) {
			return $this->tableRepository->getTableByUuid($uuid)->id;
		}
		return $uuid;
	}


}
