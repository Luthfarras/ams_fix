<?php

namespace App\Http\Controllers;

use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['foto'] = $request->file('foto')->store('img');
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
        //
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
