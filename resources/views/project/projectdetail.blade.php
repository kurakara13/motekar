@extends('layouts.master')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/vendor/selects/select2-bootstrap.css')}}">
@stop
@section('parentPageTitle', 'Project')
@section('title', 'Project Management')


@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 bg-transparent">
        <h3>{{$project->project_name}} <br> <small><code class="highlighter-rouge">{{$project->project_status}}</code></small> <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#status">Update Status</button></h3>

        <div class="modal fade launch-pricing-modal" id="status" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6>Update Status</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body pricing_page text-justify pt-4 mb-4">
                      <form  action="{{url('update-status/'.$project->id)}}" method="post">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-12 col-md-12">
                                            <b>Status</b>
                                            <div class="input-group mb-3">
                                            <select class="form-control" name="status">
                                              <option value="Define Problem">Define Problem</option>
                                              <option value="Idea Generation">Idea Generation</option>
                                              <option value="On Development">On Development</option>
                                              <option value="Implementation">Implementation</option>
                                            </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary"> <i class="icon-plus"></i> Update </button>
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
        <div class="header text-right">
            <a href="/project/myproject" class="btn btn-success fa fa-arrow-left" title="Back"> </a>
        </div>
        <div class="card bg-transparent">
            <div class="body bg-transparent">
                <ul class="nav nav-tabs">
                    <li class="nav-item "><a class="nav-link active show text-info" data-toggle="tab" href="#Info-withicon"><i class="fa fa-info"></i> Info</a></li>
                    <!-- <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Info-withicon"><i class="fa fa-list-ol"></i> To Do List</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Info-withicon"><i class="fa fa-bars"></i> Backlog</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Info-withicon"><i class="fa fa-tasks"></i> Sprints</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Info-withicon"><i class="fa fa-bar-chart-o"></i> Analysis</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Info-withicon"><i class="fa fa-file"></i> Report Submission</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Info-withicon"><i class="fa fa-external-link"></i> Publication</a></li> -->

                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#ToDoList-withicon"><i class="fa fa-list-ol"></i> Problem @if($project->problem_id !== null)<i class="text-green fa fa-check"></i> @endif</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Backlog-withicon"><i class="fa fa-bars"></i> Idea & Solution @if($project->summary !== null)<i class="text-green fa fa-check"></i> @endif</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab" href="#Sprints-withicon" ><i class="fa fa-tasks"></i> Development @if($project->pilotproject !== null)<i class="text-green fa fa-check"></i> @endif</a></li>
                    <li class="nav-item"><a class="nav-link text-info" data-toggle="tab"href="#Analysis-withicon" ><i class="fa fa-bar-chart-o"></i> Implementation @if(count($project->sosialisasi) > 0)<i class="text-green fa fa-check"></i> @endif</a></li>

                </ul>
                <div class="tab-content">

