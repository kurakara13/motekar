@extends('layout.master')
@section('parentPageTitle', 'Problem ')
@section('title', 'Edit Problem')


@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Your Problem</h2>
            </div>
            <div class="body">
                <form id="basic-form" action="/problem/editproblemaction" method="post" novalidate>
                  @csrf
                    <input type="hidden" name="problem_id" value="{{ $problem->problem_id }}"> <br/>
                    <h6 class="text-success">Problem *</h6>
                    <div class="form-group">
                        <label>Text Area</label>
                        <textarea class="form-control" name="problem" rows="3" required>{{ $problem->problem }}</textarea>
                    </div>
                    <div class="form-group">
                    <h6 class="text-success">Asal ditemukanannya masalah *</h6>
                        <div class="form-group">
                            <div class="input-group demo-tagsinput-area">
                            <input type="text" name="asal_masalah" class="form-control" data-role="tagsinput" value="{{ $problem->asal_masalah }}" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6 class="text-success">Problem Background *</h6>
                    <div class="form-group">
                        <textarea required class="form-control ckeditor" id="ckeditor" name="background">
                        {!! $problem->background !!}
                        </textarea>
                    </div>
                    <!-- <div class="form-group">
                      <select class="form-control" name="status">

                        <option value="0" @if($problem->status == '0') selected @endif>Solved</option>
                        <option value="1" @if($problem->status == '1') selected @endif>Need Team Project</option>
                        <option value="2" @if($problem->status == '2') selected @endif>On Development</option>
                      </select>
                    </div> -->
                    <br>
                    <h6 class="text-success">Problem Tags *</h6>
                    <div class="form-group">
                        <div class="input-group demo-tagsinput-area">
                        <input type="text" name="tags" class="form-control" data-role="tagsinput" value="{{ $problem->tags }}" required>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary fa fa-pencil"> Edit Problem</button>
                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script><!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script>
$(function() {
    // validation needs name of the element
    $('#food').multiselect();

    // initialize after multiselect
    $('#basic-form').parsley();
});
</script>
@stop
