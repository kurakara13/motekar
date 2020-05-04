@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Problem Pool</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Problem</li>
                        <li class="breadcrumb-item active">Problem Pool</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div id="app">

      <!-- Multiple Search Problem -->

      <div class="row clearfix">
          <div class="col-12">
              <div class="table-responsive">
                  <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                      <thead>
                          <tr>
                              <th class="text-center">NIK</th>
                              <th class="text-center">Name</th>
                              <th class="text-center">Position</th>
                              <th class="text-center">Unit</th>
                              <th class="text-center">Problem(s) Involved</th>
                              <th class="text-center">Project(s) Involved</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($inovator as $pp)
                      <?php
                      $user = App\User::find($pp->user_id);
                       ?>
                          <tr>
                              <td class="text-justify" style="white-space:normal;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word">
                                <p>{{ $pp->username }}</p>
                              </td>
                              <td class="text-center">{{$pp->name}}</td>
                              <td class="text-center">{{$pp->posisi}}</td>
                              <td class="text-center">{{$pp->unit}}</td>
                              <td class="text-center">{{$pp->problem_count}}</td>
                              <td class="text-center">{{$pp->projects_count}}</td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
</div>

<!-- modal join  -->
<div class="modal fade launch-pricing-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <form action="" method="post" id="form-method-join">
    @csrf
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal-header-status"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pricing_page text-center pt-4 mb-4">
                <h5 id="modal-problem"></h5>
                <p class="mb-4" id="modal-background"></p>
                <div class="row clearfix">
                    <div class="col-12">
                        <h6 class="text-danger">Punya keresahan yang sama? Yuk join untuk memecahkan masalahnya!</h6>
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <b>What motivates you?</b>
                                    <div class="input-group mb-3">
                                    <textarea name="reason" class="form-control" placeholder="Jelaskan motivasi Anda untuk bergabung menyelesaikan masalah ini. Anda juga dapat menjelaskan pengalaman penyelesaian masalah sejenis atau ide awal Anda untuk memecahkan masalah ini. Penjelasan Anda akan menjadi bahan pertimbangan pemilik masalah dalam menentukan timnya nanti." required style="min-height:100px"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                <br>
                                <button type="submit" class="btn btn-danger">Join to Solve This Problem</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </form>
</div>

@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script>
$('#multiselect3-all').multiselect({
    includeSelectAllOption: true,
});
</script>

@stop
