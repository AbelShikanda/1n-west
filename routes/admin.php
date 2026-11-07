<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\BlogCategoriesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogImagesController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\PropertyCategoriesController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyImagesController;
use App\Http\Controllers\Admin\PropertyTypesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Every admin route is isolated under the /admin prefix and (except the
| authentication screens) protected by the dedicated "admin" guard via the
| adminauth middleware. Names are kept backwards-compatible with the views.
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('postLogin');
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');

    Route::middleware('adminauth')->group(function () {
        Route::redirect('/', '/admin/dashboard');

        Route::resource('dashboard', DashboardController::class)->only('index');
        Route::resource('property-categories', PropertyCategoriesController::class);
        Route::resource('property-types', PropertyTypesController::class);
        Route::resource('blog-categories', BlogCategoriesController::class);
        Route::resource('roles', RolesController::class)->middleware('role:Super Admin,admin');
        Route::resource('permissions', PermissionsController::class)->middleware('role:Super Admin,admin');
        Route::resource('contacts', ContactsController::class)->only(['index', 'show', 'destroy'])->names('admin.contacts');
        Route::resource('properties', PropertyController::class)->names('admin.properties');
        Route::resource('property-images', PropertyImagesController::class)->names('admin.property-images');
        Route::resource('admins', AdminController::class)->names('admin.admins');
        Route::resource('users', UserController::class)->names('admin.users');
        Route::resource('blogs', BlogController::class)->names('admin.blogs');
        Route::resource('blog-images', BlogImagesController::class)->names('admin.blog-images');

        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
    });
});
