@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('assets/vendor/selects/selectize.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/selects/selectize.default.css')}}">
<!-- carousel slider -->
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Problem Pool</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">My Project </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div id="app">
      <div class="row clearfix">
          <div class="col-lg-12">
          </div>
              <div class="card">
                <div class="body">
                  <div class="card-title">
                    <h5>{{$projects->project_name}}</h5>
                  </div>
                  <label>Status : {{$projects->project_status}}</label><br>

                  <table>
                    <tr>
                      <td style="padding-right:20px;" rowspan="{{count($projects->member)+1}}">Project Member</td>
                      <td></td>
                      <td></td>
                    </tr>
                    @foreach($projects->member as $member)
                    <tr>
                      <td></td>
                        <td <?php if ($member->user_id === $projects->project_owner): ?> class="text-primary" <?php endif; ?>>{{$member->user->name}}</td>
                    </tr>
                    @endforeach
                  </table>
                  <div class="row clearfix">
                    <div class="col-md-6">
                      <div class="card text-white bg-green">
                        <div class="card-header">
                          Find Problem
                        </div>
                        <div class="card-body">

                          <div class="row clearfix">
                            <div class="col-md-6">
                              <label>Status : @if($projects->problem_id !== null) Problem Defined @endif</label><br>
                              <label>Last Update : @if($projects->problem_id !== null) {{date_format($projects->updated_at,'Y-m-d')}} @endif</label>
                            </div>
                            <div class="col-md-6">
                              <a href="{{route('knowledge.problem',$projects->id)}}"> <i class="fa fa-folder-open"></i> Open</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card text-white bg-green">
                        <div class="card-header">
                          Brainstorming
                        </div>
                        <div class="card-body">

                          <div class="row clearfix">
                            <div class="col-md-6">
                              <label>Status : @if($projects->paingain !== null) Defined @endif</label><br>
                              <label>Last Update : @if($projects->paingain !== null) {{date_format($projects->paingain->updated_at,'Y-m-d')}} @endif</label>
                            </div>
                            <div class="col-md-6">
                              <a href="{{route('knowledge.brainstorming',$projects->id)}}"> <i class="fa fa-folder-open"></i> Open</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card text-white bg-green">
                        <div class="card-header">
                          Gathering Idea
                        </div>
                        <div class="card-body">

                          <div class="row clearfix">
                            <div class="col-md-6">
                              <label>Status : @if($projects->goldencircle !== null) Defined @endif</label><br>
                              <label>Last Update : @if($projects->goldencircle !== null) {{date_format($projects->goldencircle->updated_at,'Y-m-d')}} @endif</label>
                            </div>
                            <div class="col-md-6">
                              <a href="{{route('knowledge.gathering',$projects->id)}}"> <i class="fa fa-folder-open"></i> Open</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card text-white bg-green">
                        <div class="card-header">
                          Project Development
                        </div>
                        <div class="card-body">

                          <div class="row clearfix">
                            <div class="col-md-6">
                              <label>Status : @if($projects->productdevelopment !== null) on Development @endif</label><br>
                              <label>Last Update : @if($projects->productdevelopment !== null) {{date_format($projects->productdevelopment->updated_at,'Y-m-d')}} @endif</label>
                            </div>
                            <div class="col-md-6">
                              <a href="{{route('knowledge.development',$projects->id)}}"> <i class="fa fa-folder-open"></i> Open</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card text-white bg-green">
                        <div class="card-header">
                          Pilot Project
                        </div>
                        <div class="card-body">

                          <div class="row clearfix">
                            <div class="col-md-6">
                              <label>Status : @if($projects->pilotproject !== null) on Development @endif</label><br>
                              <label>Last Update : @if($projects->pilotproject !== null) {{date_format($projects->pilotproject->updated_at,'Y-m-d')}} @endif</label>
                            </div>
                            <div class="col-md-6">
                              <a href="{{route('knowledge.pilot',$projects->id)}}"> <i class="fa fa-folder-open"></i> Open</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card text-white bg-green">
                        <div class="card-header">
                          Project Implementation
                        </div>
                        <div class="card-body">

                          <div class="row clearfix">
                            <div class="col-md-6">
                              <label>Status : @if($projects->sosialisasi !== null) Implementation @endif</label><br>
                              <label>Last Update : @if($projects->sosialisasi !== null) {{date_format($projects->sosialisasi->updated_at,'Y-m-d')}}  @endif</label>
                            </div>
                            <div class="col-md-6">
                              <a href="#"> <i class="fa fa-folder-open"></i> Open</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

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
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script><!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<link rel="stylesheet" href="{{asset('assets/vendor/selects/selectize.min.js')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/vendor/selects/select2-bootstrap.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="{{ asset('js/auto.js')}}"></script>
<script type="text/javascript">

$(document).ready(function() {
  $(".select").select2({
    theme: "bootstrap",
    width:'100%',
     placeholder: "Pilih Member"
   });
});
</script>
<script>
$('#multiselect3-all').multiselect({
    includeSelectAllOption: true,
});
</script>
<script>
var secondClone = $('.second-clone').clone();
secondClone.children('.project-role-first').children().children().addClass('marg-ri');
secondClone.children('.project-role-first').children().children().siblings().removeClass('hidden');
// var projectRole = $('#project-role-first').clone();;

$('#btn-add-member').click(function(){
  let lengthpage = $('#member-page .second-clone').length;
  if(lengthpage == 1){
    let lastItem = $('#member-page .second-clone').last();
    lastItem.children('.project-role-first').children().children().addClass('marg-ri');
    lastItem.children('.project-role-first').children().children().siblings().removeClass('hidden');
  }

  let newclone = member(secondClone.clone());
  $('#member-page').append(newclone.clone());
  $(".select").select2({
    theme: "bootstrap",
    width:'100%',
     placeholder: "Pilih Member"
   });
});

function member(data){
  $('#member-page .second-clone').each(function(){
    let optionSelected = $(this).find('.select option:selected').val();
    data.find('.select option').each(function(){
      if($(this).val() == optionSelected){
        $(this).remove();
      }
    })
  })

  return data;
}

function minus(element){
  let lengthpage = $('#member-page .second-clone').length;
  if(lengthpage == 2){
    element.parents('.second-clone').remove();
    let lastItem = $('#member-page .second-clone').last();
    lastItem.children('.project-role-first').children().children().removeClass('marg-ri');
    lastItem.children('.project-role-first').children().children().siblings('.btn-minus').addClass('hidden');
    console.log(lastItem.children('.project-role-first').children().children().siblings());
  }else {
    element.parents('.second-clone').remove();
  }
};
</script>



@stop
