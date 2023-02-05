<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\KrepselisController;
use App\Http\Controllers\PrekesController;
use App\Http\Controllers\SusisiekiteController;
use App\Http\Controllers\IkelkPrekeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VartotojaiController;
use App\Http\Controllers\ApmokejimasController;





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
// Route::get('/', function () {
//     return view('zolyne', [IkelkPrekeController::class, 'index'])->name('prekes.prekiu_sarasas');
// });

Route::get('/', [PrekesController::class, 'index']);



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


Route::get('/vartotojas', [VartotojaiController::class, 'index'])->name('vartotojai.vartotojai');
Route::get('/vartotojas/sukurti', [VartotojaiController::class, 'create'])->name('vartotojai.papildyti');
Route::post('/vartotojas/atnaujinti', [VartotojaiController::class, 'store'])->name('vartotojai.atnaujinti');
Route::get('/vartotojas/pakeisti', [VartotojaiController::class, 'edit'])->name('vartotojai.edit');

Route::post('/vartotojas/update', [VartotojaiController::class, 'update'])->name('vartotojai.update');


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

Route::get('/prekes/ikelimas', [IkelkPrekeController::class, 'uploadFile'])->name('prekes.ikelimas');
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







Route::post('/susisiekite/store', [SusisiekiteController::class, 'store']);

Route::prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('auth');
    Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
    Route::post('/store', [UserController::class, 'store'])->name('users.store')->middleware('auth');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
    Route::post('/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
    Route::get('/show/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
});

Route::prefix('permissions')->group(function(){
    Route::get('/', [PermissionController::class, 'index'])->name('permissions.index')->middleware('auth');
    Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create')->middleware('auth');
    Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store')->middleware('auth');
    Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('auth');
    Route::post('/update/{id}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('auth');
    Route::post('/destroy/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('auth');
    Route::get('/show/{id}', [PermissionController::class, 'show'])->name('permissions.show')->middleware('auth');
});

Route::prefix('roles')->group(function(){
    Route::get('/', [RoleController::class, 'index'])->name('roles.index')->middleware('auth');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create')->middleware('auth');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store')->middleware('auth');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('auth');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('auth');
    Route::post('/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('auth');
    Route::get('/show/{id}', [RoleController::class, 'show'])->name('roles.show')->middleware('auth');
});


Route::prefix('krepselis')->group(function(){
    Route::get('/', [KrepselisController::class, 'index'])->name('krepselis');
    Route::post('/prideti', [KrepselisController::class, 'create'])->name('krepselis.prideti')->middleware('auth');
    Route::post('/destroy/{id}', [KrepselisController::class, 'destroy'])->name('krepselis.destroy')->middleware('auth');
    Route::post('/update/{id}', [KrepselisController::class, 'update'])->name('krepselis.update')->middleware('auth');
    
});
Route::post('/', [KrepselisController::class, 'store'])->name('krepselis.p')->middleware('auth');



Route::post('krepselis/apmokejimas', [ApmokejimasController::class, 'index'])->name('krepselis.apmokejimas')->middleware('auth');
Route::post('krepselis/saskaita', [ApmokejimasController::class, 'store'])->name('apmokejimas.saskaita')->middleware('auth');
