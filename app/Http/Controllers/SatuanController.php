<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = Satuan::all();
        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.satuan', compact('satuan', 'profil'));
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
        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|unique:satuans',
        ]);
        if ($validator->fails()) {
            Alert::toast('Gagal Menyimpan Data Satuan', 'error');
        }else {
            $data = $request->all();
            Satuan::create($data);
            Alert::toast('Berhasil Menyimpan Data Satuan', 'success');
        }
        return redirect('satuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Satuan $satuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan)
    {
        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|unique:satuans',
        ]);
        if ($validator->fails()) {
            Alert::toast('Gagal Mengubah Data Satuan', 'error');
        }else {
            $data = $request->all();
            $satuan->update($data);
            Alert::toast('Berhasil Mengubah Data Satuan', 'success');
        }
        return redirect('satuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        Alert::toast('Berhasil Menghapus Data Satuan', 'success');
        return redirect('satuan');
    }
}
