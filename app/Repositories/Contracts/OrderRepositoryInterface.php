<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
	public function createNewOrder(
		string $identify,
		float  $total,
		string $status,
		string $comment,
		int    $tenant_id,
			   $client_id = null,
			   $table_id = null
	);

	public function getOrderByIdentify($identify);

	public function registerProductsOrder($orderId, array $products);

	public function getOrdersByClient(?string $clientId);


}
