<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\EmailsController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/send/mail', [EmailsController::class, 'sendMail']);
});

Route::get('login', function() {
    return redirect('/');
});

Route::get('auth/github', [SocialController::class, 'githubRedirect']);
Route::get('auth/github/callback', [SocialController::class, 'loginWithGithub']);
