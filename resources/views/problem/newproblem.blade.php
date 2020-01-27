@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Submit New Problem</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Problem</li>
                        <li class="breadcrumb-item active">Submit New Problem</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div id="app">
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif

      @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
          </div>
      @endif

      @if ($message = Session::get('warning'))
          <div class="alert alert-warning alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
      </div>
      @endif

      @if ($message = Session::get('info'))
          <div class="alert alert-info alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
          </div>
      @endif

      @if ($errors->any())
          <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          Please check the form below for errors
      </div>
      @endif

      <div class="row clearfix">
          <div class="col-md-12">
              <div class="card">
                  <div class="header">
                      <h2>Submit Your Problem Here</h2>
                  </div>
                  <div class="body">
                  <div class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <i class="fa fa-info-circle"></i> Masalah yang diajukan harus memenuhi kaidah <strong>SMART (Specific, Measurable, Achievable, Realistic, dan Timely)</strong>
                      <br>
                      <br>
                      Contoh:
                      <br>
                      Bagaimana meningkatkan transaksi sales harian IndiHome dari 10 menjadi 15 di UBIS Cileungsi dalam waktu 2 bulan?
                      <br>
                      <br>
                      <strong>Specific:</strong> Meningkatkan transaksi sales harian IndiHome di UBIS Cileungsi, minimal berisi masalah dan lokasi
                      <br>
                      <strong>Measurable:</strong> Dari 10 transaksi harian menjadi 15 transaksi, memiliki satuan ukur yang jelas
                      <br>
                      <strong>Achievable:</strong> Memiliki target yang mampu diraih sebesar 15 transaksi per hari
                      <br>
                      <strong>Realistic:</strong> Targetnya realistis untuk dicapai yaitu peningkatan sebanyak 5 transaksi per hari
                      <br>
                      <strong>Timely:</strong> Periode penyelesaian masalah jelas, diselesaikan dalam waktu 2 bulan
                  </div>
                  <br>
                      <form id="basic-form" action="/problem/submitproblem" method="post" novalidate>
                      {{ csrf_field() }}
                          <h6 class="text-success">Problem *</h6>
                          <div class="form-group">
                              <label>Bagaimana</label>
                              <input type="text" name="bagaimana" class="form-control" placeholder="Sampaikan masalah yang ditemukan" required>
                          </div>
                          <div class="form-group">
                              <label>Dari</label>
                              <input type="text" name="dari" class="form-control" placeholder="Kondisi awal saat masalah ditemukan" required>
                          </div>
                          <div class="form-group">
                              <label>Menjadi</label>
                              <input type="text" name="menjadi" class="form-control" placeholder="Kondisi akhir yang ingin dicapai" required>
                          </div>
                          <div class="form-group">
                              <label>Di</label>
                              <input type="text" name="di" class="form-control" placeholder="Lokasi ditemukannya masalah" required>
                          </div>
                          <div class="form-group">
                              <label>Dalam waktu</label>
                              <input type="text" name="periode" class="form-control" placeholder="Estimasi target penyelesaian masalah" required>
                          </div>

                          <div class="form-group">
                              <label>Unit</label>
                              <select name="unit_id" class=" select form-control" required>
                                <option value="">-Pilih Unit-</option>
                                @foreach($unit as $item)
                                <option value="{{$item->id}}">{{$item->unit_name}}</option>
                                @endforeach
                              </select>
                          </div>
                          <br>

                          <div class="form-group">
                          <h6 class="text-success">Asal ditemukanannya masalah *</h6>
                              <div class="form-group">
                                  <select id="food" name="asal_masalah[]" class="multiselect multiselect-custom" multiple="multiple" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
                                      <option value="Hasil Review">Hasil Review</option>
                                      <option value="Suara Pelanggan">Suara Pelanggan</option>
                                      <option value="Hasil Audit & Assessment">Hasil Audit & Assessment</option>
                                      <option value="Dorongan Obsesi Perusahaan">Dorongan Obsesi Perusahaan</option>
                                      <option value="Peluang Yang Diberikan Pimpinan">Peluang Yang Diberikan Pimpinan</option>
                                      <option value="Inisiatif Individu">Inisiatif Individu</option>
                                  </select>
                              </div>
                              <p id="error-multiselect"></p>
                          </div>
                          <br>
                          <h6 class="text-success">Problem Background *</h6>
                          <div class="form-group">
                              <textarea class="form-control ckeditor" id="ckeditor" name="background">
                              </textarea>
                          </div>
                          <br>
                          <button type="submit" class="btn btn-primary fa fa-paper-plane"> Submit Problem</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script><!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/vendor/selects/select2-bootstrap.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
$(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
<script type="text/javascript">

$(document).ready(function() {
  $(".select").select2({
    theme: "bootstrap",
    width:'100%',
     placeholder: "Pilih Member"
   });
});
</script>

@stop
