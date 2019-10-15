<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;
use Illuminate\Support\Facades\Input;
use App\Trx;
use App\ItemDes;
use App\Article;
use App\MeetingPoint;
use App\Http\Controllers\HomeController;
class FrontController extends Controller
{
    public function identitas($id)
    {
        $iden = HomeController::getIdentitas();
        $tara = $iden[$id];
        $articles = Article::orderBy('created_at', 'desc')->take(4)->get();
        switch ($id) {
            case 'reservasi':
                $data = array("iden" => $tara, 'new' => $articles);
                return view("front.identitas")->with($data);
                break;
            case 'about':
                $data = array("iden" => $tara, 'new' => $articles);
                return view("front.about")->with($data);
                break;
            case 'kota':
                $data = array("iden" => $tara, 'new' => $articles);
                return view("front.identitas")->with($data);
                break;
            case 'durasi':
                $data = array("iden" => $tara, 'new' => $articles);
                return view("front.identitas")->with($data);
                break;
            case 'why':
                $data = array("iden" => $tara, 'new' => $articles);
                return view("front.why")->with($data);
                break;
            case 'faq':
                return redirect()->route('faq');
                break;
            
            default:
                # code...
                
                break;
        }
    }
    public function done($id)
    {
        $trx = DB::table('transaksi')
        ->join('paket', 'paket.id', '=', 'transaksi.paket')
        ->where('transaksi.kode_booking', $id)
        ->select('transaksi.*', 'paket.nama as namaPaket', 'paket.harga as hargaPaket')
        ->get();
        $itd = DB::table('item_des')
        ->join('destinasi', 'destinasi.id', '=', 'item_des.des_code')
        ->where('item_des.trx_id', $id)
        ->select('destinasi.*')
        ->get();
        $mp = MeetingPoint::find($trx[0]->meeting_point);
        $trx[0]->meeting_point = $mp->nama;
        $data = array('trx' => $trx[0], 'itd' => $itd, 'mp');
        return view("front.done")->with($data);
    }
    public function print($id)
    {
        $trx = DB::table('transaksi')
        ->join('paket', 'paket.id', '=', 'transaksi.paket')
        ->where('transaksi.kode_booking', $id)
        ->select('transaksi.*', 'paket.nama as namaPaket', 'paket.harga as hargaPaket')
        ->get();
        $itd = DB::table('item_des')
        ->join('destinasi', 'destinasi.id', '=', 'item_des.des_code')
        ->where('item_des.trx_id', $id)
        ->select('destinasi.*')
        ->get();
        $data = array('trx' => $trx[0], 'itd' => $itd);
        return view("front.print")->with($data);
    }
    public function detailArticle($slug)
    {
        // $clientIP = request()->ip();
        $hour = date('h');
        $sample_rate = 10; 
        $art = Article::where('slug', $slug)->firstOrFail();
        if ($art->views==0) {
            $art->views = $art->views+1;
            $art->save();
        }
        if (mt_rand(1,$sample_rate) == 1) {
            $art->views = $art->views+1;
            $art->save();
        }
        $articles = Article::orderBy('created_at', 'desc')->take(4)->get();
        $data = array('art' => $art, 'meta' => $art->title, 'new' => $articles);
        return view("front.detailArt")->with($data);
        // return $art;
    }
    public function index()
    {
        $paket = DB::table('des_paket')
        ->join('paket', 'des_paket.dp_paket', '=', 'paket.id')
        ->join('destinasi', 'des_paket.dp_des', '=', 'destinasi.id')
        ->groupBy('des_paket.dp_paket')
        ->select('destinasi.nama as namaDes', 'paket.nama as namaPaket', 'paket.id as idPaket', 'paket.harga')
        ->get();
        $article = Article::orderBy('created_at', 'desc')->take(4)->get();
        $data = array('paket' => $paket, 'article' => $article);
        return view("front.home")->with($data);
    }
    public function meeting()
    {
        return MeetingPoint::all();
    }
    public function detailPaket()
    {
        $id = $_GET['id_paket'];
        $pd = DB::table('des_paket')
        ->join('destinasi', 'destinasi.id', '=', 'des_paket.dp_des')
        ->join('paket', 'paket.id', '=', 'des_paket.dp_paket')
        ->where('des_paket.dp_paket', $id)
        ->select('destinasi.*', 'paket.id as paketId', 'paket.nama as namaPaket', 'paket.harga as hargaP', 'paket.desc')
        ->get();
        $data = array('pd' => $pd, 'meta' => $pd[0]->namaPaket);
        return view("front.detail")->with($data);
    }
    public function hasilDestinasi()
    {
        $id_paket = $_GET['id_paket'];
        if ($_GET['tgl']!='') {
            $tgl = $this->swap($_GET['tgl']);
        }
        else{
            $tgl = date('m/d/Y');
        }
        $data = array('id' => $id_paket, 'tgl' =>$tgl);
        return view("front.result")->with($data);
    }
    public function swap($str)
    {
        $arr = explode('/',$str);
        $tmp = $arr[0];
        $arr[0] = $arr[1];
        $arr[1] = $tmp;
        $rt = implode('/', $arr);
        return $rt;
    }
    public function faq()
    {
        $iden = HomeController::getIdentitas();
        $data = array('iden' =>  $iden['faq']);
        return view("front.faq")->with($data);
    }
    public function transaksi(Request $req)
    {
        $trx = Trx::create([
            'is_paid' => $req->is_paid,
            'kode_booking' => $req->kode_booking,
            'user' => $req->user,
            'paket' => $req->paket,
            'harga' => $req->harga,
            'tgl_brkt' => $req->tgl,
            'jumlah_tim' => $req->jumlah_tim, 
            'meeting_point' => $req->meeting_point
        ]);
        if ($trx) {
            $arr['status'] = '000'; 
            $arr['data'] = $req->kode_booking;
        }
        else{
            $arr['status'] = 'failed';
        }
        return $arr;  
    }
    public function saveCus(Request $req)
    {
        $cus = Customer::create([
            'id' => $req->cust_id,
            'nama' => $req->nama, 
            'alamat' => $req->alamat,
            'hp' => $req->hp,
            'email' => $req->email
        ]);
        if ($cus) {
            $arr['status'] = '000'; 
            $arr['data'] = $req->cust_id;
        }
        else{
            $arr['status'] = 'failed';
        }
        return $arr;
    }
    public function saveTrxItem(Request $req)
    {
        $trx = ItemDes::create([
            'trx_id' => $req->book_code,
            'des_code' => $req->des_code,
        ]);
        if ($trx) {
            $arr['status'] = '000'; 
            $arr['data'] = $req->book_code;
        }
        else{
            $arr['status'] = 'failed';
        }
        return $arr;  
    }
}
