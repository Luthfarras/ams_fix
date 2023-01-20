<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Distributor;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dist = Distributor::all();
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.distributor', compact('dist', 'profil'));
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
        Distributor::create($request->all());
        Alert::toast('Berhasil Menyimpan Data Distributor', 'success');
        return redirect('distributor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        $distributor->update($request->all());
        return redirect('distributor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        Alert::toast('Berhasil Menghapus Data Distributor', 'success');
        return redirect('distributor');
    }

    public function printDist()
    {
        $distributor = Distributor::all();
        $pdf = Pdf::loadView('print.distprint', ['distributor' => $distributor]);
        
        return $pdf->setPaper('a4', 'potrait')->stream('Data Distributor - '. Carbon::now(). '.pdf');
    }
}
