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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Tambah Artikel
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <a href="{{url('mitra/article')}}" class="btn btn-tool btn-sm">
                  <i class="fas fa-arrow-left"></i> Back</a>
                  <a id="save" style="color:green; cursor: pointer" class="btn btn-tool btn-sm">
                    <i class="fas fa-save"></i> Save</a>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                    <form enctype="multipart/form-data" id="thisForm" action="{{url('mitra/article')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$id}}" name="id">
              <div class="row">
                    <div class="col-md-12 my-2">
                        <label for="">Judul Artikel</label>
                        <input type="text" name="title" value="{{$title}}" class="form-control">
                    </div>
                    <div class="col-md-12 my-2">
                        <input type="file" accept="image/*" name="cover_img" data-default-file="{{url('public/uploads/img_article/'.$cover_img )}}" class="dropify" />
                    </div>
                    <div class="col-md-12 mb-3 my-2">
                        <textarea name="content" class="textarea" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$content}}</textarea>
                    </div>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
  </div>

@endsection

@section('custom-script')
<script>
    $(function () {
        $('#save').click(function(){
            $('#thisForm').submit()
        })
      // Summernote
      $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a Cover Image here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        },

      });
      $('.textarea').summernote({
        height: 300
      })
    })
  </script>
@endsection

