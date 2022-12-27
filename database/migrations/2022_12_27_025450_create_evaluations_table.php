<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('order_evaluations',
			function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('order_id');
				$table->unsignedBigInteger('client_id');
				$table->integer('stars');
				$table->text('comment')->nullable();
				$table->timestamps();

				/* Creating a foreign key constraint on the order_id column. */
				$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
				$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
			});
	}

	public function down()
	{
		Schema::dropIfExists('order_evaluations');
	}
};
