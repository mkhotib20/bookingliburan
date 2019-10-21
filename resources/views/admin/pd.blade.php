@extends('admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$paket->nama}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<style>
</style>
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
                <form action="{{url('mitra/paket/tambah-pd')}}" method="post" id="form-destinasi">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="paket" value="{{$idPaket}}">
                    <div class="row">
                        <div class="col-md-6">
                            <select required name="destinasi" id="select2" class="form-control">
                                <option disabled selected>--pilih destinasi--</option>
                                @foreach($dest as $key => $val)
                                <option 
                                  @if ($val->isSelected)
                                      disabled style="color: #bbbbbb"
                                  @endif
                                value="{{$val->id}}">{{$val->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="Tambah" class="btn btn-success">
                        </div>
                    </div>

                </form>
                <br><br>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Destinasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index=1; ?>
                            @foreach($pd as $key => $value)
                            <tr>
                                <td>{{$index++}}</td>
                                <td>{{$value->namaDes}}</td>
                                <td> 
                                    <a class="btn btn-light edit-des" href="{{url('mitra/paket/delDp/'.$value->id)}}"><span class="fas fa-trash"></span></a> 
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
      <script>
        $(document).ready(function() {
            $('#select2').select2();
        });
      </script>
  @endsection