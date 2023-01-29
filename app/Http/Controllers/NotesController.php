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
        // Mengambil seluruh data yang ada dalam form
        $data = $request->all();

        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if ($validator->fails()) {
            // Menampilkan Alert Error
            Alert::toast('Gagal Menyimpan Notes', 'success');
        }
        
        // Jika Berhasil
        else {
            // Kolom user id akan otomatis terisi oleh id yang login saja
            $data['user_id'] = Auth::user()->id;

            // Data akan dimasukkan ke dalam database
            Notes::create($data);

            // Menampilkan Alert Sukses
            Alert::toast('Berhasil Menyimpan Notes', 'success');
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman home
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
        //
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
        // Mengambil seluruh data yang ada dalam form
        $data = $request->all();

        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if ($validator->fails()) {
            // Menampilkan Alert Error
            Alert::toast('Gagal Mengubah Notes', 'success');
        }
        
        else {
             // Kolom user id akan otomatis terisi oleh id yang login saja
            $data['user_id'] = Auth::user()->id;

            // Data akan diupdate ke dalam database
            $notes->update($data);

            // Menampilkan Alert Sukses
            Alert::toast('Berhasil Mengubah Notes', 'success');
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman home
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
        // Menghapus data yang ada dalam tabel notes
        $notes->delete();

        // Menampilkan alert sukses
        Alert::toast('Berhasil Menghapus Notes', 'success');

        // Dialihkan ke halaman home
        return redirect('home');   
    }

    public function status(Notes $notes)
    {
        // Jika Status dalam tabel Notes 'Belum Selesai'
        if ($notes->status == 'Belum Selesai') {
            // Maka Status diubah ke 'Selesai'
            $notes->update([
                'status' => "Selesai",
            ]);
        } 
        
        // Jika sebaliknya
        else {
            // Akan diubah ke Belum Selesai
            $notes->update([
                'status' => "Belum Selesai",
            ]);
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman home
        return redirect('home');
    }
}
