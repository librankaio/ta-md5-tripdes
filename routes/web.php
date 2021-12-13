<?php

use App\Http\Controllers\Datamd5Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputDataController;
use App\Http\Controllers\InputDataTrdController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::get('/', [LoginController::class, 'create'])->name('login');
Route::post('/', [LoginController::class, 'postLogin'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function(){
    Route::get('home', [HomeController::class, 'index'])->name('home');
    
    //Input Data TripDes
    Route::get('/inputdatatrd', [InputDataTrdController::class, 'index'])->name('inputdatatrd');
    Route::post('inputdatatrd', [InputDataTrdController::class, 'store'])->name('inputdatatrd');
    Route::post('inputtrd', [InputDataTrdController::class, 'create'])->name('inputtrd');
    Route::get('datatrd', [InputDataTrdController::class, 'show'])->name('datatrd');
    //Daftar Tripdes
    
    //Input Data md5
    Route::get('inputdata', [InputDataController::class, 'index'])->name('inputdata');
    Route::post('inputdatamd5', [InputDataController::class, 'store'])->name('inputdata');
    Route::post('{inputdata}', [InputDataController::class, 'encryptIt'])->name('inputdata');
    //Daftar md5
    Route::get('{karyawans}', [Datamd5Controller::class, 'index'])->name('datamd');
    
    
    //Daftar Data Md5
    // Route::get('')
});

// Route::get('/input', function () {
//     return view('main.input');
// });
// Route::get('/', function () {
//     return view('home');
// });


