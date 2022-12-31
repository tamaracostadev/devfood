<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('categories', function (Blueprint $table) {
			$table->id();
			$table->uuid('uuid');
			$table->unsignedInteger('tenant_id');
			$table->string('name');
			$table->string('url');
			$table->text('description')->nullable();
			$table->timestamps();

			$table->foreign('tenant_id')
				->references('id')
				->on('tenants')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('categories');
	}
};
