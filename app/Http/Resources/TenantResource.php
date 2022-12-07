<?php

namespace App\Http\Resources;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Tenant */
class TenantResource extends JsonResource
{
	/**
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
			'uuid' => $this->uuid,
			'name' => $this->name,
			'email' => $this->email,
			'logo' => $this->logo ? url("storage/$this->logo") : null,
			'active' => $this->active,
			'date_created' => Carbon::parse($this->created_at)->format('d/m/Y'),
		];
		
	}
}
