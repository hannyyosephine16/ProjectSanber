<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
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
            $surat = Surat::sortable()
            ->where('surat.nama', 'like','%'.$cari.'%')
            ->orWhere('surat.diagnosa', 'like','%'.$cari.'%')
            ->orWhere('surat.tanggal', 'like','%'.$cari.'%')
            ->paginate(5)->onEachSide(2)->fragment('surat');
        }else{
            $surat = Surat::sortable()->paginate(5)->onEachSide(2)->fragment('surat');
        }


        return view('surat.index')->with([
            'surat' => $surat,
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
        return view('surat.create');
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
            'nosurat' => 'required|min:1',
            'nama' => 'required|min:1',
            'tempatlahir' => 'required|min:1',
            'tgllahir' => 'required|min:1',
            'jenis' => 'required|min:1',
            'agama' => 'required|min:1',
            'pekerjaan' => 'required|min:1',
            'alamat' => 'required|min:1',
            'tanggal' => 'required|min:1',
            'diagnosa' => 'required|min:1',
            'mulai' => 'required|min:1',
            'akhir' => 'required|min:1',
            'tanggalsurat' => 'required|min:1',
        ]);

        $surat = new Surat();
        $surat->nosurat = $request->nosurat;
        $surat->nama = $request->nama;
        $surat->tempatlahir = $request->tempatlahir;
        $surat->tgllahir = $request->tgllahir;
        $surat->jenis = $request->jenis;
        $surat->agama = $request->agama;
        $surat->pekerjaan = $request->pekerjaan;
        $surat->alamat = $request->alamat;
        $surat->tanggal = $request->tanggal;
        $surat->diagnosa = $request->diagnosa;
        $surat->mulai = $request->mulai;
        $surat->akhir = $request->akhir;
        $surat->tanggalsurat = $request->tanggalsurat;
        $surat->save();
        return to_route('surat.index')->with('success', 'Data Berhasil di Tambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = Surat::find($id);
        return view('surat.show')->with('surat', $surat);
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
