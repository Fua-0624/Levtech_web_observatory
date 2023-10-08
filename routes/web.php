<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObservatoryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ログイン不要な画面
Route::controller(ObservatoryController::class)->group(function(){
    Route::get('/','home')->name('home');
    Route::get('/observatories/{observatory}/threads','index')->name('index');
});
Route::get('/regions/{region}',[RegionController::class,'region'])->name('region');
Route::get('/threads/{thread}',[ThreadController::class,'detail']);

//ログイン必要な画面
Route::group(['middleware' => ['auth']], function(){
    //ログインしたユーザーのプロフィール
    Route::controller(ProfileCoontroller::class)->group(function(){
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    //SNSの登録・編集
    Route::controller(ObservatoryController::class)->group(function(){
        Route::get('/observatories/registerSNS','registerSNS')->name('registerSNS'); 
        Route::post('/observatories/SNS','store');
        Route::get('/observatories/{observatory}/x/edit','editx');
        Route::put('/observatories/{observatory}/x/update','updatex');
        Route::get('/observatories/{observatory}/instagram/edit','editinsta');
        Route::put('/observatories/{observatory}/instagram/update','updateinsta');    
    });
    //スレッドの作成・編集・削除
    Route::controller(ThreadController::class)->group(function(){
        Route::get('/threads','create')->name('create');
        Route::post('/observatories/threads','store');
        Route::put('/threads/{thread}','update');
        Route::delete('/threads/{thread}','delete');
        Route::get('/threads/{thread}/edit','edit');
    });
    //コメントの作成・編集・削除
    Route::controller(CommentController::class)->group(function(){
        Route::post('/threads/comments','store');
        Route::get('/threads/{thread}/comments/create','create');
    });
});





require __DIR__.'/auth.php';
