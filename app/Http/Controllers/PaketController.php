<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paket;
use App\PektDes;
use App\Destinasi;
use Redirect,Response;
use Session;


class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        $data = array('paket' =>$paket);
        return view('admin.paket')->with($data);
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
        Paket::updateOrCreate(['id' => $id],
                    [
                        'nama' => $request->nama,
                        'harga' => $request->harga,
                        'kuota' => $request->kuota,
                        'desc' => $request->desc,
                    ]);
        Session::flash('sukses','Menyimpan data berhasil');
        return redirect()->route('paket.index')->with('success', 'Post tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Paket::findOrFail($id);
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
    public function listDestinasi($id)
    {
        $des= Destinasi::all();
        $pd = DB::table('des_paket')
        ->join('destinasi', 'destinasi.id', '=', 'des_paket.dp_des')
        ->where('des_paket.dp_paket', $id)
        ->select('des_paket.*', 'destinasi.nama as namaDes')
        ->get();
        $data = array('pd' => $pd, 'dest' => $des, 'idPaket' => $id);
        return view('admin.pd')->with($data); 
    }
    public function tPd(Request $req)
    {
        $validatedData = $req->validate([
            'destinasi' => 'required',
        ]);
        $des = $req->destinasi;
        $paket = $req->paket;
        PektDes::create([
            'dp_des' => $des,
            'dp_paket' => $paket
        ]);
        Session::flash('sukses','Menyimpan data berhasil');
        return back()->with('success', 'Post tersimpan');
    }
    public function delDp($id)
    {
        echo $id;
        PektDes::find($id)->delete();
        Session::flash('sukses','Berhasil menghapus');
        return back()->with('success', 'Post tersimpan');
    }
    public function json_paket()
    {
        return Paket::all();
    }
    public function json_paket_wh($id)
    {
        return Paket::findOrFail($id);
    }
    public function json_pd($id)
    {
        $pd = DB::table('des_paket')
        ->join('destinasi', 'destinasi.id', '=', 'des_paket.dp_des')
        ->join('paket', 'paket.id', '=', 'des_paket.dp_paket')
        ->join('kota', 'kota.id', '=', 'destinasi.des_kota')
        ->where('des_paket.dp_paket', $id)
        ->select('destinasi.*', 'paket.id as paketId', 'kota.nama as namaKota')
        ->get();
        return $pd;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paket::find($id)->delete();
        PektDes::where('dp_paket', $id)->delete();
        Session::flash('sukses','Menghapus data berhasil');
        return redirect()->route('paket.index')->with('success', 'Post tersimpan');
    }
}