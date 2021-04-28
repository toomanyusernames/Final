<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CHAT
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->middleware('auth')->name('chat.index');
Route::get('/chat/{id}', [App\Http\Controllers\ChatController::class, 'show'])->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', [App\Http\Controllers\ChatController::class, 'getChat'])->middleware('auth');
Route::post('/chat/sendChat', [App\Http\Controllers\ChatController::class, 'sendChat'])->middleware('auth');

//CAPTCHA
Route::get('contact-form-captcha', [App\Http\Controllers\CaptchaValidationController::class, 'index']);
Route::get('captcha-validation', [App\Http\Controllers\CaptchaValidationController::class, 'capthcaFormValidate']);
Route::get('reload-captcha', [App\Http\Controllers\CaptchaValidationController::class, 'reloadCaptcha']);

//CHATBOTMAN
Route::get('/', function(){
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', 'BotmanController@handle');

//POST AND SUCH
Route::get('/post', [App\Http\Controllers\PostController::class, 'index']);
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->middleware('auth');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store']);



