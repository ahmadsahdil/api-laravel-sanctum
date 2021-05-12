<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Gurucontroller;

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

// Route::get('/', function () {
//     return view('tes');
// });

Route::get('/',[Homecontroller::class,'index']);
Route::get('guru',[Gurucontroller::class,'index'])->name('guru');
Route::get('guru/detail/{id}',[Gurucontroller::class,'detail']);
Route::get('guru/add',[Gurucontroller::class,'add']);
Route::post('guru/insert',[Gurucontroller::class,'insert']);
Route::get('guru/edit/{id}',[Gurucontroller::class,'edit']);
Route::post('guru/update/{id}',[Gurucontroller::class,'update']);
Route::get('guru/delete/{id}',[Gurucontroller::class,'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

