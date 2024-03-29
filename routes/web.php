<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\ACL\RolePermissionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\DetailPlansController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
	->middleware('auth')
	->group(function () {

		//Routes users
		Route::get('users', [UserController::class, 'index'])->name('users.index');
		Route::get('users/create', [UserController::class, 'create'])->name('users.create');
		Route::post('users', [UserController::class, 'store'])->name('users.store');
		Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
		Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
		Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
		Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
		Route::any('users/search', [UserController::class, 'search'])->name('users.search');

		/* Users > roles*/
		Route::get('users/{id}/roles', [RoleUserController::class, 'roles'])->name('users.roles');
		Route::get('users/{id}/roles/{idRole}/detach', [RoleUserController::class, 'detachRolesUser'])->name('users.roles.detach');
		Route::post('users/{id}/roles/attach', [RoleUserController::class, 'attachRolesUser'])->name('users.roles.attach');
		Route::any('users/{id}/roles/available', [RoleUserController::class, 'rolesAvailable'])->name('users.roles.available');


		/* products > categories */
		Route::get('products/{id}/categories', [CategoryProductController::class, 'categories'])->name('products.categories');
		Route::get('products/{id}/categories/{idCategory}/detach', [CategoryProductController::class, 'detachCategoriesProduct'])->name('products.categories.detach');
		Route::post('products/{id}/categories/attach', [CategoryProductController::class, 'attachCategoriesProduct'])->name('products.categories.attach');
		Route::any('products/{id}/categories/available', [CategoryProductController::class, 'categoriesAvailable'])->name('products.categories.available');
		/* categories > products */
		Route::get('categories/{id}/products', [CategoryProductController::class, 'products'])->name('categories.products');
		Route::get('categories/{id}/products/{idProduct}/detach', [CategoryProductController::class, 'detachProductsCategory'])->name('categories.products.detach');
		Route::post('categories/{id}/products/attach', [CategoryProductController::class, 'attachProductsCategory'])->name('categories.products.attach');
		Route::any('categories/{id}/products/available', [CategoryProductController::class, 'productsAvailable'])->name('categories.products.available');


		/* roles > permissions */
		Route::get('roles/{id}/permissions', [RolePermissionController::class, 'permissions'])->name('roles.permissions');
		Route::get('roles/{id}/permissions/{idPermission}/detach', [RolePermissionController::class, 'detachPermissionsRole'])->name('roles.permissions.detach');
		Route::post('roles/{id}/permissions/attach', [RolePermissionController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');
		Route::any('roles/{id}/permissions/available', [RolePermissionController::class, 'permissionsAvailable'])->name('roles.permissions.available');

		//Routes Roles
		Route::resource('roles', RoleController::class);
		Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');

		//Routes Products
		Route::resource('products', ProductController::class);
		Route::any('products/search', [ProductController::class, 'search'])->name('products.search');

		//Routes Tenants
		Route::resource('tenants', TenantController::class);
		Route::any('tenants/search', [TenantController::class, 'search'])->name('tenants.search');

		//Routes Tables
		Route::resource('tables', TableController::class);
		Route::any('tables/search', [TableController::class, 'search'])->name('tables.search');
		Route::get('tables/qrcode/{identify}', [TableController::class, 'qrcode'])->name('tables.qrcode');

		//Routes Categories
		Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
		Route::resource('categories', CategoryController::class);

		/* plans > profiles */
		Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
		Route::get('plans/{id}/profiles/{idProfile}/detach', [PlanProfileController::class, 'detachPlansProfile'])->name('plans.profiles.detach');
		Route::post('plans/{id}/profiles/attach', [PlanProfileController::class, 'attachPlansProfile'])->name('plans.profiles.attach');
		Route::any('plans/{id}/profiles/available', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');

		/* profiles > plans */
		Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');
		Route::get('profiles/{id}/plans/{idPlan}/detach', [PlanProfileController::class, 'detachProfilesPlan'])->name('profiles.plans.detach');
		Route::post('profiles/{id}/plans/attach', [PlanProfileController::class, 'attachProfilesPlan'])->name('profiles.plans.attach');
		Route::any('profiles/{id}/plans/available', [PlanProfileController::class, 'plansAvailable'])->name('profiles.plans.available');

		/* profile > permissions */
		Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
		Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionsProfile'])->name('profiles.permissions.detach');
		Route::post('profiles/{id}/permissions/attach', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
		Route::any('profiles/{id}/permissions/available', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');

		/* permissions > profile */
		Route::get('permissions/{id}/profiles', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');
		Route::get('permissions/{id}/profiles/{idProfile}/detach', [PermissionProfileController::class, 'detachProfilesPermission'])->name('permissions.profiles.detach');

		Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
		Route::resource('profiles', ProfileController::class);
		Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
		Route::resource('permissions', PermissionController::class);


		// Routes Plans
		Route::prefix('plans')->group(function () {
			/* Routes: Details Plans */
			Route::get('/{url}/details', [DetailPlansController::class, 'index'])->name('details.plan.index');
			Route::get('/{url}/details/create', [DetailPlansController::class, 'create'])->name('details.plan.create');
			Route::post('/{url}/details', [DetailPlansController::class, 'store'])->name('details.plan.store');
			Route::get('/{url}/details/{idDetail}/edit', [DetailPlansController::class, 'edit'])->name('details.plan.edit');
			Route::put('/{url}/details/{idDetail}', [DetailPlansController::class, 'update'])->name('details.plan.update');
			Route::delete('/{url}/details/{idDetail}', [DetailPlansController::class, 'destroy'])->name('details.plan.destroy');


			Route::get('/', [PlanController::class, 'index'])->name('plans.index');
			Route::get('/create', [PlanController::class, 'create'])->name('plans.create');
			Route::post('/store', [PlanController::class, 'store'])->name('plans.store');
			Route::get('/{url}', [PlanController::class, 'show'])->name('plans.show');
			Route::get('/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
			Route::put('/{url}', [PlanController::class, 'update'])->name('plans.update');
			Route::delete('/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
			Route::any('/search', [PlanController::class, 'search'])->name('plans.search');
		});

		Route::get('/', [PlanController::class, 'index'])->name('admin.index');
	});

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');
Route::get('/sobre', function () {
	return view('site.home.index');
})->name('site.sobre');
Route::get('/contato', function () {
	return view('site.home.index');
})->name('site.contato');

require __DIR__ . '/auth.php';
