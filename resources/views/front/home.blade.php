@extends('front.app')
@section('content')
<header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          
          <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),  url('{{asset("public/front/img/night_paradise.jpg")}}') center no-repeat; background-size: cover">
              
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{asset("public/front/img/teluk_ijo_bwx.jpg")}}') center no-repeat; background-size: cover">
              
            </div>
            <div class="carousel-item" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{asset("public/front/img/jodipan.jpg")}}') center no-repeat; background-size: cover">
            </div>
          </div>
         <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>-->
        </div>
        <div class="carousel-caption d-md-block bg-crs">
            <h2 class="main-title">@lang('messages.welcome')</h2>
            <p>Temukan lebih dari 100 destinasi wisata</p>
            <form id="formCari" action="{{url('result')}} " method="GET">
            <input type="hidden" name="jkjaBA782hJA" value="{{csrf_token()}}">
                <input type="hidden" name="id_paket" id="idPaket" value="null">
                <div class="row">
                    <div class="col-md-12">
                        <div class="rrr my-2">
                            <span class="fas fa-search icon-src"></span>
                            <input id="src-des" placeholder="Mau liburan kemana?" required autofocus type="text" class="form-control form-cari">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="rrr my-2">
                            <span class="fas fa-calendar icon-src"></span>
                            <v-date-picker 
                                            mask='11/11'
                                            locale="id"
                                            :select-attribute='{dot: true}'
                                            :input-props='{
                                                class: "form-control form-cari",
                                                readonly: true,
                                                name: "tgl"
                                              }' :mode='mode' v-model='selectedDate' />
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <button type="submit" class="btn btn-info btn-block btn-cari">SEARCH</button>
                    </div>
                </div>
            </form>
        </div>
    </header>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title">
                <h2>Layanan Kami</h2>
                <div class="line mx-auto"></div>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="col-6 col-lg-2 my-2">
                        <a href="#">
                            <div class="card-shell">
                                <div class="card card-1">
                                    <img class="img-srv" src="{{asset('public/front/icon/paket_wisata.svg')}}" alt="">
                                </div>
                                <div class="card-title px-3">
                                    <p><b>Paket Wisata</b></p>
                                    <div class="line cw mx-auto"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-2 my-2">
                        <a href="#">
                            <div class="card-shell">
                                <div class="card card-1">
                                    <img class="img-srv" src="{{asset('public/front/icon/mobil.svg')}}" alt="">
                                </div>
                                <div class="card-title px-3">
                                    <p><b>Sewa Mobil</b></p>
                                    <div class="line cw mx-auto"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-2 my-2">
                        <a href="#">
                            <div class="card-shell">
                                <div class="card card-1">
                                    <img class="img-srv" src="{{asset('public/front/icon/outbond.svg')}}" alt="">
                                </div>
                                <div class="card-title px-3">
                                    <p><b>Outbond</b></p>
                                    <div class="line cw mx-auto"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-2 my-2">
                        <a href="#">
                            <div class="card-shell">
                                <div class="card card-1">
                                    <img class="img-srv" src="{{asset('public/front/icon/tiket.svg')}}" alt="">
                                </div>
                                <div class="card-title px-3">
                                    <p><b>Tiket Event</b></p>
                                    <div class="line cw mx-auto"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-2 my-2">
                        <a href="#">
                            <div class="card-shell">
                                <div class="card card-1">
                                    <img class="img-srv" src="{{asset('public/front/icon/motor.svg')}}" alt="">
                                </div>
                                <div class="card-title px-3">
                                    <p><b>Sewa Motor</b></p>
                                    <div class="line cw mx-auto"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-2 my-2">
                        <a href="#">
                            <div class="card-shell">
                                <div class="card card-1">
                                    <img class="img-srv" src="{{asset('public/front/icon/vila.svg')}}" alt="">
                                </div>
                                <div class="card-title px-3">
                                    <p><b>Sewa Villa</b></p>
                                    <div class="line cw mx-auto"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title">
                <h2>Package from us</h2>
                <div class="line mx-auto"></div>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="owl-carousel owl-theme owl-loaded">
                        @foreach($paket as $key => $val)
                        <div class="col-md-12 item">
                            <a href="{{url('detail?jkjaBA782hJA='.csrf_token().'&id_paket='.$val->idPaket)}} ">
                                <div class="card card-paket">
                                    <div class="box-img"><img src="{{asset('public/front/img/cpl (1).jpg')}}" alt="">
                                        <div class="price">Rp. {{number_format($val->harga, '0', '.', ',')}}</div></div>
                                    <div class="img-cpt">
                                        <h4>{{$val->namaPaket}}</h4>
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
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title">
                <h2>Our article</h2>
                <div class="line mx-auto"></div>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="owl-carousel owl-theme owl-loaded">
                        @foreach($article as $key => $val)
                        <div class="col-md-12 item">
                            <a href="{{url('article/'.$val->slug)}} ">
                                <div class="card card-paket">
                                    <div class="box-img"><div style="
                                            background: url('{{asset('public/uploads/img_article/'.$val->cover_img)}}') center no-repeat; 
                                            height: 250px;
                                            background-size: cover;
                                    " >
                                    </div></div>
                                    <div class="img-cpt">
                                        <h4>{{$val->title}}</h4>
                                        <div style="opacity: 0.6" ><span class="fas fa-eye"></span> {{$val->views}} </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')
    <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            loop:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>" ],
                },
                600:{
                    items:2,
                    nav:false,
                    navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>" ],
                },
                1000:{
                    items:3,
                    nav:true,
                    navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>" ],
                }
            }
        })
    });
    </script>
    <script>
        Vue.use(VueLoading);
