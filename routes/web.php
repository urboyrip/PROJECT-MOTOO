<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationTeknisiController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TaskController;
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
Route::post('/editReview', [ReviewAppController::class, 'edit'])->name('editReviewApp');

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

Route::group(['middleware'=> ['auth','admin_or_reporter']], function(){
    Route::get('/dashboard', [TicketController::class, 'dashboardSite']);
    Route::get('/chart', [TicketController::class, 'Chart']);
    Route::get('/chart/filter', [TicketController::class, 'filterChart'])->name('filterChart');
    Route::get('/report', [TicketController::class, 'reportSite']);
    Route::get('/dashboard/detail_tiket_teknisi/{x}', [TicketController::class, 'detailTeknisi']);
    Route::get('/dashboard/detail_task_teknisi/{x}', [TaskController::class, 'detailTeknisi']);
});


Route::group(['middleware'=> ['auth', 'role:Admin']], function(){
    Route::get('/data-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/data');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getDataTicket');

    Route::get('/data-task-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/task/data');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getDataTask');

    Route::get('/jumlah-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-tiket');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTiket');

    Route::get('/jumlah-closed-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-closed');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTiketClosed');

    Route::get('/jumlah-canceled-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-canceled');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTiketCanceled');

    Route::get('/jumlah-approved-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-approved');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTiketApproved');

    Route::get('/jumlah-incident-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-incident');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTiketIncident');

    Route::get('/jumlah-request-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-request');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTiketRequest');

    Route::get('/jumlah-SLAPoints-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/SLAPoints');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTiketClosed');

    Route::get('/jumlah-IncidentClosed-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/IncidentClosed');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahIncidentClosed');

    Route::get('/jumlah-RequestClosed-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/RequestClosed');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahRequestClosed');

    Route::get('/jumlah-RequestCanceled-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/RequestCanceled');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahRequestCanceled');

    Route::get('/jumlah-IncidentCanceled-tiket-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/IncidentCanceled');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahIncidentCanceled');

    Route::get('/jumlah-task-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/task/jumlah-task');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTask');

    Route::get('/jumlah-task-closed-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/task/jumlah-closed');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTaskClosed');

    Route::get('/jumlah-task-SLApoints-nestjs', function(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/task/SLAPoints');
        return response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
    })->name('getJumlahTaskSLAPoints');

    Route::get('/jumlah-technician-tiket', function () {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-technician');
        return response($response->getBody(), $response->getStatusCode())
            ->header('Content-Type', 'application/json');
    });

    Route::get('/jumlah-technician-task', function () {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/task/jumlah-technician');
        return response($response->getBody(), $response->getStatusCode())
            ->header('Content-Type', 'application/json');
    });
});

    