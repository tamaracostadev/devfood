<?php

namespace App\Providers;

use App\Repositories\{CategoryRepository,
	Contracts\CategoryRepositoryInterface,
	Contracts\ProductRepositoryInterface,
	Contracts\TableRepositoryInterface,
	Contracts\TenantRepositoryInterface,
	ProductRepository,
	TableRepository,
	TenantRepository};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(TenantRepositoryInterface::class, TenantRepository::class);
		$this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
		$this->app->bind(TableRepositoryInterface::class, TableRepository::class);
		$this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
	}

	public function boot()
	{
	}
}
