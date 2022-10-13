<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\CompanyController;
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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::group(['middleware'=>'auth'],function(){
    Route::get('panel',[MainController::class,'dashboard'])->name('dashboard');
    Route::get('stock/detay/{id}',[MainController::class,'stock_detail'])->name('stock.detail');
});


//Yönetim Paneli
Route::group(['middleware' =>['auth','isAdmin'] , 'prefix'=>'admin'],function(){
    
    Route::get('stock/{id}',[StockController::class,'destroy'])->whereNumber('id')->name('stock.destroy'); 
    Route::resource('stock',StockController::class);
    
});