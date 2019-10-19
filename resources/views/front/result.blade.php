<?php
    $count = 12;
    $src_key = "Bromo";
    $durartion = "2H3N";
    $nama = ''; $email = '';
    if (Auth::check() && Auth::user()->role == 1) {
        $nama = Auth::user()->name;
        $email = Auth::user()->email;
        
    }
?>
@extends('front.app')
@section('content')
    <section class="page-header">
        <div class="ph-img" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),   url('{{asset('public/front/img/ijen.jpg')}}') center no-repeat; background-size: cover">
            <h1 class="ph-title">Pilihan Destinasi</h1>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h4>@{{paket.nama || 'Not found'}} </h4>
             
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td><b>Pilih Keberangkatan</b></td>
                                    <td style="width: 70%"> 
                                            <v-date-picker 
                                            locale="id"
                                            :select-attribute='{dot: true}'
                                            :input-props='{
                                                class: "form__field",
                                                readonly: true
                                              }' :mode='mode' v-model='selectedDate' />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Pax</b></td>
                                    <td> @{{orders.nama}} Pax</td>
                                </tr>
                                <tr>
                                    <td><b>Pilih Meeting Poin</b></td>
                                    <td>
                                        <div class="form__group">
                                            <select v-model="selectedMp"  class="form__field">
                                                <option v-for="mp in meeting_point" :value="mp.id">@{{mp.nama}} </option>
                                            </select>
                                            <label for="message" class="form__label">Meeting point </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Harga tiap pax</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="row">
                            <div v-for="dest in paketDes" class="col-md-4 my-2">
                                <a v-on:click="select(dest.nama, dest.tiket, dest.id)" href="javascript:void(0)">
                                        <div class="card card-paket">
                                        <div class="box-img"><img src="{{asset('public/front/img/cpl (1).jpg')}}" alt="">
                                            <div v-if="isSelected(dest.id)" class="price">Selected</div></div>
                                        <div class="img-cpt">
                                            <h4>@{{dest.nama}} </h4>
                                            <h6>Kota @{{dest.id}} </h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="row">
                            <div v-for="dest in paketDes" class="col-md-6 my-2">
                                <div class="row-des">
                                    <table class="table table-striped" style="width: 100%">
                                        <tr>
                                            <td><h4>@{{dest.pp_pax}} Pax</h4>
                                                <p>Rp. @{{dest.pp_price}} /pax</p>
                                            </td>
                                            <td style="width: 10%"><button v-on:click="select(dest.pp_pax, dest.pp_price,dest.pp_id)" v-bind:class="{'btn-success': orders.id==dest.pp_id}" class="btn" style="width: 100%" v-html="txt(dest.pp_id)"></button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h4>Identity</h4>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped tb-pi">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form__group">
                                        <input type="text" v-model="personal_info.nama" class="form__field">
                                        <label for="message" class="form__label">Full name </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form__group">
                                        <input type="text" v-model="personal_info.alamat" class="form__field">
                                        <label for="message" class="form__label">Address </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form__group">
                                        <input type="text" v-model="personal_info.email" class="form__field">
                                        <label for="message" class="form__label">Email </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form__group">
                                        <input type="text" v-model="personal_info.hp" class="form__field">
                                        <label for="message" class="form__label">Phone </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form__group">
                                        <input type="number" min="1" v-model="personal_info.jumlah_tim" class="form__field">
                                        <label for="message" class="form__label">Team(s) </label>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-sec">
        <div class="container">
            <div class="sec-title left">
                <h4>Order Overview</h4>
            </div>
            <div class="sec-content">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td><b>Payment Method</b></td>
                                    <td style="width: 70%"> 
                                        <div class="form__group">
                                            <select v-model="selectedrek" class="form__field" name="" id="">
                                                <option v-for="rek in reks" :value="rek.rekening">@{{rek.bank_name}}</option>
                                            </select>
                                            <label for="message" class="form__label">Select Bank </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td> <h2>Rp. @{{numformat(total)}}</h2></td>
                                </tr>
                                <tr>
                                    <td><b>Payment Detail</b></td>
                                    <td> Segera transfer sebesar Rp. <b>@{{numformat(total)}}</b> Ke rekening <b>@{{selectedrek}} </b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-main float-right " v-on:click="save()">LANJUTKAN</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('custom-script')
    <script>
        Vue.use(VueLoading);
        Vue.component('loading', VueLoading)
        var app = new Vue({
            el: '#app',
            data: {
                fullPage: true,
                selectedMp: 1,
                meeting_point: [],
                mode: 'single',
                selectedDate: new Date("{{$tgl}}"),
                highlight: true,
                tgl: '{{$tgl}}',
                trx:null,
                book_code: 0,
                personal_info: {nama: '{{$nama}}', alamat: null, hp: null, email: '{{$email}}', jumlah_tim: 1, cust_id: 0},
                activeColor: 'red',
                paketId: '{{$id}}',
                base_url: '{{url("api/")}}',
                paket: [],
                ok: true,
                destinasi: [],
                paketDes: [],
                orders: {id: 0, nama: '', price: 0},
                selectedDes: [],
                reks: [], 
                selectedrek: "6278377238283728"
            },
            mounted () {
                var app = this
                axios.get(app.base_url+'/rek').then(response => {
                    app.reks = response.data
                    app.selectedrek = response.data[0].rekening
                }) .catch(error => {
                    console.log(error)
                })
                axios.get(app.base_url+'/pp/'+app.paketId).then(response => (
                    app.paketDes = response.data
                )) .catch(error => {
                    console.log(error)
                })
                axios.get(app.base_url+'/mp/').then(response => (
                    app.meeting_point = response.data
                )) .catch(error => {
                    console.log(error)
                })
                this.personal_info.cust_id = this.genId()
                this.book_code = this.genBookCode()
                
                   
            },
            computed:{
                total(){
                    var mp = 0
                    var mps = this.meeting_point
                    mps.forEach(el => {
                        if (this.selectedMp == el.id) {
                            mp = el.biaya
                        }
                    });
                    var sum = this.orders.price
                    return sum+mp
                },
                sisa(){
                    var sum = this.selectedDes.length
                    return sum
                }
            },
            methods:{
                txt: function(id){
                    if (this.orders.id == id) {
                        return '<i class="fas fa-check"></i>'
                    }
                    else{
                        return 'SELECT'
                    }
                },
                genId: function(){
                    var today = new Date();
                    var date = today.getFullYear()+''+(('00' + today.getMonth()+1).slice(-2))+''+('00' + today.getDate()).slice(-2);
                    var time = ('00' + today.getHours()).slice(-2) + "" + ('00' + today.getMinutes()).slice(-2) + "" + ('00' + today.getSeconds()).slice(-2);
                    var dateTime = date+''+time;
                    var random = Math.floor(Math.random() * Math.floor(999))
                    var id = ('000' + random).slice(-3)
                    return dateTime+''+id
                    //console.log(dateTime)
                },
                rem:function(id){
                    for (let i = 0; i < this.selectedDes.length; i++) {
                            if (id == this.selectedDes[i]) {
                                this.selectedDes.splice(i,1)
                            }
                        }
                        for (let i = 0; i < this.orders.length; i++) {
                            if (id == this.orders[i].id) {
                                this.orders.splice(i,1)
                            }
                            
                        }
                },
                select:function(nm, prc, idd){
                    this.orders.nama = nm
                    this.orders.price = prc*nm
                    this.orders.id = idd
                },
                numformat: function(num){
                    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                },
                isSelected: function(id){
                    return this.selectedDes.includes(id)
                },
                genBookCode: function(){
                    var prefix = 'BL-'
                    var today = new Date();
                    var date = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
                    var time = today.getHours() + "" + today.getMinutes();
                    var dateTime = date+'-'+time
                    return dateTime
                },
                validate: function(){
                    var rt = false
                    if (this.orders.id == 0) {
                        rt = false
                    }
                    else{
                        for (var key in this.personal_info) {
                                if (this.personal_info[key] == null) {
                                    rt = false
                                    break
                                }
                                else{
                                    rt = true
                                } 
                        }
                    }
                    return rt
                },
                save: function(){
                    if (this.validate()) {
                        let loader = this.$loading.show({
                        // Optional parameters
                            loader: 'dots',
                            container: this.fullPage ? null : this.$refs.formContainer,
                            canCancel: false,
                            onCancel: this.onCancel,
                        });
                        
                        this.trx = {
                            is_paid: '0',
                            user: this.personal_info.cust_id,
                            paket: this.paketId,
                            harga: this.total,
                            kode_booking: this.book_code,
                            jumlah_tim: this.personal_info.jumlah_tim,
                            meeting_point: this.selectedMp,
                            tgl: this.tgl
                        }
                        axios.post(this.base_url+'/customer/tambah', this.personal_info)
                        .then(function (response) {
                            var resp = response.data
                            console.log(resp.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                        axios.post(this.base_url+'/trx/save', this.trx)
                        .then(function (response) {
                            var resp = response.data
                            //console.log(resp)
                            if (resp.status == '000') {
                                window.location.href = 'trx/done/'+resp.data;
                            }
                            else{
                                alert('Menyimpan gagal');
                            }
                        })
                        
                        setTimeout(() => {
                        loader.hide()
                        },5000)       
                    }
                    else{
                        alert('lengkapi semua form')
                    }
               
                    
                }
            }
        })
    </script>
    @endsection

    <!--
        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                    <div class="form__group">
                                        <select class="form__field" name="" id="">
                                            <option v-for="item in paket" value="">@{{item.nama}}</option>
                                        </select>
                                        <label for="message" class="form__label">Paket</label>
                                    </div>
                            </div>
                        </div>
                    </div>
    -->