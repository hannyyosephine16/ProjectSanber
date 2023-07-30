<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;

class RekamController extends Controller
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

        return view('rekam.index')->with([
            'klinik' => $klinik,
            'cari' => $cari,
        ]);
    }
}
