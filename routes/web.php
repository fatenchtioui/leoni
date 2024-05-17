<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BaController;
use App\Http\Controllers\DatafinwController;
use App\Http\Controllers\DatarhController;
use App\Http\Controllers\DatavcController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComController;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/
route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('/dd', [DatafinwController::class, 'data'])->middleware(['auth', 'userfin']);
Route::get('/d', [DatafinwController::class, 'da'])->middleware(['auth', 'adminfin']);
route::get('/ajouter',[DatafinwController::class,"ajouter_data"]);
route::get('/ajoute',[DatafinwController::class,"ajouter_dat"]);
route::get('/aj',[BaController::class,"aj"]);
route::get('/afficher',[BaController::class,"afficher"]);
route::get('/exp',[BaController::class,'exp']);
route::get('generateCsv',[BaController::class,'generateCsv'])->name('download.csv');
route::get('generateCs',[BaController::class,'generateCs'])->name('downloade.csv');
route::get('generateC',[BaController::class,'generateC'])->name('downloadee.csv');
route::get('generate',[BaController::class,'generate'])->name('downloadeee.csv');
route::get('/page',[DatavcController::class,'page']);
route::get('/ajo',[DatarhController::class,"ajo"])->name('rh.ajouter');
route::get('/dat',[DatarhController::class,"dat"])->middleware(['auth','adminrh']);
route::get('/datt',[DatarhController::class,"datt"])->middleware(['auth','userrh']);

route::get('/ajou',[DatavcController::class,"ajou"])->name('vc.ajouter');
route::get('/datt',[DatavcController::class,"datt"])->middleware(['auth','adminvc']);
route::get('/dattt',[DatavcController::class,"dattt"])->middleware(['auth','uservc']);

route::post('/import',[AdminController::class,'import'])->name('import');
Route::post('/ajoute/datafinm', [DatafinwController::class, 'store'])->middleware('auth');
route::post('/ajouter/datafinw',[DatafinwController::class,"create"])->middleware("auth");

route::post('/ajou/datarh',[DatarhController::class,"creat"])->middleware("auth");

route::post('/ajouu/datavc',[DatavcController::class,"crea"])->middleware("auth");
Route::post('/aj/ba', [BaController::class, 'cre'])->middleware('auth');
route::get('/fin', [BaController::class, 'fin'])->middleware('auth');
route::get('/vc', [BaController::class, 'vc'])->middleware('auth');
route::get('/rh', [BaController::class, 'rh'])->middleware('auth');

route::get('/ajoo',[AdminController::class,'ajoo']);
Route::post('/add_user',[AdminController::class,'add_user']);
Route::get('/delete_user/{id}',[AdminController::class,'delete_user']);


Route::get('/messages', [ComController::class, 'getMessages'])->name('messages.index');
Route::post('/messages/send', [ComController::class, 'sendMessage'])->name('messages.send');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
