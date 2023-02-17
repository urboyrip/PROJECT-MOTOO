<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationTeknisiController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReviewAppController;


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

Route::get('/login', function(){
    return view('login', [
        'page' => 'Login Page',
    ]);
})->name('loginpage')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->name('login');

Route::get('/register',function(){
    return view('register',[
        'page' => 'register'
    ]);
})->middleware('guest');
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', [ApplicationController::class, 'getApplication'])->name('home');
Route::get('/home', [ApplicationController::class, 'getApplication']);

Route::get('/detail/{x}', [ApplicationController::class, 'appDetails']);
Route::post('/addReview', [ReviewAppController::class, 'create'])->name('addReviewApp');

Route::get('/store', [ApplicationController::class, 'searchApp'])->name('SearchApp');
Route::get('/store/filter', [ApplicationController::class, 'filterApp'])->name('filterApp');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/addfavorites',[FavoriteController::class, 'create'])->name('addfav');
    Route::delete('/removefav', [FavoriteController::class, 'destroy'])->name('removefav');

    Route::get('/profile/{x}', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/{x}/edit', [UserController::class, 'viewedit']);
    Route::post('/profile/{x}/edit', [UserController::class, 'edit'])->name('updateData');
    Route::get('/profile/editpassword/{x}', [UserController::class, 'viewEditPW']);
    Route::post('/profile/editpassword/{x}', [UserController::class, 'changePassword'])->name('updatePassword');
});

Route::group(['middleware'=> ['auth','role:Admin']], function(){
    Route::get('/dashboard', [TicketController::class, 'dashboardSite']);
    Route::get('/chart', [TicketController::class, 'Chart']);
    Route::get('/chart/filter', [TicketController::class, 'filterChart'])->name('filterChart');
    Route::get('/report', [TicketController::class, 'reportSite']);
});

Route::group(['middleware'=> ['auth','role:Reporter']], function(){
    Route::get('/dashboard', [TicketController::class, 'dashboardSite']);
    Route::get('/chart', [TicketController::class, 'Chart']);
    Route::get('/chart/filter', [TicketController::class, 'filterChart'])->name('filterChart');
    Route::get('/report', [TicketController::class, 'reportSite']);
});
