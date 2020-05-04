@extends('layouts.master')

@section('content')
<!-- carousel slider -->
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Problem Pool</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Project Pool</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div id="app">
      <div class="row clearfix">
          <div class="col-lg-12">
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
              <div class="card">
                  <div class="text-left">
                      <button type="button" class="btn btn-sm mb-1 btn-filter bg-default" data-target="all">All</button>
                      <button type="button" class="btn btn-sm mb-1 btn-filter bg-green" data-target="0">Solved</button>
                      <button type="button" class="btn btn-sm mb-1 btn-filter bg-azura" data-target="2">On Development</button>
                      <button type="button" class="btn btn-sm mb-1 btn-filter bg-blush" data-target="1">Need Team Project</button>
                  </div>
                  <div class="table-responsive">
                  <table class="table table-hover table-custom js-basic-example dataTable spacing8 mb-0" style="table-layout: auto; width: 100%;">
                      <thead>
                        <tr>
                           <th class="text-center">Problem</th>
                           <th class="text-center">Unit</th>
                           <th class="text-center">Interested by</th>
                           <th class="text-center">Submission Date</th>
                           <th class="text-center">Status</th>
                           <th class="text-center">Action</th>
                       </tr>
                      </thead>

                          <tbody>
                          @foreach($data_problem as $dp)
                          <tr data-status='{{ $dp->status }}'>
                              <td class="text-justify" style="white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word">{{ $dp->problem }}</td>
                              <td class="text-center">{{$dp->units->unit_name}}</td>
                              <td class="text-center">{{$dp->interests->count()}}</td>
                              <td class="text-center">{{ $dp->created_at }}</td>
                              <td class="text-center">
                                @if($dp->status == '0')
                                Solved
                                 @endif
                                 @if($dp->status == '2')
                                 On Development
                                  @endif
                                  @if($dp->status == '1')
                                  Need Team Project
                                  @else
                                    {{$dp->status}}
                                   @endif
                              </td>
                              <td class="text-center">
                              <a href="{{ route('problem.problemdetail' , $dp->problem_id)}}" class="btn btn-outline-primary fa fa-search"> See Detail </a>
                              <a href="deleteproblem/{{ $dp->problem_id }}" class="btn btn-outline-danger fa fa-close" data-toggle="modal" data-target="#exampleModalCenter{{ $dp->problem_id }}"> Delete </a>
                              <br><br>

                              </td>

                              <!-- Modal Delete Problem -->
                              <div class="modal fade" id="exampleModalCenter{{ $dp->problem_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure to delete this problem?</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <p>{{ $dp->problem }}</p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                                                  <a href="deleteproblem/{{ $dp->problem_id }}"><button type="button" class="btn btn-round btn-danger">Delete</button></a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
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
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/table-filter.js') }}"></script>

<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

@stop
