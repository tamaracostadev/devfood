<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method find($id)
 * @method paginate()
 * @method create(array $all)
 */
class Permission extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'description'];

	public function search($filter = null)
	{
		return $this->where('name', 'LIKE', "%{$filter}%")
			->orWhere('description', 'LIKE', "%{$filter}%")
			->paginate();
	}

	public function profiles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Profile::class);
	}

	public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Role::class);
	}

	public function profilesAvailable($filter = null)
	{
		return Profile::whereNotIn('id', function ($query) {
			$query->select('profile_permission.profile_id');
			$query->from('profile_permission');
			$query->whereRaw("profile_permission.permission_id={$this->id}");
		})
			->where(function ($queryFilter) use ($filter) {
				if ($filter) {
					$queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
				}
			})
			->paginate();
	}

}
