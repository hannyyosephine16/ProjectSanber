<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.index')->with([
            'pegawai' => Pegawai::paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'propesi' => 'required|min:1',
            'nama' => 'required|min:1',
            'alamat' => 'required|min:1|max:20',
            'telepon' => 'required|min:1',
            'hari' => 'required|min:1',
            'jam' => 'required|min:1',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        //mengambil data foto yang diupload
        $foto           = $request->foto;
        //mengambil nama foto
        $slug      = Str::slug($foto->getClientOriginalName());
        $new_foto = time() .'_'. $slug;
        $foto->move('uploads/klinik/', $new_foto);

        $pegawai = new Pegawai();
        $pegawai->propesi = $request->propesi;
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->telepon = $request->telepon;
        $pegawai->hari = $request->hari;
        $pegawai->jam = $request->jam;
        $pegawai->foto = 'uploads/klinik/'. $new_foto;
        $pegawai->save();

        return to_route('pegawai.index')->with('success', 'Data Berhasil di Tambah.');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