Vue.component('loading', VueLoading)
         var app = new Vue({
            el: '#app',
            data: {
                mode: 'single',
                selectedDate: new Date("22/09/2019"),
                highlight: true,
            }
        })
        $(document).ready(function(){
            $('#formCari').submit(function(e){
                e.preventDefault
                if ($('#idPaket').val()=='null' || $('#datepicker').val()=='') {
                    return false
                }
            })
            var data = []
            var base_url = '{{url("api")}}/'
            $.get(base_url+"despaket", function(resp){
                resp.forEach(el => {
                   data.push({value: el.namaPaket, label: el.namaDes, paket: el.idPaket}) 
                });
            })
            console.log(data)
            $('#src-des').keypress(function(){
                $('#idPaket').val('null')
            })
            $elem = $("#src-des").autocomplete({
                source: function (request, response) {
                            var term = $.ui.autocomplete.escapeRegex(request.term)
                                , startsWithMatcher = new RegExp("^" + term, "i")
                                , startsWith = $.grep(data, function(value) {
                                    return startsWithMatcher.test(value.label || value.value || value);
                                })
                                , containsMatcher = new RegExp(term, "i")
                                , contains = $.grep(data, function (value) {
                                    return $.inArray(value, startsWith) < 0 &&
                                        containsMatcher.test(value.label || value.value || value);
                                });
                    
                            response(startsWith.concat(contains));
                },
                sortResults: false,
                select: function (event, ui) {
                    $('#idPaket').val(ui.item.paket)
                    
                }
            })
            elemAutocomplete = $elem.data("ui-autocomplete") || $elem.data("autocomplete");
            if (elemAutocomplete) {
                elemAutocomplete._renderItem = function (ul, item) {
                    var newText = String(item.label).replace(
                            new RegExp(this.term, "gi"),
                            "<span class='ui-state-highlight'>$&</span>");

                    return $("<li></li>")
                        .data("item.autocomplete", item)
                        .append("<div> <span class='fas fa-map'></span> " + item.value+" <br>"+newText+"</div>")
                        .appendTo(ul);
                };
            }
            $( "#datepicker" ).datepicker();
            //$('.select2').select2();
        })
    </script>
    @endsection