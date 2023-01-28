<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);
        if ($validator->fails()) {
            Alert::toast('Gagal Menyimpan Notes', 'success');
        }else {
            $data['user_id'] = Auth::user()->id;
            Notes::create($data);
            Alert::toast('Berhasil Menyimpan Notes', 'success');
        }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        // dd($notes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $notes)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);
        if ($validator->fails()) {
            Alert::toast('Gagal Mengubah Notes', 'success');
        }else {
            $data['user_id'] = Auth::user()->id;
            $notes->update($data);
            Alert::toast('Berhasil Mengubah Notes', 'success');
        }
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $notes)
    {
        $notes->delete();
        Alert::toast('Berhasil Menghapus Notes', 'success');
        return redirect('home');   
    }

    public function status(Notes $notes)
    {
        if ($notes->status == 'Belum Selesai') {
            $notes->update([
                'status' => "Selesai",
            ]);
        } else {
            $notes->update([
                'status' => "Belum Selesai",
            ]);
        }
        return redirect('home');
    }
}
