<?php
$meta_sf = 'Sebuah platform yang menyediakan paket liburan daerah Jawa timur. Malang, banywangi dan sekitarnya. Anda akan mendapatkan harga terbaik untuk liburan tanpa perlu khawatir akan fasilitas pendukung, seperti Hotel, sewa mobil dan antar jemput fasilitas transportasi umum, seperti terminal bandara, atau stasiun.';
$meta_tag = (isset($meta)) ? $meta.' | '.$meta_sf :  $meta_sf;
$title = (isset($meta)) ? $meta.' - Booking Liburan' : 'Booking Liburan | Temukan harga terbaik untuk liburanmu' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{$meta_tag}} ">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('public/front/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('public/front/css/jquery-ui.css')}} ">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('public/front/logo-transparan.png')}}" type="image/png" />

    <link href="https://fonts.googleapis.com/css?family=Gayathri|Lexend+Peta&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Manjari:400,700&display=swap&subset=malayalam" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public/izi')}}/vue-datetime.min.css">
    <link rel="stylesheet" href="{{asset('public/izi')}}/iziToast.min.css">
    <link rel="stylesheet" href="{{asset('public/owl')}}/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('public/owl')}}/owl.theme.default.min.css">
    <link href="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3/dist/vue-loading.css" rel="stylesheet">

