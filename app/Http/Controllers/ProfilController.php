<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Image;

class ProfilController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::findOrFail($id);
        return view('profil.index');
    }

    public function editemail(Request $request, $id)
    {
        $message = [
            'email.required' => 'Email tidak boleh kosong',
        ];

        $this->validate($request, 
        [
            'email' => 'required',
        ], $message);

        $editemail = User::findOrFail($id)->update([
            'email' => request('email'),
        ]);
        if ($editemail) {
            return back()->with('successemail', 'Email Berhasil Di Ganti!');
        } else {
            return back()->with('erroremail', 'Email Gagal Di Ganti!');
        }
    }

    public function update(Request $request, $id)
    {
        $message = [
            'photos.required' => 'Ubah foto terlebih dahulu',
            'photos.image' => 'Harus gambar',
            'photos.mimes' => 'Ekstensi: jpg,png,jpeg',
            'photos.max' => 'Batas maksimum 2MB',
            'name.required' => 'Ubah nama terlebih dahulu',
            'desc.required' => 'Ubah deskripsi terlebih dahulu',
            'username.required' => 'Ubah nama pengguna terlebih dahulu',
        ];

        $this->validate($request, 
        [
            'username' => 'required',
            'name' => 'required',
            'photos' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'desc' => 'required',
        ], $message);

        // if($request->hasFile('foto')){
            // }
        $image = $request->file('photos');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(160, 160)->save(public_path ('images/profil/' . $filename) );
    
        // $image = $request->foto;
        // $filename = time() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path() . '/images/profil', $filename);

        $upprofil = User::findOrFail($id)->update([
            'name' => request('name'),
            'username' => request('username'),
            'photos' => $filename,
            'desc' => request('desc'),
        ]);
        if ($upprofil) {
            return back()->with('success', 'Data Berhasil Di Ganti!');
        } else {
            return back()->with('error', 'Data Gagal Di Ganti!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = User::FindOrFail($id);
        unlink(public_path ('images/profil/' . $image->photos));
        User::where("photos")->delete();
        User::FindOrFail($id)->update([
            'photos' => 'profil.png',
        ]);
        return back()->with("success", "Foto Berhasil Di Hapus!");
    }
}
