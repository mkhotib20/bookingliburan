@extends('admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Destinasi</h1>
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
                <h5 class="m-0">List Destinasi</h5>
              </div>
              <div class="card-body">
                <a  data-toggle="modal" data-target="#modal-default" class="btn btn-success " href=""><span class="fas fa-plus"></span> Destinasi</a>
                <br><br>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Destinasi</th>
                                {{-- <th>Harga Tiket</th> --}}
                                <th>Kota</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index=1; ?>
                            @foreach($dest as $key => $value)
                            <tr>
                                <td>{{$index++}}</td>
                                <td>{{$value->nama}}</td>
                                {{-- <td>{{$value->tiket}} </td> --}}
                                <td>{{$value->nama_kota}}</td>
                                <td> 
                                    <a class="btn btn-light edit-des" data-id="{{$value->id}}" href="javascript:void(0)"><span class="fas fa-pencil-alt"></span></a> 
                                    <form action="{{ route('destinasi.destroy', $value->id) }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @method('DELETE')
                                        <button class="btn btn-light" type="submit"><span class="fas fa-trash"></span></button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Destinasi</th>
                                {{-- <th>Harga Tiket</th> --}}
                                <th>Kota</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
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
              <h4 class="modal-title">Destinasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{url('mitra/destinasi/')}}" method="post" id="form-destinasi">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="">Nama Destinasi</label>
                        <input required type="text" name="nama" id="nama" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Harga Tiket</label>
                        <input required type="text" name="tiket" id="tiket" class="form-control">
                    </div> --}}
                    <div class="form-group">
                        <label for="">Kota</label>
                        <select required class="form-control" id="des_kota" name="des_kota">
                            <option disabled selected>--pilih kota--</option>
                            @foreach($kota as $key => $value)
                                <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea id="deskripsi" required name="deskripsi" class="form-control" cols="30" rows="5"></textarea>
                    </div>
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
      var id
      var nama
      var tiket
      var des_kota
      $(document).on('click', '.edit-des', function(){
        id = $(this).data('id')
        var url = "{{url('mitra/destinasi/')}}"+'/'+id
        $.get( url, function(data) {
            nama = data.nama
            tiket = data.tiket
            deskripsi = data.deskripsi
            des_kota = data.des_kota
            $('#nama').val(nama)
            // $('#tiket').val(tiket)
            $('#deskripsi').val(deskripsi)
            $('#id').val(id)
            $('#des_kota').val(des_kota)
            $('#modal-default').modal('show')
        });
      })   
      $('#add').click(function(){
        $('#nama').val("")
            // $('#tiket').val("")
            $('#deskripsi').val("")
            $('#id').val("")
            $('#des_kota').val("")
            $('#modal-default').modal('show')
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