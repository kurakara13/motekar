@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('assets/vendor/selects/selectize.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/selects/selectize.default.css')}}">
<!-- carousel slider -->
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Knowledge</h1>
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
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card">
                    <div class="body ribbon">
                        <div class="ribbon-box green">{{$projects->count()}}</div>
                        <a href="#" class="my_sort_cut text-muted">
                          <i class="text-green"></i>
                            <b class="text-green">Total Project</b>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card">
                    <div class="body ribbon">
                        <div class="ribbon-box cyan">{{$projects->where('project_status', 'Idea Generation')->count()}}</div>
                        <a href="#" class="my_sort_cut text-muted">
                            <i class="text-cyan"></i>
                            <b class="text-cyan">Idea Generation</b>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card">
                    <div class="body ribbon">
                        <div class="ribbon-box orange">{{$projects->where('project_status', 'On Development')->count()}}</div>
                        <a href="#" class="my_sort_cut text-muted">
                            <i class="text-orange"></i>
                            <b class="">On Development</b>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card">
                    <div class="body ribbon">
                        <div class="ribbon-box indigo">{{$projects->where('project_status', 'Implementation')->count()}}</div>
                        <a href="#" class="my_sort_cut text-muted">
                            <i class="text-cyan"></i>
                            <b class="text-indigo">Implementation</b>
                        </a>
                    </div>
                </div>
            </div>
          </div>

              <div class="card">

                  <div class="text-right">
                      <button type="button" class="btn btn-sm mb-1 btn-filter bg-azura" data-toggle="modal" data-target=".launch-pricing-modal">Add Project</button>
                  </div>
                  <div class="table-responsive">
                  <table class="table table-hover table-custom js-basic-example dataTable spacing8 mb-0" style="table-layout: auto; width: 100%;">
                      <thead>
                        <tr>
                           <th class="text-center">Project Name</th>
                           <th class="text-center">Tag</th>
                           <th class="text-center">Member</th>
                           <th class="text-center">Status</th>
                           <th class="text-center">Action</th>
                       </tr>
                      </thead>

                          <tbody>
                            @foreach($projects as $item)
                              <tr>
                                  <td class="text-center" style="white-space:normal;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word">{{$item->project_name}}</td>

                                  <td class="text-center">
                                  @if($item->project_tags)
                                  @foreach(explode(',',$item->project_tags) as $itemTags)
                                    <span class="badge badge-info text-uppercase">
                                       {{$itemTags}}
                                    </span><br>
                                    @endforeach
                                  @endif
                                  </td>
                                  <td class="text-center">
                                  @foreach($item->member as $itemMember)
                                  <span class="badge badge-success text-uppercase">
                                     {{$itemMember->user->name}}
                                  </span><br>
                                  @endforeach
                                  </td>
                                  <td class="text-center">{{$item->project_status}}</td>
                                  <td class="text-center">
                                    <a href="{{route('knowledge.detail',$item->id)}}"> <i class="fa fa-folder-open"></i> Open</a>
                                  </td>
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
