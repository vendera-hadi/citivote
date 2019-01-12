@extends('myna.layouts.main')

@section('title')
Upload Photo
@endsection

@section('background')
bg-upload
@endsection

@section('content')
<div class="row justify-content-center w-100 h-100 mx-0">
    <!-- center -->
    <div class="col-md-8 col-sm-12 text-center">
      <div class="row main-container">
        <div class="col-sm-12">
          <h1>Please Upload Your Photo</h1>
          <div class="upload-box mt-5 mb-4 py-3 rounded">
            <croppa v-model="imgUploader" :width="250" :height="250"
                    :file-size-limit="6000000"
                    :disable-click-to-choose="true"
                    :prevent-white-space="true"
                    initial-size="cover"
                    initial-position="center">
            </croppa>
            <button class="btn btn-primary btn-rounded" @click="imgUploader.chooseFile()">CHOOSE PHOTO</button>
          </div>
          <small class="text-purple">maximum upload size is 5MB *</small>
        </div>
      </div>
    </div>
</div>
@endsection
