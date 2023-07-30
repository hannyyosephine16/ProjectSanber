<?php

namespace App\Http\Controllers;

Use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
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
            $obat = Obat::sortable()
            ->where('obat.nama', 'like','%'.$cari.'%')
            ->orWhere('obat.sediaan', 'like','%'.$cari.'%')
            ->orWhere('obat.golongan', 'like','%'.$cari.'%')
            ->paginate(5)->onEachSide(2)->fragment('obat');
        }else{
            $obat = Obat::sortable()->paginate(5)->onEachSide(2)->fragment('obat');
        }
        return view('obat.index')->with([
            'obat' => $obat,
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
        return view('obat.create');
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
            'sediaan' => 'required|min:1',
            'golongan' => 'required|min:1',
            'harga' => 'required|min:1',
            'jumlah' => 'required|min:1',
        ]);

        $obat = new Obat();
        $obat->nama = $request->nama;
        $obat->sediaan = $request->sediaan;
        $obat->golongan = $request->golongan;
        $obat->harga = $request->harga;
        $obat->jumlah = $request->jumlah;
        $obat->save();

        return to_route('obat.index')->with('success', 'Data Berhasil di Tambah.');
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
        return view('obat.edit')->with([
            'obat' => Obat::find($id),
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
            'sediaan' => 'required|min:1',
            'golongan' => 'required|min:1',
            'harga' => 'required|min:1',
            'jumlah' => 'required|min:1',
        ]);

        $obat = Obat::find($id);
        $obat->nama = $request->nama;
        $obat->sediaan = $request->sediaan;
        $obat->golongan = $request->golongan;
        $obat->harga = $request->harga;
        $obat->jumlah = $request->jumlah;
        $obat->save();

        return to_route('obat.index')->with('success', 'Data Berhasil di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();

        return back()->with('success', 'Data berhasil di Hapus.');
    }
}
