<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('permission_profile', function (Blueprint $table) {
			$table->id();
			$table->unsignedInteger('permission_id');
			$table->unsignedInteger('profile_id');
			$table->foreign('permission_id')
				->references('id')
				->on('permissions')
				->onDelete('cascade');
			$table->foreign('profile_id')
				->references('id')
				->on('profiles')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('permission_profile');
	}
};
