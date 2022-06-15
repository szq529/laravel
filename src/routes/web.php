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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ValidateController;
use App\Http\Controllers\ItemController;
use App\Http\Requests\StorePostRequest;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Controllers\DbController;

Route::get('/', function () {
    return view('welcome');
});

// 基本コントローラー
Route::get('hello', [HelloController::class, 'index']);

// middleware
Route::get('hello', [HelloController::class, 'index'])->middleware(HelloMiddleware::class);
// ->middleware(HelloMiddleware::class);
// Route::post('hello', [HelloController::class, 'post']);
// Route::get('hello/other', [HelloController::class, 'other']);

// validate
Route::get('validate', [ValidateController::class, 'index']);
Route::post('validate', function (StorePostRequest $request) {
    return view('hello.validate_rule', ['msg' => '入力されました!']);
});

// db
Route::get('db', [DbController::class, 'index']);
Route::get('add', [DbController::class, 'add']);
Route::post('add', [DbController::class, 'create']);

// 詳細
Route::get('db/show', [DbController::class, 'show']);

// 更新
Route::get('db/edit', [DbController::class, 'edit']);
Route::post('db/edit', [DbController::class, 'update']);

// 削除
Route::get('db/delete', [DbController::class, 'del']);
Route::post('db/delete', [DbController::class, 'remove']);
// }]);
// Route::post('db/', function (DbPostRequest $request) {
//     return view('dbview.db', ['msg' => '入力されました!']);
// });


// item table
Route::get('item', [ItemController::class, 'index']);
Route::get('item/find', [ItemController::class, 'find']);
Route::post('item/find', [ItemController::class, 'search']);

// Model
// Route::get('model', [ModelController::class, 'index']);


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
