
@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
            <h1 class="ph-title">Frequently Asked Question</h1>
        </div>
        <style>
            .ui-state-active{
                background-color: #138496;
                border: unset;
            }
            .ui-accordion-header{
                padding: 70px;
                border-radius: unset;
            }
        </style>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h4>{{$iden['title']}}</h4>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordion">
                                @for ($i = 0; $i < count($iden['content'])-2; $i++)
                                <?php $item = $iden['content'] ?>
                                <h3>{{$item[$i]['q']}} </h3>
                                <div>
                                    <p>
                                            {{$item[$i]['a']}} 
                                    </p>
                                </div>
                                @endfor
                            </div>
                            <br>
                            <b><p>{{$iden['content'][count($iden['content'])-1]}} </p></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')
   <script>
       $('#accordion').accordion()
   </script>
    @endsection