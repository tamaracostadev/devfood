<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
	protected $role, $permission;

	public function __construct(Role $role, Permission $permission)
	{
		$this->role = $role;
		$this->permission = $permission;
		$this->middleware(['can:roles', 'can:permissions']);
	}

	public function permissions($idRole)
	{
		$role = $this->role->find($idRole);
		if (!$role) {
			return redirect()->back();
		}
		$permissions = $role->permissions()->paginate();
		return view('admin.pages.roles.permissions.index', compact('role', 'permissions'));
	}

	public function permissionsAvailable($idRole)
	{
		$role = $this->role->find($idRole);
		if (!$role) {
			return redirect()->back();
		}
		$permissions = $role->permissionsAvailable();
		return view('admin.pages.roles.permissions.available', compact('role', 'permissions'));
	}

	public function attachPermissionsRole(Request $request, $idPermission)
	{
		$role = $this->role->find($idPermission);
		if (!$role) {
			return redirect()->back();
		}
		if (!$request->permissions || count($request->permissions) == 0) {
			return redirect()
				->back()
				->with('info', 'Precisa escolher pelo menos uma permissão');
		}
		$role->permissions()->attach($request->permissions);
		return redirect()->route('roles.permissions', $role->id);
	}

	public function detachPermissionsRole($idRole, $idPermission)
	{
		$role = $this->role->find($idRole);
		if (!$role) {
			return redirect()->back();
		}
		$permission = $this->permission->find($idPermission);
		if (!$permission) {
			return redirect()->back();
		}
		$role->permissions()->detach($permission);
		return redirect()->route('roles.permissions', $role->id);
	}


}
