<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Klinik;
use App\Models\Rekam;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($request->all());
        return view('detail.index')->with([
            'detail' => Detail::all(),
        ]);
    }

    public function viewDetail(Request $request)
    {
        // dd($request->all());
        return view('detail.index')->with([
            'detail' => Detail::whereRaw('klinik_id =  '.$request->id)->get(),
            'klinik_id' => $request->id
        ]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekam.detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'tipe' => 'required|min:1',
            'tanggal' => 'required|min:1',
            'jam' => 'required|min:1',
            'subjective' => 'required|min:1',
            'objective' => 'required|min:1',
            'assessment' => 'required|min:1',
            'planning' => 'required|min:1',
            'instruksi' => 'required|min:1',
            'obat' => 'required|min:1',
            'role' => 'required|min:1',
        ]);

        $detail = new Detail();
        $detail->tipe = $request->tipe;
        $detail->tanggal = $request->tanggal;
        $detail->jam = $request->jam;
        $detail->subjective = $request->subjective;
        $detail->objective = $request->objective;
        $detail->assessment = $request->assessment;
        $detail->planning = $request->planning;
        $detail->instruksi = $request->instruksi;
        $detail->obat = $request->obat;
        $detail->role = $request->role;
        $detail->klinik_id = $request->klinik_id;
        $detail->save();

        return view('detail.index')->with([
            'success', 'Data Berhasil di Tambah.',
            'detail' => Detail::whereRaw('klinik_id = ' .$request->klinik_id)->get(),
            'klinik_id' => $request->id
        ]);

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
