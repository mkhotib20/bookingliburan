<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Destinasi;
use App\Kota;
use App\PektDes;
use Redirect,Response;
use Session;

class AdminDestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json_des()
    {
        return Destinasi::all();
    }
    public function json_despaket()
    {
        $destinasi = DB::table('des_paket')
        ->join('paket', 'des_paket.dp_paket', '=', 'paket.id')
        ->join('destinasi', 'des_paket.dp_des', '=', 'destinasi.id')
        ->select('destinasi.nama as namaDes', 'paket.nama as namaPaket', 'paket.id as idPaket')
        ->get();
        return $destinasi;
    }
    public function index()
    {
        $kota = Kota::all();
        $destinasi = DB::table('destinasi')
        ->join('kota', 'destinasi.des_kota', '=', 'kota.id')
        ->select('destinasi.*', 'kota.nama as nama_kota')
        ->get();
        $data = array('dest' => $destinasi, 'kota' =>$kota);
        return view('admin.destinasi')->with($data);
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
        $id = $request->id;
        Destinasi::updateOrCreate(['id' => $id],
                    [
                        'nama' => $request->nama,
                        'tiket' => $request->tiket,
                        'des_kota' => $request->des_kota,
                        'deskripsi' => $request->deskripsi,
                    ]);
        Session::flash('sukses','Menyimpan data berhasil');
        return redirect()->route('destinasi.index')->with('success', 'Post tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Destinasi::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        Destinasi::findOrFail($id)->delete();
        Session::flash('sukses','Berhasil menghapus data');
        return redirect()->route('destinasi.index')->with('success', 'Post tersimpan');
    }
}
