@extends('admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Harga per pax</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <a href="{{url('mitra/paket/')}} " class="m-0"> <span class="fas fa-arrow-left"></span> Back</a>
              </div>
              <div class="card-body">

                <div id="app" class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jumlah Pax</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td><input type="text" v-model="pax_name" class="form-control"></td>
                                <td><input type="text" v-model="pax_price" class="form-control"></td>
                                <td> 
                                    <a v-on:click="save(paketId)" class="btn btn-success edit-des" href="javascript:void(0)"><span class="fas fa-save"></span></a> 
                                </td>
                            </tr>
                            <tr v-for="(p, index) in paketPax">
                                <td>@{{index+1}} </td>
                                <td>@{{p.name}} </td>
                                <td>@{{p.price}} </td>
                                <td> 
                                    <a class="btn btn-light edit-des" v-on:click="hapus(p.id, index)" href="javascript:void(0)"><span class="fas fa-trash"></span></a> 
                                </td>
                            </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('custom-script')
      <script>
          var app = new Vue({
              el: "#app",
              data:{
                pax_name:null,
                pax_price: null,
                paketId: '{{$id}}',
                base_url: '{{url("api/")}}',
                paketPax: []
              },
              mounted(){
                    axios.get(this.base_url+'/pp/'+this.paketId).then(response => {
                            // console.log(response)
                        response.data.forEach(resp => {
                            var r = resp
                            this.paketPax.push({name: r.pp_pax, price: r.pp_price, id: r.pp_id})
                            console.log(resp)
                        });
                    }) .catch(error => {
                        console.log(error)
                    })
              },
              methods:{
                  save: function(id){
                      var data = {paket: id, pax: this.pax_name, price: this.pax_price}
                        axios.post(this.base_url+'/pp/add', data).then(response => {
                            resp = response.data
                            this.paketPax.push({name: resp.pp_pax, price: resp.pp_price, id: resp.pp_id})  
                            this.pax_price = ''
                            this.pax_name = ''
                        }) .catch(error => {
                            console.log(error)
                        })
                  },
                  hapus: function(pp, index){
                    //   alert(pp)
                    // alert(index)
                    if (confirm('Ingin menghapus ?')) {
                        var dr = {id:pp}
                        axios.delete(this.base_url+'/pp/destroy', {data: dr}).then(response => {
                            // alert(response.data)
                            this.paketPax.splice(index,1)                            
                        }) .catch(error => {
                            console.log(error)
                        })
                    } else {
                        // Do nothing!
                    }
                  }
              }
          })
      </script>
  @endsection