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
            <h1 class="m-0 text-dark">Gambar Paket | {{$paket->nama}} </h1>
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
                <form enctype="multipart/form-data" id="thisForm" action="{{url('mitra/paket/img/save')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$paket->id}}">
                    <input type="hidden" name="idx" value="{{count($img)}}">
                   <div class="row">
                        <div class="col-md-8 my-2">
                                <input type="file" accept="image/*" name="cover_img" class="dropify" />
                            </div>
                            <div class="col-md-4 my-2">
                                <button type="submit" class="btn btn-info btn-block">Save</button>
                            </div>
                   </div>
                  </form>
                <div id="app" class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <?php $index = 1?>
                                <th>#</th>
                                <th style="width: 30%">Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($img as $item => $val)
                                <tr>
                                    <td>{{$index++}}</td>
                                    <td><img style="width: 200px" src="{{url('public/uploads/img_paket/'.$val->img)}}" alt=""></td>
                                    <td><a href="{{url('mitra/paket/img/des/'.$val->id)}}" class="btn btn-light"><span class="fas fa-trash"></span></a></td>
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

$('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a Cover Image here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        },

      });
</script>
  @endsection