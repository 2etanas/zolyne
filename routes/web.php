<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\KrepselisController;
use App\Http\Controllers\PrekesController;
use App\Http\Controllers\SusisiekiteController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('zolyne');
});


Route::get('/krepselis', function () {
    return view('krepselis');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/susisiekite', function () {
    return view('susisiekite');
});

Route::get('/klientai', function () {
    return view('klientai');
});

Route::get('/vartotojai', function () {
    return view('vartotojai');
});


Route::get('/login/create', [ClientController::class, 'create']);

Route::get('/login/index', [ClientController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/prekes/ikelimas', function () {
    return view('prekes/prekes_ikelimas');
});

Route::post('/prekes/store', [PrekesController::class, 'store']);



Route::get('/poras', function (){
    return view('poras');
});
Route::get('/krepselis/index', [App\Http\Controllers\KrepselisController::class, 'index']);

Route::post('/skaityk', [PrekesController::class, 'skaityk']);

Route::post('/susisiekite/store', [SusisiekiteController::class, 'store']);

