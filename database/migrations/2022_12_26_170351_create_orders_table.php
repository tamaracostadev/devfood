<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('tenant_id');
			$table->string('identify')->unique();
			$table->integer('client_id')->nullable();
			$table->integer('table_id')->nullable();
			$table->double('total', 10, 2);
			$table->enum('status', ['open', 'done', 'rejected', 'working', 'canceled', 'delivering']);
			$table->text('comment')->nullable();
			$table->timestamps();
			$table->foreign('tenant_id')
				->references('id')
				->on('tenants');
		});

		Schema::create('order_product', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('order_id');
			$table->unsignedInteger('product_id');
			$table->integer('quantity');
			$table->double('price', 10, 2);
			$table->foreign('order_id')
				->references('id')
				->on('orders');
			$table->foreign('product_id')
				->references('id')
				->on('products');
		});
	}

	public function down()
	{
		Schema::dropIfExists('order_product');
		Schema::dropIfExists('orders');
	}
};
