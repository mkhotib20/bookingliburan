@extends('admin.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                    Edit Deskripsi dan itinerary</h1>
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
                  {{$judul}}
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <a href="{{url('mitra/paket')}}" class="btn btn-tool btn-sm">
                  <i class="fas fa-arrow-left"></i> Back</a>
                  <a id="save" style="color:green; cursor: pointer" class="btn btn-tool btn-sm">
                    <i class="fas fa-save"></i> Save</a>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <form enctype="multipart/form-data" id="thisForm" action="{{url('mitra/paket/save-des')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$id}}" name="id">
                <input type="hidden" value="{{$judul}}" name="namaPaket">
                
                <div class="col-md-12 my-2">
                    <input type="file" accept="image/*" multiple name="cover_img[]" data-default-file="{{url('public/uploads/img_paket/'.$cover_img )}}" class="dropify" />
                </div>
                <div class="col-md-12 mb-3 my-2">
                  <label for="">Noted (Informasi Tambahan)</label>  
                    <textarea name="noted" class="simpleTxt" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$des}}</textarea>
                </div>
                <div class="col-md-12 mb-3 my-2">
                  <label for="">Deskripsi Paket</label>  
                  <textarea name="desc" class="textarea" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$des}}</textarea>
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
      $('.simpleTxt').summernote({
        toolbar: false
      })
    })
</script>
@endsection

