<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan seluruh data pada tabel customer
        $cust = Customer::all();
        
        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman customer dengan membawa data yang sudah dideklarasikan
        return view('pendataan.customer', compact('cust', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'nama_customer' => 'required',
            'kode_customer' => 'required|unique:customers',
            'telepon_customer' => 'required',
            'alamat_customer' => 'required',
        ]);

        // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if($validator->fails()){
            // Menampilkan Alert Gagal
            Alert::toast('Gagal Menyimpan Data Customer', 'error');
        } 
        
        // Jika Berhasil
        else {
            // Menampilkan Alert Success
            Alert::toast('Berhasil Menyimpan Data Customer', 'success');

            // Dan Data akan dibuat dan dimasukkan ke tabel customer
            Customer::create($request->all());
        }

        // Setelah salah satu kondisi terpenuhi akan dialihkan ke halaman customer
        return redirect('customer');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'nama_customer' => 'required',
            'kode_customer' => 'required',
            'telepon_customer' => 'required',
            'alamat_customer' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal 
        if($validator->fails()){
            // Menampilkan Alert Errir
            Alert::toast('Gagal Mengubah Data Customer', 'error');
        } 
        
        // Jika Berhasil
        else {
            // Menampilkan Alert Success
            Alert::toast('Berhasil Mengubah Data Customer', 'success');
            
            // Dan data akan diupdate
            $customer->update($request->all());
        }
        
        // Dialihkan ke halaman Customer
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {

        // Data pada tabel customer akan dihapus
        $customer->delete();

        // Jika berhasil akan menampilkan Alert Success
        Alert::toast('Berhasil Menghapus Data Customer', 'success');

        // Dan dialihkan ke halaman customer
        return redirect('customer');
    }
    
    public function printCust()
    {
        // Mengambil seluruh data pada tabel Customer
        $customer = Customer::all()->sortBy('nama_customer');

        // PDF akan diload dengan membawa data yang sudah dideklarasikan
        $pdf = Pdf::loadView('print.custprint', ['customer' => $customer]);
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Customer - '. Carbon::now(). '.pdf');
    }

    public function customerExport()
    {
        return Excel::download(new CustomerExport, 'CustomerExport.xlsx');
    }

    public function customerImport(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new CustomerImport, $file);

        Alert::toast('Berhasil Mengimport Data Customer', 'success');

        return redirect('customer');
    }
}
