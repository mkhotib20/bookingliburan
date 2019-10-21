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
                            @foreach($trx as $key => $value)
                            <tr>
                                <td>{{$index++}}</td>
                                <td>{{$value->user}}</td>
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

      @if (Session::get('sukses'))
      <script>
          Toast.fire({
            type: 'success',
            title: "{{Session::get('sukses')}}"
            })
      </script>
      @endif
  @endsection