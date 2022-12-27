<?php

namespace App\Tenant\Rules;

use App\Tenant\ManagerTenant;
use Illuminate\Contracts\Validation\Rule;

class  UniqueTenantRule implements Rule
{
	private $table;
	private $column;
	private $value;

	public function __construct(string $table, $value = '', string $column = 'id')
	{
		$this->table = $table;
		$this->column = $column;
		$this->value = $value;
	}

	public function passes($attribute, $value): bool
	{
		$tenantId = app(ManagerTenant::class)->getTenantIdentify();

		$exists = \DB::table($this->table)
			->where($attribute, $value)
			->where('tenant_id', $tenantId)
			->first();

		if ($exists && $exists->{$this->column} != $this->value)
			return true;

		return is_null($exists);
	}

	public function message(): string
	{
		return "The :attribute has already been taken.";
	}
}
