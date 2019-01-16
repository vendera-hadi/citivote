@extends('myna.layouts.main')

@section('title')
Upload Preview
@endsection

@section('background')
{{ !$user->photo ? 'bg-confirmation' : 'bg-reconfirm' }}
@endsection

@section('content')
<!-- if user->photo exist, tampilan 2, else tampilan 1 -->
<div class="row justify-content-center w-100 h-100 mx-0 my-5">
    <!-- center -->
    <div class="col-md-8 col-sm-12 text-center">
      <div class="row main-container">
        <div class="col-sm-12">
          <form id="form-confirm" action="{{route('store_upload')}}" v-on:submit="submitReconfirm" method="post">
            @csrf
            @if($user->photo)
              <h3 class="font-weight-bold">Looks like you've submitted before. <br>Which one do you prefer?</h3>
              <div class="mt-5 mb-4">
                <input type="hidden" name="image_path" value="">
                <div class="row">
                  <div class="col-sm-6 mb-5">
                    <img src="{{asset("storage/".$user->photo->image_path)}}?time={{microtime()}}" @click="choosePhoto" width="250" class="img-fluid rounded" alt="">
                    <h4 class="my-3">Previous</h6>
                  </div>
                  <div class="col-sm-6">
                    <img src="{{asset("storage/users/photo/$filename")}}" @click="choosePhoto" width="250" class="img-fluid rounded" alt="">
                    <h4 class="my-3">New</h6>
                  </div>
                </div>
              </div>

              <div class="mt-2">
                <button name="submit" class="btn btn-purple text-white">OK</button>
              </div>
            @else
              <h3 class="font-weight-bold">Your Picture is Ready, <br>Do you want to submit?</h3>
              <div class="mt-5 mb-4">
                <input type="hidden" name="image_path" value="{{"users/photo/$filename"}}">
                <img src="{{asset("storage/users/photo/$filename")}}" width="250" class="img-fluid rounded" alt="">
              </div>
              <div class="mt-5">
                <div class="row confirmation-panel">
                  <div class="col-sm-6 mb-3">
                    <button class="btn btn-purple text-white">YES</button>
                  </div>
                  <div class="col-sm-6 mb-3">
                    <a href="{{ route('upload_photo') }}" class="btn btn-purple text-white">NO</a>
                  </div>
                </div>
              </div>
            @endif
          </form>
       </div>
     </div>
   </div>
</div>
@endsection
