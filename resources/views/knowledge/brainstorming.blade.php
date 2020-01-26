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

                  <table class="table text-center">
                    <tr>
                      <th class="text-success">Pain</th>
                      <th class="text-danger">Gain</th>
                    </tr>
                    <tr>
                      <td>{{$projects->paingain->pain}}</td>
                      <td>{{$projects->paingain->gain}}</td>
                    </tr>
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
