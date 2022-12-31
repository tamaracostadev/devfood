<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('tenants', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->unsignedInteger('plan_id');
			$table->uuid('uuid');
			$table->string('email')->unique();
			$table->string('logo')->nullable();
			$table->string('cnpj')->unique();
			$table->string('url')->unique();

			// Status do Tenant (Ativo, Inativo)
			$table->enum('active', ['Y', 'N'])->default('Y');

			// Subscription
			$table->date('subscription')->nullable(); // Data de inscrição
			$table->date('expires_at', 20)->nullable(); // Data de expiração
			$table->integer('subscription_id')->nullable(); // Identificador da assinatura
			$table->boolean('subscription_active')->default(false); // Assinatura ativa?
			$table->boolean('subscription_suspended')->default(false); // Assinatura suspensa?

			$table->timestamps();

			$table->foreign('plan_id')
				->references('id')
				->on('plans')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('tenants');
	}
};
