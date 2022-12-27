<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
	use RefreshDatabase;

	public function test_registration_screen_can_be_rendered()
	{
		$response = $this->get('/register');

		$response->assertStatus(200);
	}

	/*	public function test_new_users_can_register()
		{
			
			$plan = \App\Models\Plan::factory()->create();
			session(['plan' => $plan]);
			$response = $this->post('/register', [
				'name' => 'Test User',
				'email' => 'test@example.com',
				'password' => 'password',
				'password_confirmation' => 'password',
				'empresa' => 'Empresa Teste',
				'cnpj' => '33155330000100',

			]);

			$this->assertAuthenticated();

			$response->assertRedirect(RouteServiceProvider::HOME);
		}*/
}
