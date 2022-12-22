<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method find($idProfile)
 */
class Profile extends Model
{
	protected $fillable = ['name', 'description'];

	public function search($filter = null){
		return $this->where('name', 'LIKE', "%{$filter}%")
						->orWhere('description', 'LIKE', "%{$filter}%")
						->paginate();

	}

	/**
	 * @return BelongsToMany
	 */
	public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Permission::class);
	}

	public function plans(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Plan::class);
	}

	public function plansAvailable($filter = null)
	{
		return Plan::whereNotIn('plans.id', function($query){
			$query->select('plan_profile.plan_id');
			$query->from('plan_profile');
			$query->whereRaw("plan_profile.profile_id={$this->id}");
		})->where(function($queryFilter) use ($filter){
			if($filter){
				$queryFilter->where('plans.name', 'LIKE', "%{$filter}%");
			}
		})->paginate();
	}

	public function permissionsAvailable($filter = null){
		return Permission::whereNotIn('id', function($query){
			$query->select('permission_id');
			$query->from('permission_profile');
			$query->whereRaw("profile_id={$this->id}");
		})->where(function($queryFilter) use ($filter){
				if($filter){
					$queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
				}
			})
			->paginate();
	}


}
