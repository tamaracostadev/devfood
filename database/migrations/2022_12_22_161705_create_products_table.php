<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->uuid('uuid');
			$table->unsignedBigInteger('tenant_id');
			$table->string('title');
			$table->string('flag');
			$table->string('image')->nullable();
			$table->text('description');
			$table->decimal('price', 10, 2);
			$table->timestamps();

			$table->foreign('tenant_id')
				->references('id')
				->on('tenants')
				->onDelete('cascade');
		});

		Schema::create('category_product', function (Blueprint $table) {
			$table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->primary(['category_id', 'product_id']);
		});
	}


	public function down()
	{
		Schema::dropIfExists('category_product');
		Schema::dropIfExists('products');
	}
};
