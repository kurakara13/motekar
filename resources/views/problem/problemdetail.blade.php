@extends('layouts.master')
@section('parentPageTitle', 'Problem')
@section('title', 'Problem Detail')


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
        <div class="col-lg-12 col-md-12">
        <div class="header text-right">
        <a href="/problem/myproblemlist" class="btn btn-success fa fa-arrow-left" title="Back"> </a>
        @if($data_problem_detail->user_id == Auth::user()->id)
        <a href="{{ route('editproblem',$data_problem_detail->problem_id)}}" class="btn btn-primary fa fa-edit" title="Edit"></a>
        @endif
        </div>
        <div class="card">
            <div class="body">
                <div class="content">
                    <h6>Problem</h6>
                    <span>{{ $data_problem_detail->problem }}</span>
                </div>
            </div>
            <div class="body">
                <div class="content">
                    <h6>Problem Background</h6>
                    {!! $data_problem_detail->background !!}
                </div>
            </div>
            <div class="card-footer">
                <a href="#"><i class="fa fa-fire"></i> Asal Masalah:
                @foreach (explode(',', $data_problem_detail->asal_masalah) as $asal)
                    <span class="badge badge-info text-uppercase">
                    {{ $asal }}
                    </span>
                @endforeach
                </a>
                <br>
                <br>
                <a href="#"><i class="fa fa-check-circle"></i> Status:
                   @if($data_problem_detail->status == '0')
                   <span class="badge badge-info text-uppercase">
                   Solved
                   </span>
                    @endif
                    @if($data_problem_detail->status == '2')
                    <span class="badge badge-info text-uppercase">
                    On Development
                    </span>
                     @endif
                     @if($data_problem_detail->status == '1')
                     <span class="badge badge-info text-uppercase">
                     Need Team Project
                     </span>
                      @endif
                @foreach (explode(',', $data_problem_detail->tags) as $tag)

                @endforeach
                </a>
            </div>
        </div>
        </div>
    </div>

    <div class="row clearfix">
        <!-- Karyawan yang tertarik dengan masalahmu -->
        <div class="col-lg-12 col-md-12">
        <div class="card">
                <div class="header">
                    <h2><strong>Other Employee Who Interest to Your Problem</strong></h2>
                </div>
                <div class="body">
                  @foreach($data_problem_detail->interests as $dpd)
                    <ul class="right_chat w_followers list-unstyled mb-0">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="../../assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">{{$dpd->user->name}}</span>
                                        <span class="message">{{$dpd->created_at}}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <hr>
                  @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- launch-detil -->
    <div class="modal fade launch-pricing-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <form method="post" id="form-method-problem-Project">
        @csrf
        <input type="hidden" name="problem_id" value="{{$data_problem_detail->problem_id}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="../../assets/images/xs/avatar5.jpg" alt="">
                                <div class="media-body">
                                    <span class="name" id="modal-user-name"></span>
                                    <!-- <span class="message" id="modal-user-message">Officer 3 Sales & Customer Care CBI, BJD</span> -->
                                </div>
                            </div>
                        </a>
                    </li>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body pricing_page text-justify pt-4 mb-4">
                    <div class="row clearfix">
                        <div class="col-12">
                            <h6 class="text-primary">Motivasi bergabung</h6>
                            <p class="mb-4" id="modal-motivate"></p>
                            <h6 class="text-primary">Ide awal untuk penyelesaian masalah</h6>
                            <p class="mb-4" id="modal-idea"></p>
                            <h6 class="text-primary">Expected role</h6>
                            <p class="mb-4" id="modal-role"></p>
                        </div>
                        <div class="col-12">
                            <h6 class="text-success">Apakah <span id="modal-user-success-name"></span> orang yang kamu cari? Bentuk tim mu sekarang!</h6>
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="modal-input-name" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-group mb-3">
                                        <input type="text" name="role" class="form-control" placeholder="Tentukan role-nya misal: hipster, hacker, hustler" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <b>Project Name</b>
                                        <div class="input-group mb-3">
                                          @if($data_problem_detail->project)
                                          <input type="hidden" name="project_id" value="{{$data_problem_detail->project->project_id}}">
                                          <input type="text" class="form-control" value="{{$data_problem_detail->project->project_name}}" readonly>
                                          @else
                                          <input type="text" name="project_name" class="form-control" placeholder="Team name" required>
                                          @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                    <br>
                                    <button class="btn btn-primary" >Create Your Winning Team!</button>
                                    <button class="btn btn-danger" type="button" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
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

    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
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
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>
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
<script>
$('#multiselect3-all').multiselect({
    includeSelectAllOption: true,
});

function openmodal(data){
  console.log(data);
  $('#modal-user-name').text(data.user.name);
  $('#modal-motivate').text(data.motivate);
  $('#modal-idea').text(data.idea);
  $('#modal-role').html(data.expected_role);
  $('#modal-input-name').val(data.user.name);
  $('#form-method-problem-Project').attr("action", "{{url('problem/interests/to/project/')}}/"+data.user_id);
}

</script>
@stop
