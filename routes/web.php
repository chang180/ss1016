<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\TestController;

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

// Route::resource('cars', CarController::class);
Route::resource('admin/photos', PhotoController::class);

Route::get('/', function () {
    $url=route('dev.dev_page1_name');

    return view('welcome');
});

//練習2
//結果
//view
//car.front
//car.page1
//car.page2
//進去front頁面後
//go_page1 a tag => page1
//go_page2 a tag => page2

// 練習五
// cars 增加一個method (public function) test，使其可以用SingleController的方式取用
Route::get('/cars/test',[TestController::class,'test']);
Route::resource('cars', CarController::class);

Route::get('/front', function (){
    return view('car.front');
})->name('front_name');
Route::get('/page1', function (){
    return view('car.page1');
})->name('page1_name');
Route::get('/page2', function (){
    return view('car.page2');
})->name('page2_name');

// 練習2 page1 ,page2 加入返回front
// 將連結加入各別blade檔

//練習3
// /user/55688/name/chang180
//  顯示 hello 55688 chang180 :))
Route::get('/user/{id}/name/{name}',function($id,$name){
  return "Hello $id $name :))";
});

//練習4
// /dev/front a tag
// /dev/dev_page1
// /dev/dev_page2
// dev_page1 and dev_page2 都有a tage 可以回 dev page
// routing prefix

Route::prefix('dev')->name('dev.')->group(function () {
    Route::get('/front', function () {
        return view('dev.front');
    })->name('dev_front_name');

    Route::get('/dev_page1', function () {
        return view('dev.dev_page1');
    })->name('dev_page1_name');

    Route::get('/dev_page2', function () {
        return view('dev.dev_page2');
    })->name('dev_page2_name');
});

Route::get('/single123', [SingleController::class,'single123']);

//練習七
//url
//method
//index
//create
//show
//edit

Route::resource('cruds', CrudController::class)->name('cruds','cruds');