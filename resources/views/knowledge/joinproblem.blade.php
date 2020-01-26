@extends('layout.master')
@section('parentPageTitle', 'Problem')
@section('title', 'Join')


@section('content')
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
@foreach($data_problem_detail as $dpd)
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
    <div class="header text-right">
    <a href="/problem/myproblemlist" class="btn btn-success fa fa-arrow-left" title="Back"> </a>
    @if ($dpd->status == "Need Team Project")
    <a href="{{ url('problem/joinproblem/id='.$dpd->problem_id)}}" class="btn btn-danger fa fa-users" title="Join"> Join</a>
    @endif
    </div>
    <div class="card">
        <div class="body">                         
            <div class="content">
                <h6>Problem</h6>
                <span>{{ $dpd->problem }}</span>
            </div>
        </div>
        <div class="body">                         
            <div class="content">
                <h6>Problem Background</h6>
                {!! $dpd->background !!}
            </div>
        </div>
        <div class="card-footer">
            <a href="#"><i class="fa fa-fire"></i> Asal Masalah: 
            @foreach (explode(',', $dpd->asal_masalah) as $asal)
                <span class="badge badge-info text-uppercase">
                {{ $asal }}  
                </span>
            @endforeach
            </a>
            <br>
            <a href="#"><i class="fa fa-tags"></i> Tags: 
            @foreach (explode(',', $dpd->tags) as $tag)
                <span class="badge badge-info text-uppercase">
                {{ $tag }}  
                </span>
            @endforeach
            </a>
        </div>
    </div>
    @endforeach
    </div>
</div>

<div class="row clearfix">
    <!-- Karyawan yang tertarik dengan masalahmu -->
    <div class="col-lg-12 col-md-12">
    <div class="card">
            <div class="header">
                <h2><strong> Other Employee Who Interest to This Problem</strong></h2>
            </div>
            <div class="body">
                <ul class="right_chat w_followers list-unstyled mb-0">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="../../assets/images/xs/avatar5.jpg" alt="">
                                <div class="media-body">
                                    <span class="name">Manggala Wismantoro</span>
                                    <span class="message">Officer 3 Sales & Customer Care CBI, BJD</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="right_chat w_followers list-unstyled mb-0">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="../../assets/images/xs/avatar9.jpg" alt="">
                                <div class="media-body">
                                    <span class="name">Sheba Lydia Wardhana</span>
                                    <span class="message">Officer 3 Debt Management</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
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
@stop