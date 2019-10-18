
@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
            <h1 class="ph-title">Services</h1>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h3>Daftar harga paket</h3>
                <div class="line"></div>
            </div>
            <div class="sec-content">
                <div class="row">
                    @foreach($paket as $key => $val)
                    <div class="col-md-4 mb-2 item">
                        <a href="{{url('detail?jkjaBA782hJA='.csrf_token().'&id_paket='.$val->id)}} ">
                            <div class="card card-paket">
                                <div class="box-img"><img src="{{asset('public/uploads/img_paket/'.$val->cover_img)}}" alt="">
                                    
                                    <div class="price"> <span style="font-size: 14px">Start From</span> <br> Rp. {{number_format($val->pp_price, '0', '.', ',')}}</div></div>
                                <div class="img-cpt">
                                    <h4>{{$val->nama}}</h4>
                                    <p>Destinasi :  </p>
                                    <div class="location"><span class="fas fa-map-pin"></span> Malang</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')
   
    @endsection