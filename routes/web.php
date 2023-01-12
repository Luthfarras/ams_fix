<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\DetailFakturController;

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index']);
    Route::resource('pengguna', UserController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('faktur', FakturController::class);
    Route::resource('detailfaktur', DetailFakturController::class);
    Route::resource('pajak', PajakController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('setoran', SetoranController::class);
    Route::resource('stok', StokController::class);
    
    Route::get('barang/{barang}', [BarangController::class, 'destroy']);
    Route::get('distributor/{distributor}', [DistributorController::class, 'destroy']);
    Route::get('customer/{customer}', [CustomerController::class, 'destroy']);
    Route::get('faktur/{faktur}', [FakturController::class, 'destroy']);
    Route::get('dfaktur/{detailfaktur}', [DetailFakturController::class, 'destroy']);
    Route::get('pajak/{pajak}', [PajakController::class, 'destroy']);
    Route::get('penjualan/{penjualan}', [PenjualanController::class, 'destroy']);
    Route::get('setoran/{setoran}', [SetoranController::class, 'destroy']);
    Route::get('stok/{stok}', [StokController::class, 'destroy']);
    Route::get('pengguna/{pengguna}', [UserController::class, 'destroy']);
    
    Route::get('getharga', [DetailFakturController::class, 'getHarga']);
    Route::get('getbarang/{id}', [DetailFakturController::class, 'getBarang']);
    Route::get('getname/{id}', [FakturController::class, 'getNama']);
    Route::get('gettotal/{id}', [FakturController::class, 'getTotal']);
    
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
