@extends('admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paket</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <style>
      .dropdown-menu a, .dropdown-menu button{
        width: 100%;
        text-align: left;
      }
    </style>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">List Paket</h5>
              </div>
              <div class="card-body">
                <a  data-toggle="modal" id="add" data-target="#modal-default" class="btn btn-success " href=""><span class="fas fa-plus"></span> Paket</a>
                <br><br>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Paket</th>
                                <th>Durasi</th>
                                {{-- <th>Kuota Paket</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index=1; ?>
                            @foreach($paket as $key => $value)
                            <tr>
                                <td>{{$index++}}</td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->durasi}}</td>
                                {{-- <td>{{$value->kuota}}</td> --}}
                                <td> 
                                    <div class="dropdown show">
                                        <a class="btn btn-default dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" 
                                        aria-haspopup="true" aria-expanded="false">
                                          Options
                                        </a>
                                      
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="btn btn-light edit-des" data-id="{{$value->id}}" href="javascript:void(0)"> Edit</a> 
                                            <form action="{{ route('paket.destroy', $value->id) }}" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @method('DELETE')
                                                <button class="btn btn-light" type="submit"> Hapus</button>
                                            </form>
                                            <a class="btn btn-light edit-des" href="{{url('mitra/paket/list-harga/'.$value->id)}}"> Harga per Pax</a>  
                                            <a class="btn btn-light edit-des" href="{{url('mitra/paket/list-destinasi/'.$value->id)}}"> Destinasi</a> 
                                            <a class="btn btn-light edit-des" href="{{url('mitra/paket/des/'.$value->id)}}"> Deskripsi</a> 
                                            <a class="btn btn-light edit-des" href="{{url('mitra/paket/it/'.$value->id)}}"> Itinerary </a> 
                                            <a class="btn btn-light edit-des" href="{{url('mitra/paket/img/'.$value->id)}}"> Gambar Paket </a> 
                                            <a class="btn btn-light edit-des" href="{{url('mitra/paket/ie/'.$value->id)}}"> Include & Exclude</a>
                                        </div>
                                      </div>
                                </td>
                              </tr>
                              @endforeach
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Paket</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{url('mitra/paket/')}}" method="post" id="form-Paket">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="">Nama Paket</label>
                        <input required type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Durasi</label>
                      <input required type="text" name="durasi" placeholder="contoh : 3H2M" id="durasi" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="">Kota</label>
                      <select required class="form-control" id="kota" name="kota">
                          <option disabled selected>--pilih kota--</option>
                          @foreach($kota as $key => $value)
                              <option value="{{$value->id}}">{{$value->nama}}</option>
                          @endforeach
                      </select>
                  </div>
                    {{-- <div class="form-group">
                        <label for="">Harga Paket</label>
                        <input required type="text" name="harga" id="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kuota Paket</label>
                        <input required type="number" min="1" value="1" name="kuota" id="kuota" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kuota Paket</label>
                        <textarea required name="desc" id="desc" class="form-control"></textarea>
                    </div> --}}
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Save changes">
            </form>
            </div>
          </div>
        </div>
    </div>
  @endsection
  @section('custom-script')
  <script>
      
    $('#add').click(function(){
        $('#nama').val('')
        $('#durasi').val('')
        $('#kota').val('')
        $('#desc').val('')
            $('#modal-default').modal('show')
        $('#id').val('')
    })
      $(document).on('click', '.edit-des', function(){
        var id = $(this).data('id')
        var url = "{{url('mitra/paket/')}}"+'/'+id
        $.get( url, function(data) {
            nama = data.nama
            kota = data.kota
            durasi = data.durasi
            desc = data.desc
            $('#nama').val(nama)
            $('#durasi').val(durasi)
            $('#kota').val(kota)
            $('#desc').val(desc)
            $('#id').val(id)
            $('#modal-default').modal('show')
        });
      })      


  </script>
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  </script>
      @if (Session::get('sukses'))
      <script>
          Toast.fire({
            type: 'success',
            title: "{{Session::get('sukses')}}"
            })
      </script>
      @endif
  @endsection