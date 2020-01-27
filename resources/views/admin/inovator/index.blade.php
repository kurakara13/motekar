@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Innovator</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Innovator</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div id="app">

      <!-- Multiple Search Problem -->

      <div class="row clearfix">
          <div class="col-12">
              <button class="btn btn-info fa fa-plus" data-toggle="modal" data-target=".launch-pricing-modal"> Tambah Innovator </button>
              <hr>
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
                              <th class="text-center">Action</th>
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
                              <td class="text-center">0</td>
                              <th class="text-center" style="display:flex">
                                <button class="btn btn-primary fa fa-edit" onclick="edit_data({{$pp}})" data-toggle="modal" data-target=".launch-edit-modal"style="margin-right:10px"></button>
                                <form action="{{route('admin.innovator.list.destroy', $pp->id)}}" method="post">
                                @method("DELETE")
                                @csrf
                                  <button type="submit" class="btn btn-danger fa fa-trash"></button>
                                </form>
                              </th>
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
  <form action="{{route('admin.innovator.list.store')}}" method="post" id="form-method-join">
    @csrf
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal-header-status">Tambah Innovator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pricing_page pt-4 mb-4">
              <div class="form-group">
                <label for="basic-url">NIK</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nik" placeholder="NIK" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
              <div class="form-group">
                <label for="basic-url">Nama</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
              <div class="form-group">
                <label for="basic-url">Posisi</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="posisi" placeholder="Posisi" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
              <div class="form-group">
                <label for="basic-url">Unit</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="id_unit" required>
                      <option>-Pilih Unit-</option>
                      @foreach($unit as $item)
                      <option value="{{$item->id}}">{{$item->unit_name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
        </div>
    </div>
  </form>
</div>

<!-- modal join  -->
<div class="modal fade launch-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <form action="" method="post" id="form-method-edit">
    <input type="hidden" id="id_innovator" name="id_innovator">
    @method("PUT")
    @csrf
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal-header-status">Edit Innovator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pricing_page pt-4 mb-4">
              <div class="form-group">
                <label for="basic-url">NIK</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
              <div class="form-group">
                <label for="basic-url">Nama</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
              <div class="form-group">
                <label for="basic-url">Posisi</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
              <div class="form-group">
                <label for="basic-url">Unit</label>
                <div class="input-group mb-3">
                    <select class="form-control" id="unit" name="id_unit" required>
                      <option>-Pilih Unit-</option>
                      @foreach($unit as $item)
                      <option value="{{$item->id}}">{{$item->unit_name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
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

function edit_data(data){
  console.log(data);
  $("#id_innovator").val(data.id);
  $("#nik").val(data.username);
  $("#nama").val(data.name);
  $("#posisi").val(data.posisi);
  $.each($("#unit option"), function(){
    if($(this).text() == data.unit){
      $(this).attr('selected','');
    }
  })

  $("#form-method-edit").attr('action', '{{url("admin/inovator/list")}}/'+data.id);

}
</script>

@stop
