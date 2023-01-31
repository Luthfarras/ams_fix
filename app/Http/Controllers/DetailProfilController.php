<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DetailProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variabel ini sebagai penampung data yang login
        $user = Auth::user();

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman profil dengan membawa data yang sudah dideklarasikan
        return view('profil', compact('user', 'profil'));
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
        // Mengambil data yang ada dalam seluruh form
        $data = $request->all();

        // Sebagai Variabel penampung nama file
        $newName = '';

        // Jika didalam form terdapat file foto
        if($request->file('foto')){

            // Mengambil ekstensi original foto
            $extension = $request->file('foto')->getClientOriginalExtension();

            // Dilakukan perubahan nama file yang diambil dari Nama, Timestamp dan Ekstensi
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;

            // Menyimpan file ke dalam folder img dengan nama yang sudah dideklarasikan
            $isi = $request->file('foto')->storeAs('img', $newName);
        };

        // Kolom foto akan diisi oleh variabel $isi
        $data['foto'] = $isi;

        // Kolom user id akan diisi oleh ID yang sudah login
        $data['user_id'] = Auth::user()->id;

        // Detail profil akan diisi dengan variabel $data yang sudah dideklarasikan
        DetailProfil::create($data);

        // Jika berhasil akan menampilkan alert sukses
        Alert::toast('Berhasil Menyimpan Data Profil', 'success');

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman profil
        return redirect('profil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailProfil  $detailProfil
     * @return \Illuminate\Http\Response
     */
    public function show(DetailProfil $detailProfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailProfil  $detailProfil
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProfil $detailProfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailProfil  $detailProfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailProfil $detailprofil)
    {
        // Mengambil data yang ada dalam seluruh form
        $data = $request->all();

        // Kolom user ID akan otomatis terisi oleh ID yang login
        $data['user_id'] = Auth::user()->id;

        // Sebagai Variabel Penampung Nama File
        $newName = '';

        // Jika foto akan diganti
        if ($request->file('foto')) {   
            // Foto yang didalam database akan dihapus 
            Storage::delete($detailprofil->foto);
            
            // mengambil ekstensi dari foto yang diinput
            $extension = $request->file('foto')->getClientOriginalExtension();

            // Mengganti nama file dengan Nama - timestamp - dan ekstensi
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;

            // Menyimpan file ke dalam folder img dengan nama yang sudah dideklarasikan
            $isi = $request->file('foto')->storeAs('img', $newName);

            // Kolom foto akan diisi oleh variabel $isi
            $data['foto'] = $isi;

            // Setelah itu dilakukan update data
            $detailprofil->update($data);
        } else {
            // Jika tidak ada pergantian foto, maka foto diisi dengan foto yang sudah ada dalam database
            $detailprofil->update([
                'nama' => $request->nama,
                'alamat' =>  $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telepon' => $request->telepon,
                'user_id' => Auth::user()->id,
                'foto' => $detailprofil->foto
            ]);
        }
        
        // Menampilkan Alert Sukses
        Alert::toast('Berhasil Mengubah Data Profil', 'success');

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman profil
        return redirect('profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailProfil  $detailProfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailProfil $detailProfil)
    {
        //
    }
}
