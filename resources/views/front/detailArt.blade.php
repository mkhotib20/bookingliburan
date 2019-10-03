
@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
            <h1 class="ph-title">Detail Article</h1>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h3>{{$art->title}}</h3>
                <div class="line"></div>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="col-md-9 my-2  p-4">
                        <div class="detail-header">
                            <img src="{{asset('public/uploads/img_article/'.$art->cover_img)}}" style="width: 100%" alt="">
                        </div>
                        <div class="detail-content my-3 p-3">
                            <h2 >{{$art->title}} </h2> 
                            <div class="line"></div>
                            <div style="opacity: 0.6" ><span class="fas fa-calendar"></span> {{date('d-m-Y h:i', strtotime($art->created_at))}}  <span class="fas fa-eye"></span> {{$art->views}}   </div>
                            <div style="text-align: justify;"><?= $art->content ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 my-2">
                        <h4>Artikel terbaru</h4>
                        <div class="line"></div>
                        @foreach ($new as $item => $val)

                            <a href="#">{{$val->title}}</a> <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')
   
    @endsection