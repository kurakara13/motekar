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
        <div class="col-lg-12 col-md-12">
          <div class="x_content bs-example-popovers">
            <div class="slider-item alert-success" >
              <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-12 ftco-animate text-center">
                  <br>
                  <br>
                  <h3>
                    <span class="fa fa-quote-left"></span>
                    Teruslah kreatif dan berinovasi! Itulah budaya Motekar!
                    <span class="fa fa-quote-right"></span>
                    </h3>
                    <h3>- Mohammad Syibli [GM Telkom Bogor]</h3>
                  <br>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                  <div class="body">
                    <h2>Sneak Peek</h2>
                    <hr>
                      <blockquote class="blockquote mb-0">
                          <p>
                            <strong class="green">Motekar</strong> adalah <i>Knowledge Management System</i> Telkom Bogor yang dimulai sejak 2019.
                          <strong class="green">Motekar</strong> menjadi wadah bagi karyawan untuk menyampaikan pengetahuan <i>best practice</i> yang telah diterapkan di unit kerjanya, sehingga dapat ditiru oleh unit kerja lain sesuai kebutuhan.
                            Dengan begitu, cara-cara baru yang sebelumnya diterapkan dalam skala kecil dapat diadopsi ke skala yang lebih besar dengan harapan meningkatkan efektifitas kerja perusahaan.
                          </p>
                      </blockquote>
                      <br>
                      <blockquote class="blockquote mb-0">
                          <p>
                            Selain itu, <strong class="green">Motekar</strong> juga memberi ruang kepada karyawan untuk menyuarakan masalah yang ditemukan di unit kerjanya.
                            Masalah-masalah tersebut kemudian diselesaikan bersama-sama melalui sebuah tim project melalui tahapan <strong class="green">design thinking</strong> yaitu,
                            <i class="green">find problem, brainstorming, gathering idea, proposal, project development, pilot project, dan implementation.</i>
                          </p>
                      </blockquote>
                  </div>
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-3">
            <div class="card text-white bg-green">
                <div class="card-header">Sejak Motekar dimulai..</div>
                <div class="card-body">
                  <div class="row clearfix">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="body w_summary">
                                <div class="s_detail">
                                    <h4 class="mb-0"><i class="fa fa-exclamation green"></i> 14 <span>Masalah</span></h4>
                                    <span>telah disuarakan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="body w_summary">
                                <div class="s_detail">
                                  <h4 class="mb-0"><i class="fa fa-lightbulb-o green"></i> 3 <span>Inovasi</span></h4>
                                  <span>berhasil diciptakan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="body w_summary">
                              <div class="s_detail">
                                <h4 class="mb-0"><i class="fa fa-gears green"></i> 2 <span>Ide</span></h4>
                                <span>sedang dikembangkan</span>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="body w_summary">
                              <div class="s_detail">
                                <h4 class="mb-0"><i class="fa fa-smile-o green"></i> 28 <span>Karyawan</span></h4>
                                <span>terlibat secara aktif</span>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
      <div class="row clearfix">
        <div class="col-lg-12">
                <div class="card bg-green">
                    <div class="body">
                    <h4 class="text-center text-success">Design Thinking, Innovation Starts Here!</h4>
                    <p class="text-center">Penyelesaian masalah-masalah di Motekar dikerjakan dengan suatu kerangka <i>Design Thinking</i> sebagai berikut.</p>
                    <br>
                        <ul class="timeline timeline-centered">
                            <li class="timeline-item">
                                <div class="timeline-info">
                                <h5><a href="#" class="btn btn-outline-danger"><i class="fa fa-exclamation-circle"></i> Find Problem</a></h5>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p>Masalah harus dirumuskan menggunakan kaidah SMART (Specific, Measureable, Achievable, Realistic, and Timely)</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-info">
                                <h5><a href="#" class="btn btn-outline-warning"><i class="fa fa-puzzle-piece"></i> Brainstorming</a></h5>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p>Metode untuk menggali semua kemungkinan sebagai solusi dari permasalahan yang ada.</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-info">
                                <h5><a href="#" class="btn btn-outline-warning"><i class="fa fa-group"></i> Gathering Idea</a></h5>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p>Fokus pada Ide Utama, tunjukkan bahwa Ide tersebut layak dan mungkin dilakukan.</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-info">
                                <h5><a href="#" class="btn btn-outline-success"><i class="fa fa-gears"></i> Project Development</a></h5>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p>Penyusunan berbagai rencana kegiatan, anggaran dan bukit-bukit kemenangan untuk menyelesaikan masalah utama.</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-info">
                                <h5><a href="#" class="btn btn-outline-info"><i class="fa fa-rocket"></i> Pilot Project</a></h5>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p>Proses pengembangan dan realisasi solusi dari masalah yang dihadapi. Biasanya dibuat dalam skala kecil yang bisa dikembangkan untuk skala yang lebih besar.</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-info">
                                <h5><a href="#" class="btn btn-outline-primary"><i class="fa fa-lightbulb-o"></i> Project Implementation</a></h5>
                                </div>
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p> Ketika ide dan solusi yang ditawarkan memang terbukti mampu menyelesaikan masalah, maka tiba waktunya solusi dilaksanakan secara penuh di lingkup yang lebih luas.</p>
                                </div>
                            </li>
                        </ul>
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
