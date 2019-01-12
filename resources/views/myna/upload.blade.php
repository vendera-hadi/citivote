@extends('myna.layouts.main')

@section('title')
Upload Photo
@endsection

@section('background')
bg-upload
@endsection

@section('content')
<div class="row justify-content-center w-100 h-100 mx-0 my-5">
    <!-- center -->
    <div class="col-md-8 col-sm-12 text-center">
      <div class="row main-container">
        <div class="col-sm-12">
          <h3 class="font-weight-bold">Please Upload Your Photo</h3>
          <div class="upload-box mt-5 mb-4 py-3 rounded">
            <img v-bind:src="selectedSource" class="addon d-none">
            <croppa v-model="imgUploader" :width="250" :height="250"
                    v-bind:initial-image="initImage"
                    :file-size-limit="6000000"
                    accept=".jpg,.jpeg,.png"
                    :disable-click-to-choose="true"
                    :prevent-white-space="true"
                    @file-type-mismatch="onFileTypeMismatch"
                    @file-size-exceed="onFileSizeExceed"
                    @draw="onDraw"
                    placeholder=""
                    canvas-color="white"
                    placeholder-color="transparent"
                    initial-size="cover"
                    initial-position="center">
                    <img slot="placeholder"
             src="{{ asset('images/myna/placeholder.png') }}">
            </croppa>
            <button class="btn btn-primary btn-rounded" @click="imgUploader.chooseFile()">CHOOSE PHOTO</button>
          </div>
          <small class="text-purple">maximum upload size is 5MB *</small>
          <div class="my-5">
            <h3 class="font-weight-bold">Please Choose Category</h3>
            <select class="form-control mt-4" name="category" @change="changeFrameList">
              <option value="passion">Passion</option>
              <option value="drive">Drive</option>
              <option value="inspiration">Inspiration</option>
              <option value="optimism">Optimism</option>
            </select>
          </div>

          <div class="mt-5">
            <h3 class="font-weight-bold my-4">Please Choose Your Frame</h3>
            <div class="frame-panel rounded py-3">
              <!-- passion -->
              <div class="row" id="passion">
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-1.png')}}" alt="">
                  </a>
                </div>
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-2.png')}}" alt="">
                  </a>
                </div>
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-3.png')}}" alt="">
                  </a>
                </div>
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-1.png')}}" alt="">
                  </a>
                </div>
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-2.png')}}" alt="">
                  </a>
                </div>
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-3.png')}}" alt="">
                  </a>
                </div>
              </div>

              <!-- drive -->
              <div class="row d-none" id="drive">
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-1.png')}}" alt="">
                  </a>
                </div>
              </div>

              <!-- inspiration -->
              <div class="row d-none" id="inspiration">
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-2.png')}}" alt="">
                  </a>
                </div>
              </div>

              <!-- optimism -->
              <div class="row d-none" id="optimism">
                <div class="col-sm-4 my-3">
                  <a href="#" @click="changeFrameImage">
                    <img src="{{asset('images/myna/frame-3.png')}}" alt="">
                  </a>
                </div>
              </div>

            </div>
          </div>

          <div class="mt-5">
            <button type="button" class="btn btn-purple text-white">PREVIEW</button>
          </div>

        </div>
      </div>
    </div>
</div>
@endsection
