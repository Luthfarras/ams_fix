<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Faktur;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\DetailFaktur;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan Seluruh Data pada tabel Faktur
        $faktur = Faktur::all();

        // Menampilkan Seluruh Data pada tabel Detail Faktur
        $detail = DetailFaktur::all();

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

       // Masuk ke halaman faktur dengan membawa data yang sudah dideklarasikan
        return view('faktur.faktur', compact('faktur', 'detail', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil seluruh data pada tabel customer
        $cust = Customer::all();

        // Mengambil seluruh data pada tabel barang
        $barang = Barang::all();

        // Mengambil seluruh data pada tabel Detail Faktur
        $detail = DetailFaktur::all();

        // Menampilkan seluruh data pada tabel Detail faktur dengan data yang unique
        $dfaktur = $detail->unique('kode_faktur');

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Kembali ke halaman tambah faktur dengan membawa data yang sudah dideklarasikan
        return view('faktur.tambah', compact('cust', 'barang', 'detail', 'dfaktur', 'profil'));

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
            'kode_faktur' => 'required|unique:fakturs',
            'tanggal_faktur' => 'required',
            'customer_id' => 'required',
            'ket_faktur' => 'required',
            'total_harga' => 'required',
            'ppn' => 'required',
            'pph' => 'required',
            'total_pp' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if($validator->fails()){
            Alert::toast('Gagal Menyimpan Data Faktur', 'error');
            return redirect('faktur/create');
        
        /* 
            * if (DB::table('fakturs')->where('kode_faktur', $request->kode_faktur)->exists()) {
            * Alert::error('Oops..', 'Invoice sudah terdaftar');
            * return redirect('faktur/create'); 
        */
        
        }
        
        // Jika Berhasil
        else {
            // Mengambil Data yang ada dalam seluruh form
            $data = $request->all();

            // Total harga diberi penampung dengan nilai 0
            $data['total_harga'] = 0;

            // Faktur akan di buat dengan isi data di variabel $data
            Faktur::create($data);

            // Mengambil ID terakhir (Angkanya saja)
            $faktur = Faktur::latest()->first()->id; 

            // Mengambil data dari ID Terbaru
            $fakturs = Faktur::where('id', $faktur)->first(); 
           
            // Total sebagai variabel penampung
            $total = 0;

            // Mengambil data dari tabel detail faktur dengan kolom subtotal dengan kondisi tabel detail faktur dan faktur kolom kode_faktur harus sama
            $price = DB::table('detail_fakturs')->select('subtotal')->where('detail_fakturs.kode_faktur', $fakturs->kode_faktur)->get();

            // Data akan diulang dan dihitung secara total
            foreach ($price as $item) {
                $total += $item->subtotal;
            }

            // Data faktur kolom total_harga akan di update sesuai variabel $total
            $fakturs->update([
                'total_harga' => $total,
            ]);

            // Tabel Penjualan juga akan dibuat berdasarkan data dan kolom yang ditentukan sendiri
            Penjualan::create([
                'customer_id' => $request->customer_id,
                'tanggal_kirim' => $request->tanggal_faktur,
                'kode' => $fakturs->kode_faktur,
                'jumlah' => $total,
                'keterangan' => $request->ket_faktur,
            ]);

            // Menampilkan Alert Success
            Alert::toast('Berhasil Menyimpan Data Faktur', 'success');

            // Setelah salah satu kondisi berhasil akan dialihkan ke halaman faktur
            return redirect('faktur');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show(Faktur $faktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Faktur $faktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faktur $faktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faktur $faktur)
    {
        // Data pada tabel faktur akan dihapus
        $faktur->delete();

        // Menampilkan Alert Success
        Alert::toast('Berhasil Menghapus Data Faktur', 'success');

        // Dialihkan ke halaman faktur
        return redirect('faktur');
    }
    public function getNama($id)
    {
        /*
            * Tabel Detail faktur akan digabungkan dengan Tabel Customer dimana customer.id harus sama
            * Dengan kondisi kode_faktur sama dengan data kode_faktur($id) yang diambil
            * Setelah itu data diambil
        */
        $data = DetailFaktur::join('customers', 'customers.id', 'detail_fakturs.customer_id')->where('detail_fakturs.kode_faktur', $id)->get();
      
        // Data akan direspon ke dalam bentuk JSON dengan membawa data $data
        return response()->json($data);
    }


    public function getBarang($id)
    {
        /*
            * Tabel Detail faktur akan digabungkan dengan Tabel Barang dimana barang.id harus sama
            * Dengan kondisi kode_faktur sama dengan data kode_faktur($id) yang diambil
            * Setelah itu data diambil
        */
        $data = DetailFaktur::join('barangs', 'barangs.id', 'detail_fakturs.barang_id')->where('detail_fakturs.kode_faktur', $id)->get();
      
        // // Sebagai Variabel penampung
        // $li = '';

        // // Setelah itu data akan diulang
        // foreach ($data as $item) {
        //     $li .= $item->nama_barang. ', ';
        // }
      
        // Data akan ditampilkan dalam bentuk respon dan bentuk json. Data yang ditampilkan berupa Array
        return response()->json($data);
    }

    public function printFaktur($id)
    {
        /*
            * Tabel Barang akan dipilih semua kemudian digabungkan dengan Tabel satuan dimana tabel barang kolom satuan.id harus sama
            * kemudian digabungkan lagi dengan Tabel detail_faktur dimana tabel barang kolom barang.id harus sama
            * kemudian digabungkan lagi dengan Tabel faktur dimana tabel detail_faktur kolom kode_faktur harus sama
            * kemudian digabungkan lagi dengan Tabel customer dimana tabel faktur kolom customer.id harus sama
            * Dengan kondisi tabel faktur dengan kolom kode_faktur sama dengan data kode_faktur($id) yang diambil
            * Setelah itu data diambil
        */
        $faktur = DB::table('barangs')->select('*')->join('satuans', 'barangs.satuan_id', 'satuans.id')
        ->join('detail_fakturs', 'detail_fakturs.barang_id', 'barangs.id')
        ->join('fakturs', 'detail_fakturs.kode_faktur', 'fakturs.kode_faktur')
        ->join('customers', 'fakturs.customer_id', 'customers.id')
        ->where('fakturs.kode_faktur', $id)->get();
        
         /*
            * Tabel Barang akan dipilih semua kemudian digabungkan dengan Tabel satuan dimana tabel barang kolom satuan.id harus sama
            * kemudian digabungkan lagi dengan Tabel detail_faktur dimana tabel barang kolom barang.id harus sama
            * kemudian digabungkan lagi dengan Tabel faktur dimana tabel detail_faktur kolom kode_faktur harus sama
            * kemudian digabungkan lagi dengan Tabel customer dimana tabel faktur kolom customer.id harus sama
            * Dengan kondisi tabel faktur dengan kolom kode_faktur sama dengan data kode_faktur($id) yang diambil
            * Setelah itu data diambil dan berupa unique
        */
        $kodenama = DB::table('barangs')->select('*')->join('satuans', 'barangs.satuan_id', 'satuans.id')
        ->join('detail_fakturs', 'detail_fakturs.barang_id', 'barangs.id')
        ->join('fakturs', 'detail_fakturs.kode_faktur', 'fakturs.kode_faktur')
        ->join('customers', 'fakturs.customer_id', 'customers.id')
        ->where('fakturs.kode_faktur', $id)->get()->unique('kode_faktur');

        // Menampilkan data pada tabel faktur dengan kondisi kode faktur harus sama dengan kode faktur yang diambil
        $ppn = DB::table('fakturs')->where('kode_faktur', $id)->get();

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        
        // PDF akan ditampilkan dengan membawa data yang sudah dideklarasikan
        $pdf = Pdf::loadView('print.fakturprint', ['faktur' => $faktur, 'kodenama' => $kodenama, 'profil' => $profil]);
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Faktur - '. Carbon::now(). '.pdf');
    }
}