<!-- INFO START -->
                    <div class="tab-pane show active" id="Info-withicon">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                              <form method="post" action="{{route('project.updateinfo', $project->id)}}">
                                @csrf
                                <div class="body">
                                    <div class="form-group">
                                        <h6 class="text-success">Project Name</h6>
                                        <div class="form-group">
                                            <div class="input-group">
                                            <input type="text" name="project_name" class="form-control" value="{{$project->project_name}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h6 class="text-success">Project Description</h6>
                                        <div class="form-group">
                                            <div class="input-group">
                                            <textarea class="form-control" name="project_description" rows="3" required>{{$project->project_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <h6 class="text-success">Project Tags</h6>
                                        <div class="form-group">
                                            <div class="input-group demo-tagsinput-area">
                                            <input type="text" name="project_tags" class="form-control" data-role="tagsinput" value="{{$project->project_tags}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <h6 class="text-success">Unit</h6>
                                        <div class="form-group">
                                            <div class="input-group demo--area">
                                              <select name="unit_id" class="select form-control" required>

                                                @foreach($unit as $item)
                                                <option value="{{$item->id}}" <?php if ($item->id == $project->unit_id): ?>
                                                  selected
                                                <?php endif; ?>>{{$item->unit_name}}</option>
                                                @endforeach
                                              </select>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary"> Edit Project</button>
                                </div>
                              </form>

                            </div>
                        </div>
                    </div>

                    <br>

<!-- The WInning Team -->
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="header text-right">
                                @if($project->project_owner == Auth::user()->id)
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal1"> <i class="icon-plus"></i>  Add New Team Member</button>
                                @endif
                            </div>
                                <!-- Add Member Modal -->
                                <div class="modal fade launch-pricing-modal" id="modal1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6>Add New Member</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body pricing_page text-justify pt-4 mb-4">
                                              <form  action="{{url('add-project-member/'.$project->id)}}" method="post">
                                                @csrf
                                                <div class="row clearfix">
                                                    <div class="col-12">
                                                        <div class="demo-masked-input">
                                                            <div class="row clearfix">
                                                                <div class="form-group col-lg-12 col-md-12">
                                                                    <b>Member Name</b>
                                                                    <div class="input-group mb-3">
                                                                    <select id="select"class="select form-control" name="user_id">
                                                                      @foreach($user as $users)
                                                                      <option value="{{$users->id}}">{{$users->name}}</option>
                                                                      @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-lg-12 col-md-12">
                                                                    <b>Member Role</b>
                                                                    <div class="input-group mb-3">
                                                                    <input type="text" name="role" class="form-control" placeholder="Tentukan role-nya misal: hipster, hacker, hustler" required>
                                                                    </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-lg-12 col-md-12">
                                                                    <b>Member Status</b>
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            Make this member as a project owner?
                                                                            <div class="float-right">
                                                                                <label class="switch">
                                                                                    <input type="checkbox" name="status_member">
                                                                                    <span class="slider"></span>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                <br>
                                                                <button type="submit" class="btn btn-primary"> <i class="icon-plus"></i> Add Member</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Member Modal -->
                                <div class="modal fade launch-impact-modal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6>Add Impact</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body pricing_page text-justify pt-4 mb-4">
                                              <form  action="{{url('add-project-member/'.$project->project_id)}}" method="post">
                                                @csrf
                                                <div class="row clearfix">
                                                    <div class="col-12">
                                                        <div class="demo-masked-input">
                                                            <div class="row clearfix">
                                                                <div class="form-group col-lg-12 col-md-12">
                                                                    <b>Impact</b>
                                                                    <div class="input-group mb-3">
                                                                    <input type="text" name="role" class="form-control" placeholder="Tentukan role-nya misal: hipster, hacker, hustler" required>
                                                                    </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-lg-12 col-md-12">
                                                                    <b>Detail</b>
                                                                    <div class="input-group mb-3">
                                                                    <input type="text" name="role" class="form-control" placeholder="Tentukan role-nya misal: hipster, hacker, hustler" required>
                                                                    </textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12">
                                                                <br>
                                                                <button type="submit" class="btn btn-primary"> <i class="icon-plus"></i> Add Impact</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <h5 class="text-success">{{$project->project_name}} Team</h5>
                            <div class="card">
                                <div class="tab-content mt-0">
                                    <div class="tab-pane show active" id="Users">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-custom spacing8">
                                                <thead>
                                                    <tr>
                                                        <th class="w60">Name</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Role</th>
                                                        <th class="w100">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($project->member as $item)
                                                    <tr>
                                                        <td class="width45">
                                                        <img src="{{asset('assets/images/xs/avatar5.jpg')}}" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                                        </td>
                                                        <td>
                                                            <h6 class="mb-0">{{$item->user->name}}</h6>

                                                        </td>
                                                        <td><span class="badge badge-danger">{{$item->user_id == $project->project_owner ? 'Project Owner' : ''}}</span></td>
                                                        <td>{{$item->role}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-default" title="Edit"  data-toggle="modal" data-target=".launch-pricing-modal{{$item->user->id}}" {{$project->project_owner == Auth::user()->id ? '' : 'disabled'}}><i class="fa fa-edit text-primary"></i></button>
                                                            <button type="button" class="btn btn-sm btn-default "  title="Delete" data-type="confirm" data-toggle="modal" data-target=".delete-modal{{$item->user->id}}" {{$project->project_owner == Auth::user()->id ? '' : 'disabled'}}><i class="fa fa-trash-o text-danger"></i></button>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade delete-modal{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog ">
                                                            <div class="modal-content">

                                                                <div class="modal-body pricing_page text-justify pt-4 mb-4">
                                                                  <div class="text-center">
                                                                    <i class="fa fa-warning text-warning" style="font-size:72px"></i>
                                                                    <h2>Are you sure?</h2>
                                                                    <h6>You will not be able to recover this imaginary file!</h6>
                                                                    <form class="text-center" action="{{url('delete-project-member/'.$item->id)}}" id="formDelete-{{$item->id}}" method="post">
                                                                      @csrf
                                                                      <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                                      <button type="submit" class="btn btn-danger" name="button">Delete</button>
                                                                    </form>
                                                                  </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade launch-pricing-modal{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6>Edit Member</h6>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                </div>
                                                                <div class="modal-body pricing_page text-justify pt-4 mb-4">
                                                                  <form class="" action="{{url('update-project-member/'.$item->id)}}" method="post">
                                                                    <input type="hidden" value="{{$project->id}}" name="project_id">
                                                                    @csrf
                                                                    <div class="row clearfix">
                                                                        <div class="col-12">
                                                                            <div class="demo-masked-input">
                                                                                <div class="row clearfix">
                                                                                    <div class="form-group col-lg-12 col-md-12">
                                                                                        <b>Member Name</b>
                                                                                        <div class="input-group mb-3">
                                                                                        <input type="text" name="member_name" class="form-control" value="{{$item->user->name}}" disabled required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-lg-12 col-md-12">
                                                                                        <b>Member Role</b>
                                                                                        <div class="input-group mb-3">
                                                                                        <input type="text" name="role" data="{{$item->role}}" class="form-control" value="{{$item->role}}" required>
                                                                                        </textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-lg-12 col-md-12">
                                                                                        <b>Project Ownership</b>
                                                                                        <ul class="list-group">
                                                                                            <li class="list-group-item">
                                                                                              @if($item->user_id != $project->project_owner)
                                                                                                Make this member as a project owner?
                                                                                                <div class="float-right">
                                                                                                    <label class="switch">
                                                                                                      <input type="checkbox" name="owner" {{$item->role == 'Owner' ? 'checked':''}}>
                                                                                                      <span class="slider"></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                              @else
                                                                                                This Member Is A Project Owner
                                                                                              @endif
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12">
                                                                                    <br>
                                                                                    <button type="submit" class="btn btn-primary"> <i class="icon-pencil"></i>  Edit Member</button>
                                                                                  </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                  </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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

                    <!-- Edit Member Modal -->


<!-- INFO FINISH -->

<!-- TO DO LIST START -->
                    <div class="tab-pane" id="ToDoList-withicon">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">

                                <div class="card">
                                  <div class="body">
                                    @if($project->problem_id === null)
                                    <form id="basic-form" action="{{route('project.problem.submit',$project->id)}}" method="post" novalidate>
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
                                                <select id="food" name="asal_masalah[]" class="multiselect multiselect-custom" required multiple="multiple" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect">
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
                                            <textarea class="form-control summernote"  name="background" required>
                                            </textarea>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary fa fa-paper-plane"> Submit Problem</button>
                                    </form>
                                    @else
                                    <form id="basic-form" action="{{url('project/problemupdate',$project->id)}}" method="post" novalidate>
                                    {{ csrf_field() }}
                                        <h6 class="text-success">Problem *</h6>
                                        <div class="form-group">
                                            <textarea name="problem" class="form-control" rows="8" cols="80" required>{{$project->problem->problem}}</textarea>
                                        </div>
                                        <br>
                                        <h6 class="text-success">Problem Background *</h6>
                                        <div class="form-group">
                                            <textarea class="form-control summernote" name="background" required>
                                              <p>{!!$project->problem->background!!}</p>
                                            </textarea>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary fa fa-paper-plane"> Submit Problem</button>
                                    </form>

                                    @endif
                                  </div>
                                    <div class="table-responsive">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- TO DO LIST FINISH -->

<!-- BACKLOG START -->
                    <div class="tab-pane" id="Backlog-withicon">
                        <div class="row clearfix">
                            <div class="col-md-12">
                              <div class="card">

                                  <div class="body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link show active" data-toggle="tab" href="#first">Pain & Gain @if($project->paingain !== null) <i class="text-green fa fa-check"></i> @endif</a> </li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Third">Golden Circle & Unique Value @if($project->goldencircle !== null) <i class="text-green fa fa-check"></i> @endif</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Forth">Summary @if($project->summary !== null) <i class="text-green fa fa-check"></i> @endif</a></li>
                                    </ul>
                                      <div class="tab-content"  id="wizard_horizontal">
                                        <div class="tab-pane show vivify fadeIn active" id="first">\
                                          <div class="row clearfix">

                                            <form  class="col-lg-12" action="{{route('project.myproject.paingain',$project->id)}}" method="post">
                                              @csrf
                                              <div class="col-lg-6  mb-3" style="float:left">
                                                <b class="text-red text-center">Pain</b>
                                                <div class="input-group">

                                                  <textarea name="pain" class="form-control summernote" rows="8" cols="80" placeholder="Tuliskan daftar hal-hal yang menyulitkan user saat ini dan menghambat mereka dalam meraih tujuannya." required>@if($project->paingain !== null) {!!$project->paingain->pain!!} @endif</textarea>
                                                </div>

                                              </div>
                                              <div class="col-lg-6  mb-3" style="float:left">
                                                <b class="text-green text-center">Gain</b>
                                                <div class="input-group">

                                                  <textarea name="gain" class="form-control summernote" rows="8" cols="80" placeholder="Tuliskan hal-hal yang akan membuat user senang dan membuat usaha mereka lebih mudah untuk meraih tujuannya." required>@if($project->paingain !== null) {!!$project->paingain->gain!!} @endif</textarea>
                                                </div>

                                              </div>
                                              <button type="submit" class="btn btn-primary"> Save</button>
                                            </form>
                                          </div>

                                        </div>
                                        <div class="tab-pane show vivify fadeIn " id="second">
                                          <section>
                                            <div class="row clearfix">
                                              <form class="col-md-12" action="{{route('project.myproject.userjourney',$project->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                              <div class="col-md-12 img-thumbnail mb-3" style="min-height:200px">
                                                @if($project->userjourney !== null)
                                                  <img src="{{asset('file/'.$project->userjourney->file)}}" class="img-responsive" width="100%" alt="">
                                                @endif
                                              </div>
                                              <div class="col-sm-6 text-center" style="float:left">
                                                <a href="#" class="btn btn-outline-success">Download Template</a>
                                              </div>
                                              <div class="col-sm-6 text-center" style="float:left">
                                                  <input type="file" name="file_upload" value="">
                                              </div>
                                              <button type="submit" class="btn btn-primary" @if($project->paingain === null) disabled @endif > Save</button>
                                              </form>
                                            </div>


                                          </section>
                                        </div>
                                        <div class="tab-pane show vivify fadeIn " id="Third">
                                          <form class="" action="{{route('project.myproject.goldencircle',$project->id)}}" method="post">
                                            @csrf

                                          <div class="row clearfix">
                                            <div class="col-lg-5 col-md-6 ">
                                              <img src="{{asset('image/gc.png')}}" alt="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 ">
                                              <b>Why</b>
                                              <div class="input-group">
                                                <textarea name="why" class="form-control" rows="4 " cols="80">@if($project->goldencircle !== null) {{$project->goldencircle->why}} @endif</textarea>
                                              </div>
                                              <b>How</b>
                                              <div class="input-group">
                                                <textarea name="how" class="form-control" rows="4 " cols="80">@if($project->goldencircle !== null) {{$project->goldencircle->how}} @endif</textarea>
                                              </div>
                                              <b>What</b>
                                              <div class="input-group">
                                                <textarea name="what" class="form-control" rows="4 " cols="80">@if($project->goldencircle !== null) {{$project->goldencircle->what}} @endif</textarea>
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <b>Unique Value</b>
                                              <div class="input-group">
                                                <textarea name="unique_value" class="form-control" rows="4 " cols="80">@if($project->goldencircle !== null) {{$project->goldencircle->unique_value}} @endif</textarea>
                                              </div>
                                              <button type="submit" name="button" class="btn btn-primary" @if($project->paingain === null) disabled @endif>Save</button>
                                            </div>

                                          </div>

                                          </form>
                                        </div>
                                        <div class="tab-pane show vivify fadeIn " id="Forth">
                                          <h2>Summary</h2>
                                          <form class="" action="{{route('project.myproject.summary',$project->id)}}" method="post">
                                            @csrf
                                          <div class="row clearfix">
                                            <div class="col-md-12 ">
                                              <div class="input-group mb-3">
                                                <textarea name="summary" class="form-control summernote" id="" rows="8" cols="120" placeholder="Ceritakan project yang akan anda kerjakan">@if($project->summary !== null) {!!$project->summary->summary!!} @endif</textarea>

                                              </div>
                                              <button type="submit" name="button" class="btn btn-primary" @if($project->goldencircle === null) disabled @endif>Save</button>
                                            </div>
                                          </div>

                                        </form>
                                        </div>

                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>

<!-- BACKLOG FINISH -->

<!-- SPRINT START -->
                    <div class="tab-pane" id="Sprints-withicon">
                        <div class="row clearfix">
                          <div class="col-md-12">
                            <div class="card">

                                <div class="body">
                                  <ul class="nav nav-tabs">
                                      <li class="nav-item"><a class="nav-link show active" data-toggle="tab" href="#firstd">Product Development @if($project->productdevelopment !== null) <i class="text-green fa fa-check"></i> @endif</a></li>
                                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#secondd">Pilot Project @if($project->pilotproject !== null) <i class="text-green fa fa-check"></i> @endif</a></li>
                                  </ul>
                                    <div class="tab-content"  id="wizard_horizontal">
                                      <div class="tab-pane show vivify fadeIn active" id="firstd">\
                                        <div class="row clearfix">

                                          <form  class="col-lg-12" action="{{route('project.myproject.productdevelopment',$project->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-lg-12  mb-3" style="float:left">
                                              <b class="">Development Story</b>
                                              <div class="input-group">
                                              <textarea name="development_story" class="form-control" rows="8" cols="80">@if($project->productdevelopment !== null){{$project->productdevelopment->development_story}} @endif</textarea>
                                              </div>
                                            </div>
                                            <div class="col-lg-12  mb-3" style="float:left">
                                              <b>Upload Mockup/Prototype/Poster</b><br>
                                              @if($project->productdevelopment !== null)
                                                <a href="{{asset('file/mockup/'.$project->productdevelopment->mockup_file)}}" target="_blank">File Mockup</a><br>
                                                <input type="file" name="mockup_file[]" value="" multiple>
                                              @else
                                              <div class="input-group">
                                                <input type="file" name="mockup_file[]" value="" multiple>
                                              </div>
                                              @endif
                                            </div>
                                            <div class="col-lg-12  mb-3" style="float:left">
                                              <b>Upload Dokumentasi</b><br>
                                              @if($project->productdevelopment !== null)
                                                <a href="{{asset('file/doc/'.$project->productdevelopment->doc_file)}}" target="_blank">File Dokumentasi</a><br>
                                                <input type="file" name="doc_file[]" value="" multiple>
                                              @else
                                              <div class="input-group">
                                                <input type="file" name="doc_file[]" value="" multiple>
                                              </div>
                                              @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary"> Save</button>
                                          </form>
                                        </div>

                                      </div>
                                      <div class="tab-pane show vivify fadeIn " id="secondd">
                                        <!-- <h2>User Journey Map</h2> -->
                                        <section>
                                          <div class="row clearfix">
                                            <form class="col-md-12" action="{{route('project.myproject.pilotproject',$project->id)}}" method="post" enctype="multipart/form-data">
                                              @csrf
                                              <div class="col-lg-6">
                                                <b>Lokasi Pilot</b>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" name="lokasi_pilot" value="@if($project->pilotproject !== null) {{$project->pilotproject->lokasi_pilot}} @endif">
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                <b>Periode</b><br>
                                                <label>@if($project->pilotproject !== null ){{$project->pilotproject->periode}} @endif</label>
                                                <div class="input-daterange input-group" data-provide="datepicker">
                                                    <input type="text" class="input-sm form-control" name="range_start">
                                                    <span class="input-group-addon range-to">to</span>
                                                    <input type="text" class="input-sm form-control" name="range_end">
                                                </div>
                                              </div>
                                              <div class="col-lg-12  mb-3" style="float:left">
                                                <b class="">Development Story</b>
                                                <div class="input-group">
                                                  <textarea name="development_story" class="form-control" rows="8" cols="80">@if($project->pilotproject !== null) {{$project->pilotproject->development_story}} @endif</textarea>
                                                </div>

                                              </div>
                                            <div class="col-md-12 mb-3 " style="float:left">
                                              <b>Upload Dokumentasi Pilot Project</b><br>
                                              @if($project->pilotproject !== null)

                                                <a href="{{asset('file/doc/'.$project->pilotproject)}}">Dokumentasi</a>
                                                <input type="file" name="doc_file[]" value="" multiple>
                                              @else
                                                <input type="file" name="doc_file[]" value="" multiple>
                                              @endif
                                            </div>
                                            <!-- <div class="col-lg-12"> -->
                                              <button type="submit" class="btn btn-primary"> Save</button>
                                            <!-- </div> -->
                                            </form>
                                          </div>


                                        </section>
                                      </div>


                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
<!-- SPRINT FINISH -->

<!-- ANALYSIS START -->
                    <div class="tab-pane" id="Analysis-withicon">
                        <div class="row row-cards">
                            <div class="col-md-12">
                              <div class="card">

                                  <div class="body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link show active" data-toggle="tab" href="#firsti">Dasar Implementasi @if(count($project->dasarimplementasi) !== 0) <i class="text-green fa fa-check"></i> @endif</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#secondi">Sosialisasi & Dokumentasi @if(count($project->sosialisasi) !== 0)  <i class="text-green fa fa-check"></i> @endif</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Thirdi">Impact @if(count($project->impact) !== 0) <i class="text-green fa fa-check"></i> @endif</a></li>
                                    </ul>
                                      <div class="tab-content"  id="wizard_horizontal">
                                        <div class="tab-pane show vivify fadeIn active" id="firsti">

                                          <div class="row clearfix">

                                            <form  class="col-lg-12" action="{{route('project.myproject.dasarimplementasi',$project->id)}}" method="post" enctype="multipart/form-data">
                                              @csrf
                                              <b>Dasar Implementasi</b>
                                              <div class="input-group mb-3 ">
                                                <input type="text" class="form-control" name="dasar_implementasi" value="">
                                              </div>
                                              <b>Upload Avidance</b>
                                              <div class="input-group mb-3">

                                                  <input type="file" name="avidance_file" value="">


                                              </div>
                                              <button type="submit" class="btn btn-primary"> Save</button>
                                            </form>
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                  <th>Dasar Implementasi</th>
                                                  <th>Avidance File</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($project->dasarimplementasi as $dasar)
                                                <tr>
                                                  <td>{{$dasar->dasar_implementasi}}</td>
                                                  <td> <a href="{{asset('file/doc/'.$dasar->avidance)}}" target="_blank">File</a> </td>
                                                  <td><button type="button" class="btn btn-sm btn-default " title="Delete" data-type="confirm" data-toggle="modal" data-target=".ondelete-modal{{$dasar->id}}"><i class="fa fa-trash-o text-danger"></i></button></td>
                                                </tr>

                                                @endforeach
                                              </tbody>
                                            </table>
                                          </div>

                                        </div>
                                        <div class="tab-pane show vivify fadeIn " id="secondi">

                                          <section>
                                            <div class="row clearfix">
                                              <form class="col-md-12" action="{{route('project.myproject.sosialisasi',$project->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <b>Judul Event / Sosialisasi</b>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="judul" value="">
                                                </div>
                                                <b>Location</b>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" name="lokasi" value="">
                                                </div>
                                                <b>Tanggal Event</b>
                                                <div class="input-group mb-3">
                                                  <input type="date" class="form-control" name="tanggal" value="">
                                                </div>
                                                <b>Posts</b>
                                                <div class="input-group mb-3">
                                                  <textarea name="post" class="form-control" rows="8" cols="80"></textarea>
                                                </div>
                                                <b>Upload Image</b>
                                                <div class="input-group mb-3">
                                                  <input type="file"  name="image[]" multiple value="">
                                                </div>
                                                <button type="submit" class="btn btn-primary"> Save</button>
                                              </form>
                                              <div class="col-md-12">
                                                <div class="row clearfix">
                                                  @foreach($project->sosialisasi as $sosialisasi)
                                                  <div class="col-md-12  body mt-3">
                                                    <div class="" style="">
                                                      <div class="pull-right" style="width:100%;text-align:right">
                                                        <a href="#" data-toggle="modal" data-target=".ondelete-sosis{{$sosialisasi->id}}">Delete</a>
                                                      </div>
                                                      <h5 class="card-title">{{$sosialisasi->judul}}</h5>
                                                      <h6 class="card-subtitle mb-2 text-muted">{{$sosialisasi->created_at}}</h6>
                                                      <div class="mb-3">
                                                        <p>{{$sosialisasi->post}}</p>
                                                        @foreach($sosialisasi->image as $image)

                                                          <img src="{{asset('file/doc/'.$image->image)}}" style="width:100px" alt="">
                                                        @endforeach
                                                      </div>
                                                    </div>
                                                  </div>

                                                  @endforeach
                                                </div>


                                              </div>
                                            </div>


                                          </section>
                                        </div>
                                        <div class="tab-pane show vivify fadeIn " id="Thirdi">
                                          <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th>Impact</th>
                                                <th>Detail</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($project->impact as $impact)
                                              <tr>
                                                <td>{{$impact->impact}}</td>
                                                <td>{{$impact->detail}}</td>
                                                <td><button type="button" class="btn btn-sm btn-default " title="Delete" data-type="confirm" data-toggle="modal" data-target=".onondelete-modal{{$impact->id}}"><i class="fa fa-trash-o text-danger"></i></button></td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                          </table>
                                          <button type="button" data-toggle="modal" data-target=".new-project-modal" class="btn btn-primary" name="button">Add Impact</button>


                                        </div>
                                        <div class="tab-pane show vivify fadeIn " id="Forth">
                                          <h2>Summary</h2>
                                          <form class="" action="index.html" method="post">

                                          <div class="row clearfix">
                                            <div class="col-md-12 ">
                                              <div class="input-group mb-3">
                                                <textarea name="name" class="form-control" rows="8" cols="120" placeholder="Ceritakan project yang akan anda kerjakan"></textarea>

                                              </div>
                                              <button type="submit" name="button" class="btn btn-primary">Save</button>
                                            </div>
                                          </div>

                                        </form>
                                        </div>

                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
<!-- ANALYSIS FINISH -->

<!-- REPORT SUBMISSION START -->
                    <div class="tab-pane" id="ReportSubmission-withicon">
                        <div class="header text-right">
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target=".launch-pricing-modal-report"> <i class="icon-plus"></i>  Add Project Report</button>
                        </div>
                        <div class="modal fade launch-pricing-modal-report" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6>Add Report</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body pricing_page text-justify pt-4 mb-4">
                                        <div class="row clearfix">
                                            <div class="col-12">
                                                <div class="demo-masked-input">
                                                    <div class="row clearfix">
                                                        <div class="form-group col-lg-12 col-md-12">
                                                            <b>Report Title</b>
                                                            <div class="input-group mb-3">
                                                            <input type="text" name="report_title" class="form-control" placeholder="Tuliskan title reportnya" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-12 col-md-12">
                                                        <b>Upload Your File</b>
                                                            <div class="header">
                                                                <p>Limit file size 2 MB</h2>
                                                            </div>
                                                            <div class="body">
                                                                <input type="file" class="dropify" data-max-file-size="2000K">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                        <br>
                                                        <button type="submit" class="btn btn-primary"> <i class="icon-paper-plane"></i> Submit Report</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="tab-content mt-0">
                                <div class="tab-pane show active" id="Users">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-custom spacing8">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>File</th>
                                                    <th>Upload Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Proposal CV Catalist</td>
                                                    <td><a href="#" target="_blank"><i class="fa fa-file text-primary"></i>  Area2_Proposal CV_Catalist </a></td>
                                                    <td>11 September 2019 19:51</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Download File"><i class="fa fa-download text-primary"></i></button>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Laporan CV Catalist</td>
                                                    <td><a href="#" target="_blank"><i class="fa fa-file text-primary"></i>  Area2_Laporan CV_Catalist </a></td>
                                                    <td>14 September 2019 12:31</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Download File"><i class="fa fa-download text-primary"></i></button>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Proposal PV Catalist</td>
                                                    <td><a href="#" target="_blank"><i class="fa fa-file text-primary"></i>  Area2_Proposal PV_Catalist </a></td>
                                                    <td>17 September 2019 15:11</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Download File"><i class="fa fa-download text-primary"></i></button>
                                                        <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- REPORT SUBMISSION FINISH -->

<!-- PUBLICATION START -->
                    <div class="tab-pane" id="Publication-withicon">
                        <h6>Publication</h6>
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica</p>
                    </div>
<!-- PUBLICATION FINISH -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade new-project-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setup New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form  action="{{route('project.myproject.impact',$project->id)}}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="form-group col-lg-12 col-md-12">
                                    <b>Impact</b>
                                    <div class="input-group mb-3">
                                    <input type="text" name="impact" class="form-control" placeholder="" required>
                                    </textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12">
                                    <b>Detail</b>
                                    <div class="input-group mb-3">
                                    <input type="text" name="detail" class="form-control" placeholder="" required>
                                    </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-round btn-primary">Save </button>
            </div>
            </form>
        </div>
    </div>
</div>

@foreach($project->dasarimplementasi as $dasar1)

<div class="modal fade ondelete-modal{{$dasar1->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-body pricing_page text-justify pt-4 mb-4">
              <div class="text-center">
                <i class="fa fa-warning text-warning" style="font-size:72px"></i>
                <h2>Are you sure?</h2>
                <h6>You will not be able to recover this imaginary file!</h6>
                <form class="text-center" action="{{url('delete-dasar/'.$dasar1->id)}}" id="" method="post">
                  @csrf
                  <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
                  <button type="submit" class="btn btn-danger" name="button">Delete</button>
                </form>
              </div>

            </div>
        </div>
    </div>
</div>
@endforeach
@foreach($project->sosialisasi as $sosis)

<div class="modal fade ondelete-sosis{{$sosis->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-body pricing_page text-justify pt-4 mb-4">
              <div class="text-center">
                <i class="fa fa-warning text-warning" style="font-size:72px"></i>
                <h2>Are you sure?</h2>
                <h6>You will not be able to recover this imaginary file!</h6>
                <form class="text-center" action="{{url('delete-sosialisasi/'.$sosis->id)}}" method="post">
                  @csrf
                  <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
                  <button type="submit" class="btn btn-danger" name="button">Delete</button>
                </form>
              </div>

            </div>
        </div>
    </div>
</div>
@endforeach
@foreach($project->impact as $impact)

<div class="modal fade onondelete-modal{{$impact->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-body pricing_page text-justify pt-4 mb-4">
              <div class="text-center">
                <i class="fa fa-warning text-warning" style="font-size:72px"></i>
                <h2>Are you sure?</h2>
                <h6>You will not be able to recover this imaginary file!</h6>
                <form class="text-center" action="{{url('delete-impact/'.$impact->id)}}" id="" method="post">
                  @csrf
                  <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
                  <button type="submit" class="btn btn-danger" name="button">Delete</button>
                </form>
              </div>

            </div>
        </div>
    </div>
</div>
@endforeach
@stop

@section('page-styles')

<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/nestable/jquery-nestable.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/summernote/dist/summernote.min.css')}}">
<style media="screen">
  .modal-backdrop{
    z-index: -1;
    background: none;
  }
  .note-link-popover{
    display: none;
  }
  .note-image-popover{
    display: none;
  }
  .top-navbar {
    /* z-index: -1; */
  }
  .modal{
    top:50px;
  }
</style>
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
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
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script><!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/vendor/selects/select2-bootstrap.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript" src="{{asset('assets/vendor/summernote/dist/summernote.min.js')}}"></script>
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

   });
});
</script>
<script type="text/javascript">

$(document).ready(function() {
  $(".select").select2({
    theme: "bootstrap",
    width:'100%',

   });
   //
   // $('#check-add').click(function(){
   //    let roleData = $('#role-add').attr('data');
   //    let role = $('#role-add').val();
   //    if(role != 'Owner'){
   //      $('#role-add').val('Owner');
   //      $('#role-add').attr('readonly', 'readonly');
   //    }else {
   //      $('#role-add').val(roleData);
   //      $('#role-add').attr('readonly', null);
   //    }
   //  })
});
</script>
<script type="text/javascript">
$(document).ready(function() {
        $('.summernote').summernote({
          height: 300,
          focus: true
        });

    });
function confirmDelete(id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            })
            .then(() => {
                $('#formDelete-' + id).submit();
            });
        } else {
            swal("Your imaginary file is safe!");
        }
        });
}
</script>
<script>
$('#multiselect3-all').multiselect({
    includeSelectAllOption: true,
});
</script>
<script src="{{ asset('assets/vendor/nestable/jquery.nestable.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui/sortable-nestable.js') }}"></script>
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/charts/c3.js') }}"></script>
@stop
