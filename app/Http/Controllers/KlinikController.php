<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        if(!empty($cari)){
            $klinik = Klinik::sortable()
            ->where('klinik.nama', 'like','%'.$cari.'%')
            ->orWhere('klinik.nik', 'like','%'.$cari.'%')
            ->paginate(5)->onEachSide(2)->fragment('klinik');
        }else{
            $klinik = Klinik::sortable()->paginate(5)->onEachSide(2)->fragment('klinik');
        }


        return view('klinik.index')->with([
            'klinik' => $klinik,
            'cari' => $cari,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klinik.create');
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
            'nama' => 'required|min:1',
            'nik' => 'required|min:1',
            'tgllahir' => 'required|min:1',
            'telepon' => 'required|min:1',
        ]);

        $klinik = new Klinik();
        $klinik->nama = $request->nama;
        $klinik->nik = $request->nik;
        $klinik->tgllahir = $request->tgllahir;
        $klinik->telepon = $request->telepon;
        $klinik->save();

        return to_route('klinik.index')->with('success', 'Data Berhasil di Tambah.');
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
        return view('klinik.edit')->with([
            'klinik' => Klinik::find($id),
        ]);
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
        $request->validate([
            'nama' => 'required|min:1',
            'nik' => 'required|min:1',
            'tgllahir' => 'required|min:1',
            'telepon' => 'required|min:1',
        ]);

        $klinik = Klinik::find($id);
        $klinik->nama = $request->nama;
        $klinik->nik = $request->nik;
        $klinik->tgllahir = $request->tgllahir;
        $klinik->telepon = $request->telepon;
        $klinik->save();

        return to_route('klinik.index')->with('success', 'Data Berhasil di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klinik = Klinik::find($id);
        $klinik->delete();

        return back()->with('success', 'Data berhasil di Hapus.');
    }
}
