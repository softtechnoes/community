<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubcategoriesController;
use App\Http\Controllers\Admin\AddmemberController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use League\Flysystem\Config;
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

Route::get('clear-cache', function() {
    Artisan::call('optimize');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'cleared';
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', function () {
    return view('auth.login');
});


Auth::routes();
Route::get('logout', [LoginController::class, 'logout'])->name('get_logout');
Route::group(['middleware' =>  ['auth', 'admin']], function() {
    Route::get('/', [DashboardController::class,'index']);
    Route::get('dashboard', [DashboardController::class,'index'])->name('admin_dashboard'); 
    Route::resource('fetch_users', UserController::class);
    Route::get('remove_user/{id}', [UserController::class, 'remove_user']);  
    Route::get('create_user', [UserController::class, 'create_user'])->name('create_user'); 
    Route::resource('categories', CategoriesController::class);
    Route::get('remove_categories/{id}', [CategoriesController::class, 'remove_categories'])->name('remove_categories');
    Route::resource('subcategories', SubcategoriesController::class);
    Route::get('show_image/{id}', [SubcategoriesController::class, 'show_image']);
    Route::get('remove_subcategories/{id}', [SubcategoriesController::class, 'remove_subcategories'])->name('remove_subcategories');
    Route::get('add_family/{id}', [AddmemberController::class,'index']);
    Route::post('add_family/{id}', [AddmemberController::class, 'add_family'])->name('add_family');
    Route::get('view_family/{id}', [AddmemberController::class,'view_family'])->name('view_family');
    Route::get('remove_member/{id}', [AddmemberController::class,'remove_member']);
    Route::get('member_edit/{id}', [AddmemberController::class,'member_edit'])->name('member_edit');
    Route::put('member_update/{id}', [AddmemberController::class,'member_update'])->name('member_update');
    Route::resource('news', NewsController::class);
    Route::get('newsList', [NewsController::class, 'newsList'])->name('newsList');
    Route::get('news_remove/{id}', [NewsController::class, 'news_remove'])->name('news_remove');
    Route::get('news_image/{id}', [NewsController::class, 'News_image']);
    Route::resource('event',EventController::class);
    Route::get('remove_event/{id}',[EventController::class, 'remove_event']);
    Route::get('event_list', [EventController::class, 'event_list'])->name('event_list');

});

Route::group(['middleware' =>  ['auth', 'user']], function() {
    Route::get('user_dashboard', [DashboardController::class,'index'])->name('user_dashboard');
});
