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
                  <img src="{{asset('image/Bogor.png')}}" alt="" style="    width: 100%;">
                </div>
              </div>
            </div>
          </div>
          @foreach($project as $item)
          @if($item->sosialisasi)
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
                          <i class="fa fa-love"></i>
                          <span onclick="like('{{$item->sosialisasi->id}}',$(this))" cliktwice="true" style="cursor:pointer" disabled>
                            <i id="like-{{$item->sosialisasi->id}}" class="fa  fa-heart {{in_array(Auth::user()->id, $item->sosialisasi->like->pluck('user_id')->toArray()) ? 'like' : 'dislike'}}"></i>
                            Like (<span id="like-count-{{$item->sosialisasi->id}}">{{count($item->sosialisasi->like)}}</span>)
                          </span>
                        </div>
                        <div class="col-md-6">
                          <i class="fa fa-comments-o"> Comment</i> ({{count($item->sosialisasi->comment)}})
                        </div>
                      </div>
                      <br>
                      <ul class="timeline"  style="background:#fff;border-top:1px solid; border-color:#e1e8ed;padding-top:20px !important">
                        @if(count($item->sosialisasi->comment) != 0)
                          @foreach($item->sosialisasi->comment as $cmm)
                          <li class="timeline-item">
                              <div class="timeline-marker"></div>
                              <div class="timeline-content">
                                <ul class="list-unstyled team-info sm margin-0">
                                    <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                    <li>
                                      <p style="margin-left:15px">{{$cmm->user->name}}</p>
                                    </li>
                                </ul>
                                  <p class="text-muted mt-0 mb-2">{{$cmm->created_at}}</p>
                                  <p>{{$cmm->comment}}</p>
                              </div>
                          </li>
                          @endforeach
                        @else
                          <li class="">
                            <br>
                              <div class="timeline-content">
                                <h6>Jadilah Yang Pertaman Menuliskan Komentar Anda</h6>
                              </div>
                          </li>
                        @endif
                      </ul>

                      <!-- comment -->
                      <br>
                      <h5 class="card-title">Submit Your Comment</h5>
                      <form action="{{route('comment.store', $item->sosialisasi->id)}}" method="post">
                        @csrf
                        <div class="row clearfix">
                          <div class="col-12">
                              <textarea class="form-control" name="comment" style="min-height:100px"></textarea>
                          </div>
                          <div class="col-sm-12">
                              <div class="mt-4">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
          @endif

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
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/light-gallery/css/lightgallery.css') }}">
<style>
  .like{
    color:red;
  }

  .dislike{
    color:#d1d1d1;
  }
  </style>
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/bundles/lightgallery.bundle.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/medias/image-gallery.js') }}"></script>
<script type="text/javascript">
  function like(id,datatwice) {
    var twice = datatwice.attr("cliktwice");
    datatwice.attr("cliktwice","false");
    if(twice == 'true'){
      var count = parseInt($("#like-count-"+id).text());
      $.ajax({
         type:'POST',
         url:'{{url("like/")}}/'+id,
         data:{"_token": "{{ csrf_token() }}"},
         success:function(data) {
           datatwice.attr("cliktwice","true");
           if(data == "like"){
             $("#like-"+id).removeClass("dislike").addClass("like");
             $("#like-count-"+id).text(count+1);
           }else {
             $("#like-"+id).removeClass("like").addClass("dislike");
             $("#like-count-"+id).text(count-1);
           }
         }
      });
    }
  }
</script>
@stop
