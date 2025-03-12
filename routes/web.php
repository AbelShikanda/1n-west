<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UnderConstructionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 */
Route::get('/under_construction', [UnderConstructionController::class, 'underConstruction'])->name('underConstruction');

// Route::get('/sitemap.xml', function () {
//     return response()->file(public_path('sitemap.xml'));
// });

Route::get('/admin_', function () {
    return redirect()->route('dashboard.index');
})
    ->middleware('adminauth');

Route::group(['prefix' => '/admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('postLogin');
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::resource('dashboard', DashboardController::class)->middleware('adminauth');
});

// Route::group(['middleware' => 'adminauth'], function () {
//     Route::resource('colors', ProductColorController::class);
//     Route::resource('sizes', ProductSizeController::class);
//     Route::resource('types', ProductTypeController::class);
//     Route::resource('materials', ProductMaterialController::class);
//     Route::resource('product_categories', ProductCategoryController::class);
//     Route::resource('products', ProductsController::class);
//     Route::resource('product_images', ProductImageController::class);
//     Route::resource('orders', OrdersController::class);
//     Route::resource('order_items', OrderItemsController::class);
//     Route::resource('admins', AdminController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('blogs', BlogController::class);
//     Route::resource('blog_categories', BlogCategoryController::class);
//     Route::resource('blog_images', BlogImageController::class);
//     Route::resource('contact', ContactsController::class);
//     Route::resource('prices', PricesController::class);
//     Route::resource('comment', CommentsController::class);

//     Route::resource('permissions', PermissionsController::class);
//     Route::resource('roles', RolesController::class);

//     Route::get('/promo', [PromoCodeController::class, 'index'])->name('promo.index');
//     Route::get('/create/promo', [PromoCodeController::class, 'create'])->name('promo.create');
//     Route::post('/create-promo', [PromoCodeController::class, 'createPromo'])->name('create.promo');
//     Route::get('/promo-edit/{id}', [PromoCodeController::class, 'edit'])->name('promo.edit');
//     Route::get('/promo-details/{id}', [PromoCodeController::class, 'show'])->name('promo.show');
//     Route::PATCH('/promo-update/{id}', [PromoCodeController::class, 'update'])->name('promo.update');
//     Route::DELETE('/promo-destroy/{id}', [PromoCodeController::class, 'destroy'])->name('promo.destroy');
// });

Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/agent', [PagesController::class, 'agent'])->name('agent');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/properties', [PagesController::class, 'properties'])->name('properties');
