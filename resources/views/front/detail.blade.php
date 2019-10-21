
@extends('front.app')
@section('content')
<style>
.timeline {
    position: relative;
    padding: 21px 0px 10px;
    margin-top: 4px;
    margin-bottom: 30px;
}

.timeline .line {
    position: absolute;
    width: 4px;
    display: block;
    background: currentColor;
    top: 0px;
    bottom: 0px;
    /* margin-left: 30px; */
}

.timeline .separator {
    border-top: 1px solid currentColor;
    padding: 5px;
    padding-left: 40px;
    font-style: italic;
    font-size: .9em;
    /* margin-left: 30px; */
}

.timeline .line::before { top: -4px; }
.timeline .line::after { bottom: -4px; }
.timeline .line::before,
.timeline .line::after {
    content: '';
    position: absolute;
    left: -4px;
    width: 12px;
    height: 12px;
    display: block;
    border-radius: 50%;
    background: currentColor;
}

.timeline .panel {
    position: relative;
    margin: 10px 0px 21px 70px;
    clear: both;
}

.timeline .panel::before {
    position: absolute;
    display: block;
    top: 8px;
    left: -24px;
    content: '';
    width: 0px;
    height: 0px;
    border: inherit;
    border-width: 12px;
    border-top-color: transparent;
    border-bottom-color: transparent;
    border-left-color: transparent;
}

.timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
.timeline .panel .panel-heading.icon {
    position: absolute;
    left: -59px;
    display: block;
    width: 40px;
    height: 40px;
    padding: 0px;
    border-radius: 50%;
    text-align: center;
    float: left;
}

.timeline .panel-outline {
    border-color: transparent;
    background: transparent;
    box-shadow: none;
}

.timeline .panel-outline .panel-body {
    padding: 10px 0px;
}

.timeline .panel-outline .panel-heading:not(.icon),
.timeline .panel-outline .panel-footer {
    display: none;
}
.tab-nav{
    display: none;
}
@media (max-width: 992px) {
    .tab-content{
        margin-top: 60px;
        margin-bottom: 60px;
        /* overflow: auto;
        white-space: nowrap; */
    }  
    .nav-item{
        width: 100%;
        display: none;
    }
    .active-nav{
        width: auto;
        margin-left: auto;
        margin-right: auto;
        display: block!important;
        border-bottom: 2px  solid #17a2b8;
    }
    .nav-link.active{
        border: unset!important;
        text-align: center;
    }
    .tab-nav{
        display: block;
        top: 20%;
        font-size: 25px;
        color: grey;
        position: absolute;
    }
    .left{
        left: 0;
    }
    .right{
        right: 0;
    }
}

</style>
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
                    <div class="col-md-9 my-2">
                        <div class="detail-header">
                            <img src="{{url('public/uploads/img_paket/'.$pd[0]->cover_img )}}" style="width: 100%" alt="">
                        </div>
                        <div class="detail-content my-3 ">
                            <p>Start from</p>
                            <h2 >Rp. {{number_format($pp[0]->pp_price, '0', '.',',')}}</h2>
                            <div class="line"></div>
                            <ul style="position: relative" class="nav nav-tabs my-3" id="myTab" role="tablist">
                               {{-- <div class="scroller"> --}}
                                    <li class="nav-item active-nav">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" id="iten-tab" data-toggle="tab" href="#iten" role="tab" aria-controls="iten" aria-selected="false">Itinerary</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">List Harga</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Include & Exclude</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="ket-tab" data-toggle="tab" href="#ket" role="tab" aria-controls="contact" aria-selected="false">Keterangan Tambahan</a>
                                    </li>
                               {{-- </div> --}}
                                    <span class="fas fa-chevron-left tab-nav left" id="prev"></span>
                                    <span class="fas fa-chevron-right tab-nav right" id="next"></span>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="iten" role="tabpanel" aria-labelledby="iten-tab">
                                        {{-- <p>  //$pd[0]->desc </p> --}}
                                        <div class="timeline">
                                            @foreach ($iten as $item => $val)
                                                <div class="line text-muted"></div>
                                                <div class="separator text-muted">
                                                    <time><i class="fas fa-calendar mr-2"></i> {{$val->jadwal}}</time>
                                                </div><article class="panel panel-danger panel-outline"><div style="white-space: pre-line;">{{$val->content}}</div>
                                                </article> 
                                            @endforeach                                    
                                        
                                        </div>
                                </div>
                                <style>
                                    .include{
                                        color: green;
                                    }
                                    .exclude{
                                        color: red;
                                    }
                                    .harga{
                                        /* color: rgba(243, 183, 42, 1); */
                                        font-size: 30px;

                                    }
                                    .pax{
                                        color: rgba(243, 183, 42, 1);
                                        font-size: 20px;
                                    }
                                
                                </style>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    @foreach($ie as $key => $val)
                                        <p class="@if($val->is_include) include @else exclude @endif"> <span class="fas @if($val->is_include) fa-check @else fa-times @endif"></span> {{$val->name}} </p>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade show active"  id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p> <?= $pd[0]->desc ?> </p>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    @foreach($pp as $key => $val)
                                        <ul style="list-style: none; padding-left: 0">
                                            <li> <span class="pax">{{$val->pp_pax}} Pax</span> <br><span class="harga">{{"Rp. ". number_format($val->pp_price, '0', ",", ".")}}</span> </li>
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="ket" role="tabpanel" aria-labelledby="contact-tab">
                                    <p>Apabila hari besar terkena charge tambahan</p>
                                    <p>
                                        <?= $pd[0]->noted ?>
                                    </p>
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
   <script>
       var menus = ["#home", "#iten", "#contact", "#profile", "#ket"]
       var tabs = ["#home-tab", "#iten-tab", "#contact-tab", "#profile-tab", "#ket-tab"]
       var current = 0
       $('#prev').click(function(){
           if (current!=0) {
                $(menus[current]).removeClass("show")
                $(menus[current]).removeClass("active")
                $(tabs[current]).parents(".nav-item").removeClass("active-nav")
                current--
                setActive(current)
           }

       })
       $('#next').click(function(){
           if (current<menus.length-1) {
                $(menus[current]).removeClass("show")
                $(menus[current]).removeClass("active")
                $(tabs[current]).parents(".nav-item").removeClass("active-nav")
                current++
                setActive(current)
           }

       })
       function setActive(idx) {
           $(menus[idx]).addClass("show")
           $(menus[idx]).addClass("active")
           $(tabs[idx]).parents(".nav-item").addClass("active-nav")
           $(tabs[idx]).addClass("active")
       }
   </script>
    @endsection