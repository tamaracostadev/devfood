<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService
{
	protected $clientRepository;

	public function __construct(ClientRepositoryInterface $client)
	{
		$this->clientRepository = $client;
	}

	public function createNewClient(array $data)
	{
		return $this->clientRepository->createNewClient($data);
	}

	public function getClient(int $id)
	{
		return $this->clientRepository->getClient($id);
	}

	public function updateClient(array $data, int $id)
	{
		return $this->clientRepository->updateClient($data, $id);
	}

	public function deleteClient(int $id)
	{
		return $this->clientRepository->deleteClient($id);
	}
}
