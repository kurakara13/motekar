@extends('layouts.master')

@section('content')


<!-- carousel slider -->
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Profile</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div id="app">
      <div class="row clearfix">

          <div class="col-xl-4 col-lg-4 col-md-5">
              <div class="card social">
                  <div class="profile-header d-flex justify-content-between justify-content-center">
                    <div class="d-flex">
                        <div class="mr-3">
                            <img src="../assets/images/user.png" class="rounded" alt="">
                        </div>
                        <div class="details">
                            <h5 class="mb-0">{{Auth::user()->name}}</h5>
                            <!-- <span class="text-light"></span> -->
                            <p class="mb-0">{{Auth::user()->username}}</p>
                        </div>
                    </div>
                  </div>
                  <div class="body">
                      <small class="text-muted">Posisi: </small>
                      <p>{{Auth::user()->posisi}}</p>
                      <hr>
                      <small class="text-muted">Unit: </small>
                      <p>{{Auth::user()->unit}}</p>
                      <hr>
                  </div>
              </div>
          </div>

          <div class="col-xl-8 col-lg-8 col-md-7">
              <div class="card">
                  <div class="header">
                      <h2>Basic Information</h2>
                      <ul class="header-dropdown dropdown">
                          <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                          <li class="dropdown">
                              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                              <ul class="dropdown-menu">
                                  <li><a href="javascript:void(0);">Action</a></li>
                                  <li><a href="javascript:void(0);">Another Action</a></li>
                                  <li><a href="javascript:void(0);">Something else</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
                  <div class="body">
                    <form action="{{route('update.profile')}}" method="post">
                      @csrf
                      <div class="row clearfix">
                          <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{Auth::user()->name}}">
                              </div>
                          </div>
                          <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="posisi" placeholder="Email" value="{{Auth::user()->posisi}}">
                              </div>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                    </form>
                  </div>
              </div>
              <div class="card">
                  <div class="header">
                      <h2>Account Data</h2>
                  </div>
                  <div class="body">
                      <div class="row clearfix">
                          <div class="col-lg-12 col-md-12">
                            <form method="POST" action="{{ route('update.password') }}">
                              <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                              @csrf
                              <h6>Change Password</h6>

                              @if($errors->any())
                              <p class="invalid-feedback" role="alert" style="display: block;">
                                  <strong>{{ $errors->first() }}</strong>
                              </p>
                              @endif

                              <div class="form-group row">

                                  <div class="col-md-6">
                                      <input type="password" placeholder="Old Password" class="form-control @error('password') is-invalid @enderror" name="old_password" required autocomplete="new-password">
                                  </div>
                              </div>

                              <div class="form-group row">

                                  <div class="col-md-6">
                                      <input id="password" type="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                  </div>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                              </div>
                            </form>
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
@stop
