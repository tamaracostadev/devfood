<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'description'];

	public function search($filter = null)
	{
		return $this->where('name', 'LIKE', "%{$filter}%")
			->orWhere('description', 'LIKE', "%{$filter}%")
			->paginate();
	}

	public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Permission::class);
	}

	public function permissionsAvailable($filter = null)
	{
		return Permission::whereNotIn('id', function ($query) {
			$query->select('permission_role.permission_id');
			$query->from('permission_role');
			$query->whereRaw("permission_role.role_id={$this->id}");
		})
			->where(function ($queryFilter) use ($filter) {
				if ($filter) {
					$queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
				}
			})
			->paginate();
	}

	public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(User::class);
	}
}
