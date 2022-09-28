<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelToPdfController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return redirect()->route('upload');
});

Route::get('/',[ExcelToPdfController::class,'home'])->name('upload');
Route::post('/',[ExcelToPdfController::class,'process'])->name('upload');
Route::get('/preview/dummy',[ExcelToPdfController::class,'dummyPreview'])->name('dummyPreview');

Route::get('/admin',[AdminController::class,'adminPanel'])->name('admin');
Route::get('/admin/token/{numberOfToken}',[AdminController::class,'tokenGenerate'])->name('tokenGen');

Route::get('/token/status/reserve/{token_id}',[AdminController::class,'updateTokenStatus']);
// Route::get('/token/delete/{token_id}',[AdminController::class,'deleteToken']);

Route::get('/user/token/validation',[AdminController::class,'tokenCheck'])->name('tokenCheck');
Route::post('/user/token/validation',[AdminController::class,'tokenCheckValidate'])->name('tokenCheckPost');

Route::get('/process',[ExcelToPdfController::class,'excelToSticker'])->name('process');

// Auth::routes();

Auth::routes(['register' => false]);
