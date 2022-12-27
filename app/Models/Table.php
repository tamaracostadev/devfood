<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
	use TenantTrait, HasFactory;

	protected $fillable = [
		'identify',
		'description',
		'status',
		'tenant_id',
	];

	public function search($filter = null)
	{
		$results = $this->where('identify', 'LIKE', "%{$filter}%")
			->orWhere('description', 'LIKE', "%{$filter}%")
			->latest()
			->paginate();

		return $results;
	}


}
