<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\KrepselisController;
use App\Http\Controllers\PrekesController;
use App\Http\Controllers\SusisiekiteController;
use App\Http\Controllers\IkelkPrekeController;

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

// Route::get('/prekes/ikelimas/store', function () {
//     return Storage::disk('local')->put('example2221.txt', 'Labulis gulugis');
// });
// Route::get('/prekes/ikelimas/rodyk', function () {
//     return asset('storage/example2221.txt');
// });

// Route::get('/prekes/ikelimas/ikelk', function () {
//     return view('ikelkPhoto');
// });

Route::get('/prekes/ikelimas', [IkelkPrekeController::class, 'uploadFile']);
Route::post('/prekes/ikelimas', [IkelkPrekeController::class, 'store']);

// Route::get('/prekes/sarasas', function(){
//     return view('prekes/prekiu_sarasas');
// });
Route::get('/prekes/sarasas', [IkelkPrekeController::class, 'index'])->name('prekes.prekiu_sarasas');

Route::post('/prekes/delete', [IkelkPrekeController::class, 'destroy']);

Route::get('/prekes/delete/', [IkelkPrekeController::class, 'destroy']);

Route::get('/prekes/sarasas/search', [IkelkPrekeController::class, 'search'])->name('prekes.sarasas.search');
Route::get('/prekes/sarasas/searchAjax', [IkelkPrekeController::class, 'searchAjax'])->name('prekes.sarasas.searchAjax');
Route::get('/prekes/sarasas/vaizdas', [IkelkPrekeController::class, 'display'])->name('prekes.sarasas.display');
Route::get('/prekes/sarasas/prekeDelete', [IkelkPrekeController::class, 'destroy'])->name('prekes.sarasas.prekeDelete');
Route::get('/prekes/sarasas/prekeShowEdit', [IkelkPrekeController::class, 'show'])->name('prekes.sarasas.prekeShowEdit');

Route::post('/prekes/sarasas/prekeEdit/{preke}', [IkelkPrekeController::class, 'update'])->name('prekes.sarasas.prekeEdit');

Route::post('/prekes/store', [PrekesController::class, 'store']);



Route::get('/poras', function (){
    return view('poras');
});
Route::get('/krepselis/index', [App\Http\Controllers\KrepselisController::class, 'index']);

Route::post('/skaityk', [PrekesController::class, 'skaityk']);

Route::post('/susisiekite/store', [SusisiekiteController::class, 'store']);

