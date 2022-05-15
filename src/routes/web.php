<?php
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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('welcome');
});

// ルートパラメータを設定する
// コントローラーでパラメータを取得
Route::get('sample/{noname}/{pass?}', [SampleController::class, 'index']);


// 基本コントローラー
Route::get('hello', [HelloController::class, 'index']);

// シングルアクションのアクション
// Route::get('hello', HelloController::class);

// Route::get('hello/other', [HelloController::class, 'other']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
