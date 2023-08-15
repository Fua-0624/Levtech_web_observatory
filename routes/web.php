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


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::controller(ObservatoryController::class)->group(function(){
    Route::get('/','home')->name('home');
    Route::get('/observatories/{observatory}/threads','index')->name('index');
    Route::get('/observatories/registerSNS','registerSNS')->name('registerSNS');
    Route::post('/observatories/SNS','store');
    Route::put('/observatories/{observatory}','update');
    Route::delete('/observatories/{obseravtory}','delete');
    Route::get('/observatories/{observatory}/edit','edit');
});

Route::get('/regions/{region}',[RegionController::class,'region'])->name('region');

Route::controller(ThreadController::class)->group(function(){
    Route::post('/observatories/threads','store');
    Route::get('/threads/create','create')->name('create');
    Route::get('/threads/{thread}','detail');
    Route::put('/threads/{thread}','update');
    Route::delete('/threads/{thread}','delete');
    Route::get('/threads/{thread}/edit','edit');
});

Route::controller(CommentController::class)->group(function(){
    Route::post('/threads/comments','store');
    Route::get('/threads/{thread}/comments/create','create');
});

require __DIR__.'/auth.php';
