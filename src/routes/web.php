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
use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// 基本コントローラー
Route::get('hello', [HelloController::class, 'index']);
Route::get('hello', [HelloController::class, 'index']);
// ->middleware(HelloMiddleware::class);
Route::get('hello', [HelloController::class, 'index'])->middleware(HelloMiddleware::class);
// Route::post('hello', [HelloController::class, 'post']);
// Route::get('hello/other', [HelloController::class, 'other']);

//テンプレート表示
// Route::get('hello',function(){
//     return view('hello.index');
// });
// Route::get('hello', 'HelloController@index');

// ルートパラメータを設定する
// コントローラーでパラメータを取得
Route::get('sample/{noname}/{pass?}', [SampleController::class, 'index']);


// シングルアクションのアクション
// Route::get('hello', HelloController::class);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
