<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('tables', function (Blueprint $table) {
			$table->id();
			$table->uuid('uuid');
			$table->string('identify')->unique();
			$table->string('description')->nullable();
			$table->string('status')->default('available');
			$table->unsignedBigInteger('tenant_id');
			$table->timestamps();

			$table->foreign('tenant_id')
				->references('id')
				->on('tenants')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('tables');
	}
};
