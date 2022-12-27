<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository implements Contracts\ClientRepositoryInterface
{
	protected $entity;

	public function __construct(Client $client)
	{
		$this->entity = $client;
	}

	public function createNewClient(array $data): Client
	{
		$data['password'] = bcrypt($data['password']);
		return $this->entity->create($data);
	}

	public function getClient(int $id)
	{
		return $this->entity->find($id);
	}

	public function updateClient(array $data, int $id)
	{
		$client = $this->getClient($id);
		$client->update($data);
		return $client;
	}

	public function deleteClient(int $id)
	{
		$client = $this->getClient($id);
		$client->delete();
		return $client;
	}


}
