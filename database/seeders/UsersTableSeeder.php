<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
		$tenant = Tenant::first();

        $tenant->users()->create([
			'name' => 'John Doe',
			'email' => 'super@admin.com.br',
			'password' => bcrypt('password'),
		]);
    }
}
