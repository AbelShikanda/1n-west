<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnderConstructionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public / Client Web Routes
|--------------------------------------------------------------------------
|
| Only public-facing and authenticated client ("web" guard) routes live
| here. Admin routes are isolated in routes/admin.php and authentication
| routes in routes/auth.php.
|
*/

Route::get('/under_construction', [UnderConstructionController::class, 'underConstruction'])->name('underConstruction');

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/agent', [PagesController::class, 'agent'])->name('agent');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PagesController::class, 'show'])->name('blog.show');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