<?php
use App\Http\Controllers\HomeController;
?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="{{url('')}}"><img style="width: 70px" src="{{asset('public/front/logo-transparan.png')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{url('faq')}}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)"  data-toggle="modal" data-target="#cekBooking">Cek Booking</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://wa.me/6282245250240?text=Halo, saya ingin bertanya tentang Bookingliburan.com" target="_blank"><span class="fab fa-whatsapp"></span> Whatsapp</a>
                </li>
                @if(!Auth::check() || Auth::user()->role == 0)
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)"  data-toggle="modal" data-target="#user"><span class="fas fa-user"></span> Account</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a  id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="fas fa-user"></span> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="#" class="dropdown-item">Personal Info</a>
                            <a href="#" class="dropdown-item">   Points <span style="color: green">{{Auth::user()->point}}</span></a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endif
            </ul>
          </div>
        </div>
    </nav>
      <div id="app">
            @yield('content')
      </div>
      <style>
          .foot-tb td:first-child{
            width: 13%;
          }
          .validation-failed .form__field{
            border-bottom: 2px solid red;
          }
          .validation-failed label{
              color: red;
          }

      </style>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 my-2">
                    <h5>Tentang Kami</h5>
                    <div class="line white"></div>
                    <table class="foot-tb">
                        <tr>
                            <td><span class="fas fa-map"></span></td>
                            <td>Perumahan Griya Shanta Blok H235, Lowokwaru <br>  Kota Malang, Jawa Timur </td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-phone"></span></td>
                            <td>+62 822 4525 0240</td>
                        </tr>
                        <tr>
                            <td><span class="fas fa-envelope"></span></td>
                            <td><a style="color: white" href="mailto:bookingliburancs@gmail.com">bookingliburancs@gmail.com</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4 my-2">
                    <h5>Produk</h5>
                    <div class="line white"></div>
                    <ul class="footer-item">
                        <li><a href="">Paket Liburan</a></li>
                        <li><a href="">Sewa Mobil</a></li>
                        <li><a href="">Sewa Villa</a></li>
                    </ul>
                </div>
                <div class="col-md-4 my-2">
                    <h5>Perusahaan</h5>
                    <div class="line white"></div>
                    <ul class="footer-item">
                        @foreach (HomeController::getIdentitas() as $key => $value)
                            <li><a href="{{url('perusahaan/'.$key)}}">{{$value['title']}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div style="width: 100%; height: auto; color: white; background-color: black; padding: 10px">
        <center>Copyright © 2019 Bookingliburan.com. All Rights Reserved</center>
    </div>
    <div class="modal fade" id="cekBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cek Status Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="modalBooking" class="modal-body">
            <div class="book-status">
                <div class="row">
                    <div class="col-md-12">
                        <center><b><p>Book id @{{book_code}} </p></b></center>
                    </div>
                    <div class="col-md-6">
                        <center>
                            <b><p>Tanggal Berangkat</p></b>
                            <p>@{{tgl_brkt}} </p>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>
                            <b><p>Meeting Point</p></b>
                            <p>@{{meeting_point}} </p>
                        </center>
                    </div>
                    <div class="col-md-12">
                        <button v-if="isFound" v-on:click="print()" class="btn btn-success btn-sm">Print Invoice</button>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <input  type="text" v-model="book_code" class="form__field">
                <label for="message" class="form__label">Kode Booking </label>
            </div>
            <br>
            <button v-on:click="cari" type="button" style="height: 50px" class="btn btn-main">CEK</button>
            <br>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="modal" class="modal-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="form__group">
                <input v-model="email" required type="email" class="form__field" name="email" autocomplete="email">
                <label for="email" class="form__label">Email </label>
            </div>
            <div class="form__group">
                <input type="password" name="password" required class="form__field">
                <label for="pwd" class="form__label">Passowrd </label>
            </div>
            <br>
            <button type="submit" style="height: 50px" class="btn btn-main">LOGIN</button>
            <br>
            <br>
        </form>
        <p>Belum Memiliki akun? <a href="javascript:void(0)" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#register">Daftar disini</a></p>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="modalReg" class="modal-body">
                <form method="POST" @submit="checkForm" action="{{ route('register') }}">
                        @csrf
                <div v-bind:class="{'validation-failed': validateName()}" class="form__group">
                    <input id="name" v-model="fullname" type="text" class="form__field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="email" class="form__label">Name </label>
                    
                </div>
                <div v-bind:class="{'validation-failed': validateEmail()}" class="form__group">
                        <input id="email" v-model="email" type="email" class="form__field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email" class="form__label">Email Address </label>
                        
                </div>
                <div v-bind:class="{'validation-failed': validatePass()}" class="form__group">
                        <input id="password" v-model="password" type="password" class="form__field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="email" class="form__label">Passowrd </label>
                        <small style="color: red">@{{pwdError}}</small>
                </div>
                <div class="form__group">
                        <input id="alamat" v-model="alamat" type="text" class="form__field @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat">
                        <label for="alamagt" class="form__label">Alamat </label>
                </div>
                <div class="form__group">
                        <input id="hp" v-model="hp" type="text" class="form__field @error('hp') is-invalid @enderror" name="hp" required autocomplete="hp">
                        <label for="alamagt" class="form__label">HP </label>
                </div>
                <div v-bind:class="{'validation-failed': validateNewPass()}" class="form__group">
                    <input id="password-confirm" v-model="newPassword" type="password" class="form__field" name="password_confirmation" required autocomplete="new-password">
                    <label for="email" class="form__label">Retype Password</label>
                    <small style="color: red">@{{newPwdError}}</small>
                </div>
                <br>
                <button type="submit" style="height: 50px" class="btn btn-main">Register</button>
                <br>
                <br>
            </form>
        <p>Already have an account? <a href="javascript:void(0)" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#user">Login disini</a></p>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
</body>
<script src="{{asset('public/front/js/jquery.min.js')}}"></script>
<script src="{{asset('public/front/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/front/js/popper.min.js')}}"></script>
<script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/vue.js')}}"></script>
<script src="{{asset('public/axios.min.js')}}"></script>
<script src="{{asset('public/v-calendar.umd.min.js')}}"></script>
<script src="{{asset('public/izi/iziToast.min.js')}}"></script>
<script src="{{asset('public/owl/owl.carousel.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3"></script>
@error('email')
    <script>
        iziToast.error({
            title: 'Failed',
            message: '{{ $message }}',
            position: 'topRight',
        });
        $('#user').modal('show')
    </script>
@enderror
@if (Session::get('msg'))
<script>
    msg = " {{Session::get('msg')}} "
    
    iziToast.success({
            title: 'Success',
            message: msg,
            position: 'topRight',
        });
</script>
@endif
@yield('custom-script')
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d846f1cc22bdd393bb6d308/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
<script>
    new Vue({
        el: "#modalReg",
        data: {
            email: null,
            fullname: null,
            password: null,
            alamat: null,
            hp: null,
            newPassword: null,
            errors: [],
            pwdError: '',
            newPwdError: ''
        },
        methods:{
            validateName: function(){
                if (this.fullname=='') {
                    return true
                }
                else{
                    return false
                    for (let i = 0; i < this.errors.length; i++) {
                        if (this.errors[i] == 'name') {
                            this.errors.splice(i,1)
                        }
                        
                    }
                }
            },
            validatePass:function(){
                var rt = false
                if (this.password!=null) {
                    if (this.password.length  < 8) {
                        rt = true
                        this.pwdError = 'Password minimal 8 digit'
                    }else{
                        rt = false
                        this.pwdError = ''
                    }
                }
                return rt
            },
            validateNewPass:function(){
                var rt = false
                if (this.password != this.newPassword) {
                        rt = true
                        this.newPwdError = 'Password tidak sama'
                    }else{
                        rt = false
                        this.newPwdError = ''
                    }
                return rt
            },
            checkForm: function(e){
                console.log(this.errors)
                if (this.password == this.newPassword && this.password.length>=8) {
                    return false
                }   
                e.preventDefault()
            },
            validateEmail:function(){
                var sba = '@'
                var sbt = '.'
                if (this.email != null) {
                    if (this.email.includes(sba)) {
                        if (this.email.includes(sbt)) {
                            return false
                            for (let i = 0; i < this.errors.length; i++) {
                                if (this.errors[i] == 'email') {
                                    this.errors.splice(i,1)
                                }
                                
                            }
                        }
                        else{
                            return true
                        }
                    }
                    else{
                        return true
                    }
                }
                
            },
            pwdMatch: function(){
                if (this.password==this.newPassword) {
                    return true
                }
                else{
                    return false
                }
            },
        }
    })
    new Vue({
        el: "#modal",
        data: {
            email: null,
            password: null
        },
        methods: {
            validateEmail:function(){
                var sba = '@'
                var sbt = '.'
                if (this.email != null) {
                    if (this.email.includes(sba)) {
                        if (this.email.includes(sbt)) {
                            return false
                            for (let i = 0; i < this.errors.length; i++) {
                                if (this.errors[i] == 'email') {
                                    this.errors.splice(i,1)
                                }
                                
                            }
                        }
                        else{
                            return true
                        }
                    }
                    else{
                        return true
                    }
                }
                
            },
        }
    })
    new Vue({
        el: "#modalBooking",
        data: {
            url: '{{url("trx/print/")}}',
            base_url: '{{url("api/")}}',
            tgl_brkt: "-----",
            book_code: "",
            meeting_point: "-----",
            isFound: false
        },
        mounted(){
            var app = this 
            /*axios.get(app.base_url+'/order/'+app.book_code).then(response => (
                    app.paket = response.data,
                    app.orders.push({name: app.paket.nama, price: app.paket.harga, id:0}),
                    console.log(app.orders)
                )) .catch(error => {
                    console.log(error)
                })*/
        },
        methods:{
            
            print: function(){
                window.open(this.url+'/'+this.book_code, '_blank')
            },
            cari: function(){
                var app = this 
                var tgl = "29 September 2019"
                var mp = "Malang Arjosari"
                axios.get(app.base_url+'/transaksi/'+app.book_code).then(response => {
                    var resp = response.data[0]
                    console.log(response)
                    app.tgl_brkt = resp.tgl_brkt
                    app.meeting_point = resp.namaMp   
                    app.isFound = true
                }) .catch(error => {
                    console.log(error)
                })
            }
        }
    })
    
    $(window).resize(function() {
        // This will fire each time the window is resized:
        if($(window).width() <= 768) {
            $('nav').toggleClass('bg-dark')
            $('nav').removeClass('navbar-dark')
            $('nav').toggleClass('navbar-light')
        } else{
            $(window).scroll(function(){
        $('nav').toggleClass('bg-dark', $(this).scrollTop() > 50);
    });
        }
    }).resize(); 
</script>
</html>