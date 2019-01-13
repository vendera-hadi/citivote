@extends('myna.layouts.main')

@section('title')
Thank You
@endsection

@section('background')
bg-done
@endsection

@section('content')
<div class="row justify-content-center w-100 h-100 mx-0 my-5">
    <!-- center -->
    <div class="col-md-8 col-sm-12 text-center">
      <div class="row main-container">
        <div class="col-sm-12">
          <h3 class="font-weight-bold">All is set! <br> Thank you for your participation ...</h3>
          <div class="upload-box mt-5 mb-4 py-3 rounded">
            <img src="{{asset("storage/$filename")}}" width="250" class="img-fluid rounded" alt="">
          </div>
          <div class="mt-5">
            <a onclick="document.getElementById('logout').submit();" class="btn btn-purple text-white">
              OK
            </a>
          </div>
        </div>
      </div>
    </div>
 </div>
 @endsection
