<?php

return [
	'model' => App\Models\Tenant::class,
	'admin_email' => env('TENANT_ADMIN_EMAIL', 'super@admin.com.br'),
	'admins' => [
		'super@admin.com.br',
	],
];
