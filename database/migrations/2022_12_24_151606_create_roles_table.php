<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('roles', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->text('description')->nullable();
			$table->timestamps();
		});

		/* Pivot table permission x roles */
		Schema::create('permission_role', function (Blueprint $table) {
			$table->id();
			$table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
			$table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('permission_role');
		Schema::dropIfExists('roles');
	}
};
