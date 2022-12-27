<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
	public function createNewClient(array $data);

	public function getClient(int $id);

	public function updateClient(array $data, int $id);

	public function deleteClient(int $id);

}
