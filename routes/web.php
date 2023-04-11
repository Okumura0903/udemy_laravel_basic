<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('tests/test',[TestController::class , 'index']);

Route::get('shops',[ShopController::class , 'index']);


//Route::get('contacts',[ContactFormController::class,'index'])->name('contacts.index');

//グループ化
Route::prefix('contacts')   //ファイルパス左側をまとめる
    ->middleware(['auth'])  //認証など
    ->controller(ContactFormController::class)  //controller
    ->name('contacts.') //ルート名も左側をまとめて
    ->group(function(){
        Route::get('/','index')->name('index'); //'/'へのアクセス→indexメソッド、ルート名をcontacts.indexにする
        Route::get('/create','create')->name('create'); //'/'へのアクセス→indexメソッド、ルート名をcontacts.indexにする
        Route::post('/','store')->name('store');
        Route::get('/{id}','show')->name('show');
        Route::get('/{id}/edit','edit')->name('edit');
        Route::post('/{id}','update')->name('update');
        Route::post('/{id}/destroy','destroy')->name('destroy');
    });

//7つ一気にルートを作る場合
//Route::resource('contact',ContactFormController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
