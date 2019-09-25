<?php
?>

@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
            <h1 class="ph-title">Success</h1>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inv p-3">
                            <h3 class="text-center">Your Invoice</h3>
                            <div class="line-dash"></div>
                            <br>
                            <table class="table table-striped" style="width: 100%">
                                
                                <tr>
                                    <td style="width: 50%">Booking Code</td>
                                    <td>{{$trx->kode_booking}}</td>
                                </tr>
                                <tr>
                                    <td>Pilihan Paket</td>
                                    <td><b>{{$trx->namaPaket}}</td>
                                </tr>
                                <tr>
                                    <td>Destinasi</td>
                                    <td>@foreach ($itd as $val){{$val->nama.', ' }}@endforeach</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><h3>Rp. {{number_format($trx->harga, '0', ',', '.')}}</h3></td>
                                </tr>        
                                <tr>
                                    <td>Meeting Point</td>
                                    <td>{{$trx->meeting_point}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Tim</td>
                                    <td>{{$trx->jumlah_tim}}</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>{{$trx->tgl_brkt}}</td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td><a href="{{url('trx/print/'.$trx->kode_booking)}} " target="_blank" class="btn btn-success">Print</a></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')

    @endsection

