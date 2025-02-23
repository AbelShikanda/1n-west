<?php

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

Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/agent', [PagesController::class, 'agent'])->name('agent');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/properties', [PagesController::class, 'properties'])->name('properties');
