<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

// api的なエンドポイント
Route::group(['middleware' => 'auth'], function () {
    Route::get('/api/user', function (Request $request) {
        return User::all();
    });
    Route::get('/api/authUser', function (Request $request) {
        return Auth::user();
    });
});

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '.*');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
