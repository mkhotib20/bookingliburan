
@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
        <h1 class="ph-title">Services {{$jenis}}</h1>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <center>
                    <h3>List Harga</h3>
                    <div class="line"></div>
                </center>
            </div>
            <div class="sec-content">
                <div class="row">
                    {{-- <div class="col-md-8 offset-md-2">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Merk Mobil</th>
                                    <th>Harga</th>
                                </thead>
                                <tbody>
                                    @foreach ($service as $val)
                                    <tr>
                                            <td>{{$index++}} </td>
                                            <td>{{$val['title']}}</td>
                                            <td>{{$val['harga']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    @foreach($service as $key => $val)
                    <div class="col-md-4 mb-5 item">
                        <a href="#">
                                {{-- {{url('detail/sewa-mobil/'.$val['id'])}} --}}
                            <div class="card card-paket">
                                <div class="box-img">
                                    {{-- <img src="{{asset('public/uploads/img_mobil/'.$val['img'])}}" alt=""> --}}
                                    <div style="background: url('{{asset('public/uploads/img_mobil/'.$val['img'])}}') center no-repeat; 
                                    background-size: cover;
                                    height: 200px" ></div>
                                    <div class="price"> Rp. {{number_format($val['harga'], '0', '.', ',')}} <span style="font-size: 15px">/24 jam</span> </div></div>
                                <div class="img-cpt">
                                    <h4>{{$val['title']}}</h4>
                                    <p>Kota :  </p>
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