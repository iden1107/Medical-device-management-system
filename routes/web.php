<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;

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
Route::get('/login', function () {
    return view('layouts.app');
})->where('any', '.*');


Route::group(['middleware' => 'auth'], function () {
    // apiエンドポイント
    Route::get('/api/user', function (Request $request) {
        return User::where('id', '!=', 9999)->where('status',1)->orderBy('employment_date','asc')->get();
    });
    Route::get('/api/edit/user/{id}', function (Request $request,$id) {
        return User::where('id', $id)->where('status',1)->first();
    });
    Route::get('/api/authUser', function (Request $request) {
        return Auth::user();
    });
    // spaルーティング
    Route::get('/{any}', function () {
        return view('layouts.app');
    })->where('any', '.*');
});

// Route::get('/', function () {
//     return view('layouts.app');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
