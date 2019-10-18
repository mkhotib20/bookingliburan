
@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
            <h1 class="ph-title">Detail Paket</h1>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h3>{{$pd[0]->namaPaket}}</h3>
                <div class="line"></div>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="col-md-9 my-2  p-4">
                        <div class="detail-header">
                            <img src="{{url('public/uploads/img_paket/'.$pd[0]->cover_img )}}" style="width: 100%" alt="">
                        </div>
                        <div class="detail-content my-3 p-3">
                            <p>Start from</p>
                            <h2 >Rp. {{number_format($pp[0]->pp_price, '0', '.',',')}}</h2>
                            <div class="line"></div>
                            <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">List Harga</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Destinasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ket" role="tab" aria-controls="contact" aria-selected="false">Keterangan Tambahan</a>
                                </li>
                            </ul>
                            <div class="tab-content p-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <p> <?= $pd[0]->desc ?>
                                        </p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    @foreach($pd as $key => $val)
                                    <li>{{$val->nama}} </li>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    @foreach($pp as $key => $val)
                                        <ul style="list-style: none; padding-left: 0">
                                                <li> {{$val->pp_pax}} Pax : {{"Rp. ". number_format($val->pp_price, '0', ",", ".")}} </li>
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="ket" role="tabpanel" aria-labelledby="contact-tab">
                                    <p>Apabila hari besar terkena charge tambahan</p>
                                </div>
                            </div>
                            <a style="color: white" href="{{url('result?id_paket='.$pd[0]->paketId)}} " class="btn btn-info btn-block btn-cari">ORDER NOW</a>
                        </div>
                    </div>
                    <div class="col-md-3 my-2">
                            <h4>Artikel terbaru</h4>
                            <div class="line"></div>
                            @foreach ($articles as $item => $val)
                                <a href="{{url('article/'.$val->slug)}} ">{{$val->title}}</a> <br>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')
   
    @endsection