<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	protected $repository;

	public function __construct(User $user)
	{
		$this->repository = $user;
		$this->middleware(['can:users']);
	}

	public function index()
	{
		$users = $this->repository->latest()->tenantUser()->paginate();

		return view('admin.pages.users.index', [
			'users' => $users
		]);
	}

	public function create()
	{
		return view('admin.pages.users.create');
	}

	public function store(StoreUpdateUser $request)
	{
		$tenant = auth()->user()->tenant;
		$data = $request->all();
		$data['tenant_id'] = $tenant->id;
		$data['password'] = Hash::make($data['password']);
		$this->repository->create($data);

		return redirect()->route('users.index');
	}

	public function show($id)
	{
		$user = $this->repository->where('id', $id)->latest()->tenantUser()->first();

		if (!$user) {
			return redirect()->back();
		}

		return view('admin.pages.users.show', [
			'user' => $user
		]);
	}

	public function edit($id)
	{
		$user = $this->repository->where('id', $id)->latest()->tenantUser()->first();

		if (!$user) {
			return redirect()->back();
		}

		return view('admin.pages.users.edit', [
			'user' => $user
		]);
	}

	public function update(StoreUpdateUser $request, $id)
	{
		$user = $this->repository->where('id', $id)->latest()->tenantUser()->first();

		if (!$user) {
			return redirect()->back();
		}
		$data = $request->only('name', 'email');
		if ($request->password) {
			$data['password'] = Hash::make($request->password);
		}
		$user->update($data);

		return redirect()->route('users.index');
	}

	public function destroy($id)
	{
		$user = $this->repository->where('id', $id)->latest()->tenantUser()->first();

		if (!$user) {
			return redirect()->back();
		}

		$user->delete();

		return redirect()->route('users.index');
	}

	public function search(Request $request)
	{
		$filters = $request->except('_token');

		$users = $this->repository->latest()->tenantUser()->search($request->filter);

		return view('admin.pages.users.index', [
			'users' => $users,
			'filters' => $filters
		]);
	}

}
