<?php

use App\Http\Controllers\api\v1\EventController;
use App\Http\Controllers\api\v1\LoginOtpController;
use App\Http\Controllers\api\v1\MemberController;
use App\Http\Controllers\api\v1\NewsController;
use App\Http\Controllers\api\v1\ProfileController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {
   
    Route::post('login', [LoginOtpController::class, 'login']);
    Route::post('otpVerified', [LoginOtpController::class, 'otpVerified']);
    Route::post('profile', [ProfileController::class, 'EditUser']);
    Route::post('updateprofile/{id}', [ProfileController::class, 'updateprofile']);
    Route::get('members_list', [MemberController::class, 'index']);
    Route::post('add_family_member/{id}', [MemberController::class , 'add_family_member'])->name('add_family_member');
    Route::get('family_member_detail/{id}', [MemberController::class, 'family_member_detail']);
    Route::post('edit_family_member_profile/{id}', [MemberController::class, 'edit_family_member_profile']);
    Route::resource('News', NewsController::class);
    Route::post('news_detail', [NewsController::class, 'news_detail']);
    Route::get('event', [EventController::class, 'index']);
    Route::post('event_detail', [EventController::class, 'event_detail']);

});
