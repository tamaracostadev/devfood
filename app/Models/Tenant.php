<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
	protected $fillable = ['name', 'url', 'cnpj', 'email', 'logo', 'active', 'subscription', 'expires_at', 'subscription_id', 'subscription_active', 'subscription_suspended'];

	public function users()
	{
		return $this->hasMany(User::class);
	}

	public function plan()
	{
		return $this->belongsTo(Plan::class);
	}

	public function search($filter = null)
	{
		return $this->where(function ($query) use ($filter) {
			if ($filter) {
				$query->where('name', 'LIKE', "%{$filter}%");
				$query->orWhere('url', 'LIKE', "%{$filter}%");
				$query->orWhere('email', 'LIKE', "%{$filter}%");
			}
		})
			->latest()
			->paginate();

	}
}
