<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paket;
use App\PektDes;
use App\Destinasi;
use App\PaketPax;
use App\Kota;
use App\IncludeEx;
use Redirect,Response;
use Session;
use Auth;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = Kota::all();
        $paket = Paket::all();
        $data = array('paket' =>$paket, 'kota' => $kota);
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
    public function includeEx($id)
    {
        $data = array('id' => $id, 'paket' => Paket::find($id));
        return view('admin.add-ie')->with($data); 
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
                        'durasi' => $request->durasi,
                        'desc' => $request->desc,
                        'kota' => $request->kota,
                        'user' => Auth::user()->id
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
    public function pp_destroy(Request $req)
    {
        $pp = PaketPax::find($req->id);
        $pp->delete();
        $data['status'] = '000';
        return $data;
    }
    public function ie_destroy(Request $req)
    {
        $pp = includeEx::find($req->id);
        $pp->delete();
        $data['status'] = '000';
        return $data;
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function json_ie($key)
    {
        return IncludeEx::where("paket", $key)->get();
    }
    public function add_ie(Request $req)
    {
        $paket = IncludeEx::create([
            "is_include" => $req->is_include,
            "name" => $req->name,
            "paket" => $req->id
        ]);
        return $paket;
    }
    public function add_pp(Request $req)
    {
        $paket = PaketPax::create([
            "pp_paket" => $req->paket,
            "pp_pax" => $req->pax,
            "pp_price" => $req->price
        ]);
        return $paket;
    }
    public function listHarga($id)
    {
        $data = array('id' => $id, 'paket' => Paket::find($id));
        return view('admin.pp')->with($data); 
    }
    public function listDestinasi($id)
    {
        $des= Destinasi::all();
        $pd = DB::table('des_paket')
        ->join('destinasi', 'destinasi.id', '=', 'des_paket.dp_des')
        ->where('des_paket.dp_paket', $id)
        ->select('des_paket.id', 'destinasi.nama as namaDes', 'destinasi.id as desId')
        ->get();
        foreach ($des as $key => $val) {
            $val['isSelected'] = false;
            foreach ($pd as $key2 => $val2) {
                if ($val->id == $val2->desId) {
                    $val['isSelected'] = true;
                }
            }
        }
        // return $des;
        $data = array('pd' => $pd, 'dest' => $des, 'idPaket' => $id, 'paket' => Paket::find($id));
        return view('admin.pd')->with($data); 
    }
    public function saveDes(Request $req)
    {
        $tujuan_upload = 'public/uploads/img_paket';
        if (isset($req->cover_img)) {
            $file = $req->file('cover_img');
            $fn = 'img-'.time().$req->namaPaket.'.'.$file->guessExtension();;
            $file->move($tujuan_upload,$fn);
            $cover_img = $fn;
            Paket::updateOrCreate(
                ['id' => $req->id],
                [
                    'desc' => $req->desc,
                    'cover_img' => $cover_img
                ]
                );
        }
        else{
            echo 'as';
        }
        // return $req->desc;
        Session::flash('sukses','Menyimpan data berhasil');
        return redirect()->route('paket.index')->with('success', 'Post tersimpan');
    }
    public function deskripsi($id)
    {
        $paket = Paket::find($id);
        $data = array('des' => $paket->desc, 'judul' => $paket->nama, 'id' => $id, 'cover_img' => $paket->cover_img);
        return view('admin.des')->with($data);
    }
    public function tPd(Request $req)
    {
        $validatedData = $req->validate([
            'destinasi' => 'required',
        ]);
        $des = $req->destinasi;
        $paket = $req->paket;
        PektDes::updateOrCreate([
            ['dp_paket', '='. $paket],
            ['dp_des', '='. $des],
        ],[
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
    public function json_pp($id)
    {
        $pd = DB::table('paket_pax')
        ->join('paket', 'paket.id', '=', 'paket_pax.pp_paket')
        ->where('paket_pax.pp_paket', $id)
        ->select('paket.id as paketId', 'paket_pax.*')
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
