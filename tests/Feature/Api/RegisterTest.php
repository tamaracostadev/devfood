<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class RegisterTest extends TestCase
{
	public function test_register_new_client_succeed()
	{
		$response = $this->postJson('/api/v1/client', [
			'name' => 'Teste',
			'email' => 'teste@teste.com',
			'password' => '123456',
			'password_confirmation' => '123456',
		]);
		$response->assertStatus(201);

		$response->assertJsonStructure([
			'data' => [
				'name',
				'email',
			]
		]);
	}

	public function test_register_new_client_fail()
	{
		$response = $this->postJson('/api/v1/client', [
			'name' => 'Teste',
			'email' => ''
		]);

		$response->assertStatus(422);

		$response->assertJsonValidationErrors([
			'email',
			'password',
		]);

	}


}
