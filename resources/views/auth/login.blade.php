<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('image/kipas-sakti.png') }}" type="image/x-icon">
    <title>Motekar</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
</head>

<body class="theme-cyan font-montserrat light_version">

<!-- Page Loader -->
<div class="page-loader-wrapper light_version">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>
<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>

<div class="auth-main ">
  <div class="col-md-6">
    <img src="{{asset('image/kipas-sakti.png')}}" alt="" style="width:100%">
  </div>
    <div class="col-md-4">
      <div class="auth_div vivify popIn" style="width:100%">
          <div class="auth_brand">
              <a class="navbar-brand text-info" href="javascript:void(0);">
                <h1 class="text-red"><strong>MOTEKAR</strong></h1>
              </a>
          </div>
          <div class="card">
              <div class="">
                  <p class="lead">Login to your account</p>
                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="form-group">
                          <label for="signin-email" class="control-label sr-only">Username</label>
                          <input id="username" type="username" placeholder="Username" class="form-control round @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                          @error('username')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="signin-password" class="control-label sr-only">Password</label>
                          <input id="password" type="password" placeholder="Password" class="form-control round @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <!--
                      <div class="form-group clearfix">
                          <label class="fancy-checkbox element-left">
                              <input type="checkbox">
                              <span>Remember me</span>
                          </label>
                      </div>
                      -->
                      <button type="submit" class="btn btn-danger btn-round btn-block">LOGIN</button>
                      <div class="bottom">

                          <!-- <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="">Forgot password?</a></span>
                          <span>Don't have an account? <a href="page-register.html">Register</a></span> -->
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>


</div>

<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

</body>
</html>
