<?php

namespace App\Providers;

use App\Repositories\{CategoryRepository,
	Contracts\CategoryRepositoryInterface,
	Contracts\TenantRepositoryInterface,
	TenantRepository};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(TenantRepositoryInterface::class, TenantRepository::class);
		$this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
	}

	public function boot()
	{
	}
}
