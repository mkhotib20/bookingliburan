@extends('admin.app')

@section('content')
<style>
    textarea{
        white-space: pre-line;
    }
        /* The container */
        .outer {
          display: block;
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 22px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }
        
        /* Hide the browser's default checkbox */
        .outer input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
          height: 0;
          width: 0;
        }
        
        /* Create a custom checkbox */
        .checkmark {
          position: absolute;
          top: 0;
          left: 0;
          height: 25px;
          width: 25px;
          background-color: #eee;
        }
        
        /* On mouse-over, add a grey background color */
        .outer:hover input ~ .checkmark {
          background-color: #ccc;
        }
        
        /* When the checkbox is checked, add a blue background */
        .outer input:checked ~ .checkmark {
          background-color: #2196F3;
        }
        
        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
          content: "";
          position: absolute;
          display: none;
        }
        
        /* Show the checkmark when checked */
        .outer input:checked ~ .checkmark:after {
          display: block;
        }
        
        /* Style the checkmark/indicator */
        .outer .checkmark:after {
          left: 9px;
          top: 5px;
          width: 5px;
          height: 10px;
          border: solid white;
          border-width: 0 3px 3px 0;
          -webkit-transform: rotate(45deg);
          -ms-transform: rotate(45deg);
          transform: rotate(45deg);
        }
        </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Include & Exclude | {{$paket->nama}} </h1>
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
                                <th style="width: 30%">Nama</th>
                                <th>Itinerary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td><input type="text" ref="jadwal" v-model="jadwal" class="form-control"></td>
                                <td>
                                    <textarea name="iten" v-model="content" class="form-control" style="height:200px" ></textarea>
                                </td>
                                <td> 
                                    <a v-on:click="save(paketId)" class="btn btn-success edit-des" href="javascript:void(0)"><span class="fas fa-save"></span></a> 
                                </td>
                            </tr>
                            <tr v-for="(p, index) in allIe">
                                <td>@{{index+1}} </td>
                                <td>@{{p.jadwal}} </td>
                                <td style="white-space: pre-line;">@{{p.content}} </td>
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
        //   $("#simpleSummernote").summernote({
        //       toolbar: false,
        //       height: 250
        //   })
          var app = new Vue({
              el: "#app",
              data:{
                allIe: [],
                content: '',
                jadwal: '',
                base_url: '{{url("api/")}}',
                paketId: '{{$id}}',
              },
              mounted(){
                    this.$refs.jadwal.focus()
                    axios.get(this.base_url+'/getIten/'+this.paketId).then(response => {
                        response.data.forEach(resp => {
                            this.allIe.push(resp)
                        });
                    }) .catch(error => {
                        console.log(error)
                    })
              },
              methods: {
                  save: function(id){
                        var data = {jadwal: this.jadwal, content: this.content, id: this.paketId}
                        axios.post(this.base_url+'/paket/addIt', data).then(response => {
                            resp = response.data
                            this.allIe.push(resp)
                            // console.log
                            this.jadwal=''
                            this.content=''
                            this.$refs.jadwal.focus()
                        }) .catch(error => {
                            console.log(error)
                        })
                  },
                  hapus: function(pp, index){
                    if (confirm('Ingin menghapus ?'+pp)) {
                        var dr = {id:pp}
                        axios.delete(this.base_url+'/it/destroy', {data: dr}).then(response => {
                            this.allIe.splice(index,1)                            
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