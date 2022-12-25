<?php

namespace App\Models;

use App\Models\Traits\UserACLTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, UserACLTrait;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'tenant_id',

	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function search($filter = null)
	{
		return $this->where(function ($query) use ($filter) {
			if ($filter) {
				$query->where('name', 'LIKE', "%{$filter}%");
				$query->orWhere('email', $filter);
			}
		})
			->paginate();
	}

	public function tenant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Tenant::class);
	}

	public function scopeTenantUser(Builder $query): \Illuminate\Database\Eloquent\Builder
	{
		return $query->where('tenant_id', auth()->user()->tenant_id);
	}

	public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Role::class);
	}

	public function rolesAvailable($filter = null)
	{
		return Role::whereNotIn('id', function ($query) {
			$query->select('role_user.role_id');
			$query->from('role_user');
			$query->whereRaw("role_user.user_id={$this->id}");
		})
			->where(function ($queryFilter) use ($filter) {
				if ($filter) {
					$queryFilter->where('roles.name', 'LIKE', "%{$filter}%");
				}
			})
			->paginate();
	}
}
