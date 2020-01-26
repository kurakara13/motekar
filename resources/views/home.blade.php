@extends('layouts.master')

@section('content')


<!-- carousel slider -->
<div class="container-fluid">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h1>Home</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Home</li>
                        <!-- <li class="breadcrumb-item"></li> -->
                        <!-- <li class="breadcrumb-item active"></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div id="app">
      <div class="row clearfix">
        <div class="col-lg-8 col-md-12">
          <div class="x_content bs-example-popovers">
            <div class="slider-item alert-success" >
              <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-12 ftco-animate text-center">
                  <br>
                  <br>
                  <h4>
                    <span class="fa fa-quote-left"></span>
                    Teruslah kreatif dan berinovasi! Itulah budaya Motekar!
                    <span class="fa fa-quote-right"></span>
                  </h4>
                    <h3>- Mohammad Syibli [GM Telkom Bogor]</h3>
                  <br>
                  <br>
                  <br><br>
                </div>
              </div>
            </div>
          </div>
          @foreach($project as $item)
            <div class="card mt-3">

                  <div class="body">
                    <h5 class="card-title">{{$item->sosialisasi->judul}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$item->sosialisasi->created_at}}</h6>
                    <div class="mb-3">
                      <p>{{$item->sosialisasi->post}}</p>
                      @foreach($item->sosialisasi->image as $image)

                        <img src="{{asset('file/doc/'.$image->image)}}" style="width:100px" alt="">
                      @endforeach
                    </div>



                    <div class="card-footer" style="background:#fff; border-color:#e1e8ed" >
                      <div class="row clearfix">
                        <div class="col-md-6">
                          <a href="#">Like</a>
                        </div>
                        <div class="col-md-6">
                          <a href="#">Comment</a>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          @endforeach
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card">
            <div class="body">
              <img src="{{asset('image/kipas-sakti.png')}}" class="card-img-top" alt="">
            </div>
          </div>
          <div class="card">
            <div class="body">
              <div class="d-flex align-items-center">
                    <div class="ml-4">
                        <span>Problem</span>
                        <h4 class="mb-0 font-weight-medium">{{count($problem)}}</h4>
                    </div>
                </div>
            </div>
          </div>
          <div class="card">
            <div class="body">
              <div class="d-flex align-items-center">
                    <div class="ml-4">
                        <span>Project</span>
                        <h4 class="mb-0 font-weight-medium">{{count($project)}}</h4>
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
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/light-gallery/css/lightgallery.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/bundles/lightgallery.bundle.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/medias/image-gallery.js') }}"></script>
@stop
