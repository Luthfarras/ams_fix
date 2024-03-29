<?php

use App\Models\Stok;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\DetailFakturController;
use App\Http\Controllers\DetailProfilController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    
});

Route::middleware(['auth', 'Owner'])->group(function () {
    Route::resource('pengguna', UserController::class);
    Route::get('pengguna/{pengguna}', [UserController::class, 'destroy']);
    
});


Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index']);
    Route::get('profil', [DetailProfilController::class, 'index']);
    Route::post('profil/{pengguna}', [UserController::class, 'gantiPassword']);
    Route::resource('barang', BarangController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('faktur', FakturController::class);
    Route::resource('detailfaktur', DetailFakturController::class);
    Route::resource('pajak', PajakController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('setoran', SetoranController::class);
    Route::resource('stok', StokController::class);
    Route::resource('detailprofil', DetailProfilController::class);
    Route::resource('satuan', SatuanController::class);
    Route::resource('notes', NotesController::class);

    // EXPORT & IMPORT
        // BARANG
        Route::get('barangexport', [BarangController::class, 'barangExport']);
        Route::post('barangimport', [BarangController::class, 'barangImport'])->name('barangimport');

        // SATUAN
        Route::get('satuanexport', [SatuanController::class, 'satuanExport']);
        Route::post('satuanimport', [SatuanController::class, 'satuanImport'])->name('satuanimport');

        // CUSTOMER
        Route::get('customerexport', [CustomerController::class, 'customerExport']);
        Route::post('customerimport', [CustomerController::class, 'customerImport'])->name('customerimport');

        // DISTRIBUTOR
        Route::get('distributorexport', [DistributorController::class, 'distributorExport']);
        Route::post('distributorimport', [DistributorController::class, 'distributorImport'])->name('distributorimport');

    
    // DELETE
    // Route::get('barang/{barang}', [BarangController::class, 'destroy']);
    // Route::get('distributor/{distributor}', [DistributorController::class, 'destroy']);
    // Route::get('customer/{customer}', [CustomerController::class, 'destroy']);
    // Route::get('faktur/{faktur}', [FakturController::class, 'destroy']);
    // Route::get('dfaktur/{detailfaktur}', [DetailFakturController::class, 'destroy']);
    // Route::get('pajak/{pajak}', [PajakController::class, 'destroy']);
    // Route::get('penjualan/{penjualan}', [PenjualanController::class, 'destroy']);
    // Route::get('setoran/{setoran}', [SetoranController::class, 'destroy']);
    // Route::get('stok/{stok}', [StokController::class, 'destroy']);
    // Route::get('satuan/{satuan}', [SatuanController::class, 'destroy']);
    // Route::get('penjualan/{penjualan}', [PenjualanController::class, 'destroy']);

    // AJAX
    Route::get('getharga', [DetailFakturController::class, 'getHarga']);
    Route::get('getbarang/{id}', [DetailFakturController::class, 'getBarang']);
    Route::get('getname/{id}', [FakturController::class, 'getNama']);
    Route::get('getbfaktur/{id}', [FakturController::class, 'getBarang']);

    Route::get('status/{penjualan}', [PenjualanController::class, 'status']);
    Route::get('statnotes/{notes}', [NotesController::class, 'status']);
    Route::get('delnotes/{notes}', [NotesController::class, 'destroy']);

    // Print 
        // Pendataan
        Route::get('printcust', [CustomerController::class, 'printCust']);
        Route::get('printdist', [DistributorController::class, 'printDist']);
        Route::get('printbarang', [BarangController::class, 'printBarang']);
        
        // Menu
        Route::get('printsetoran', [SetoranController::class, 'printSetoran']);
        Route::get('printstok', [StokController::class, 'printStok']);
        Route::get('printpenjualan/{id}', [PenjualanController::class, 'printPenjualan']);
        Route::get('printpajak', [PajakController::class, 'printPajak']);
        Route::get('printfaktur/{id}', [FakturController::class, 'printFaktur']);
    
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
