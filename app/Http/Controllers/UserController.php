<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada dalam tabel User
        $user = User::all();

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman home dengan membawa data yang sudah dideklarasikan
        return view('pendataan.pengguna', compact('user', 'profil'));
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
        // Menagmbil seluruh data yang ada dalam Form
        $data = $request->all();

        // Isi Kolom Password akan diubah menggunakan Hash
        $data['password'] = Hash::make($request->password);

        // Menyimpan Data ke dalam database user
        User::create($data);

        // Menampilkan Alert Success
        Alert::toast('Berhasil Menyimpan Data Pengguna', 'success');

        // Dialihkan ke halaman pengguna
        return redirect('pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, User $pengguna)
    {
        // Mengubah kolom Role
        $pengguna->update([
            'role' => $request->role,
        ]);

        // Menampilkan Alert Success
        Alert::toast('Berhasil Mengubah Role', 'success');

        // Dialihkan ke halaman Pengguna
        return redirect('pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        // Menghapus data yang ada dalam tabel user
        $pengguna->delete();

        // Menampilkan alert sukses
        Alert::toast('Berhasil Menghapus Data Pengguna', 'success');

        // Dialihkan ke halaman pengguna
        return redirect('pengguna');
    }

    public function gantiPassword(Request $request, User $pengguna)
    {
        // Jika Form Password diganti
        if($request->password){
            // Password akan diubah dengan hash
            $pengguna->update([
                'password' => Hash::make($request->password)
            ]);
        } 
        // Jika TidaK
        else {
            // Password akan diisi dengan yang sudah ada
            $pengguna->update([
                'password' => $pengguna->password
            ]);
        }
        // Menampilkan Alert Success
        Alert::toast('Berhasil Mengubah Password', 'success');

        // Dialihkan ke halaman profil
        return redirect('profil');
    }
}
