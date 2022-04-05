<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SettingController;

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

// ログイン画面のみ認証外
    Route::get('/', function () {
        return view('layouts.app');
    })->where('any', '.*');


Route::group(['middleware' => 'auth'], function () {
    // ユーザー関連
    Route::get('/api/user', [RegisteredUserController::class, 'getUsers']);
    Route::get('/api/authUser', [RegisteredUserController::class, 'getAuthUser']);
    Route::get('/api/edit/user/{id}', [RegisteredUserController::class, 'getUser']);
    Route::post('/api/update/user/{id}', [RegisteredUserController::class, 'updateUser']);
    Route::post('/api/delete/user/{id}', [RegisteredUserController::class, 'deleteUser']);
    // 機器関連
    Route::get('/api/getDevices', [DeviceController::class ,'getDevices']);
    Route::get('/api/getDevice/{id}', [DeviceController::class ,'getDevice']);
    Route::get('/api/getDevicesByLocation', [DeviceController::class ,'getDevicesByLocation']);
    Route::post('/api/createDevice', [DeviceController::class , 'createDevice']);
    Route::post('/api/updateDevice', [DeviceController::class , 'updateDevice']);
    Route::post('/api/updateLocation', [DeviceController::class , 'updateLocation']);
    // 設定関連
    Route::get('/api/setting', [SettingController::class, 'getSetting']);
    Route::post('/api/updateSetting', [SettingController::class, 'updateSetting']);
    // spaルーティング
    Route::get('/{any}', function () {
        return view('layouts.app');
    })->where('any', '.*');
});

require __DIR__.'/auth.php';

