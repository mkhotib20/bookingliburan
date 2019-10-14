<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Redirect,Response;
use Session;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = Bank::all();
        $data = array('rek' =>$kota);
        return view('admin.rekening')->with($data);
    }

    public function json_rek()
    {
        return Bank::all();
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
        // echo $request->rekening;
        $id = $request->id;
        Bank::updateOrCreate(['id' => $id],
                    [
                        'holder' => $request->holder,
                        'rekening' => $request->rekening,
                        'bank_name' => $request->bank,
                    ]);
        Session::flash('sukses','Menyimpan data berhasil');
        return redirect()->route('rekening.index')->with('success', 'Post tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bank::find($id);
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
        Bank::find($id)->delete();
        Session::flash('sukses','Menghapus data berhasil');
        return redirect()->route('rekening.index')->with('success', 'Post tersimpan');
    }
}
