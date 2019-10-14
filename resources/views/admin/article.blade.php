@extends('admin.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Artikel</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                List Artikel
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <a href="{{url('mitra/article/create')}}" style="color: green" class="btn btn-tool btn-sm" >
                  <i class="fas fa-plus"></i> Artikel</a>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Artikel</th>
                            <th>Cover Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index=1; ?>
                        @foreach($article as $key => $value)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$value->title}}</td>
                            <td><img style="width: 200px" src="{{url('public/uploads/img_article/'.$value->cover_img )}}" alt="foto"> </td>
                            <td> 
                                <a class="btn btn-light edit-des" href="{{url('mitra/article/'.$value->id.'/edit')}}"><span class="fas fa-pencil-alt"></span></a> 
                                <form action="{{ route('article.destroy', $value->id) }}" method="POST">
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
                            <th>Nama Artikel</th>
                            <th>Cover Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                  </table>
            </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('custom-script')
<script>
  $('#example1').dataTable()
</script>
@endsection

