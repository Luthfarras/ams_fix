<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DetailProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
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
        $data = $request->all();

        $newName = '';
        if($request->file('foto')){
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
            $isi = $request->file('foto')->storeAs('img', $newName);
        };

        $data['foto'] = $isi;
        $data['user_id'] = Auth::user()->id;
        DetailProfil::create($data);
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
    public function update(Request $request, DetailProfil $detailProfil)
    {

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $newName = '';
        // Jika foto akan diganti
        if ($request->file('foto')) {   
            // Foto yang didalam database akan dihapus 
            !is_null($detailProfil->image) && Storage::delete($detailProfil->foto);
            
            // mengambil ekstensi dari foto yang diinput
            $extension = $request->file('foto')->getClientOriginalExtension();

            // Mengganti nama file dengan Nama - timestamp - dan ekstensi
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;

            // Setelah itu foto disimpan
            $isi = $request->file('foto')->storeAs('img', $newName);

            $data['foto'] = $isi;

            $detailProfil->update($data);
        } else {
            $detailProfil->update([
                'nama' => $request->nama,
                'alamat' =>  $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telepon' => $request->telepon,
                'user_id' => Auth::user()->id,
                'foto' => $detailProfil->foto
            ]);
        }
        dd($detailProfil);
        // return redirect('profil');
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
