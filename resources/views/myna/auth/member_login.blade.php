@extends('myna.layouts.main')

@section('title')
Member Login
@endsection

@section('background')
bg-login
@endsection

@section('content')
<div class="row justify-content-center w-100 h-100 mx-0">

    <!-- right -->
    <div class="col-md-8 col-sm-12">
      <div class="row justify-content-center text-center main-container w-100 mx-0">
          <div class="col-md-12">
              <h1>My Next Aspiration</h1>
              <p class="text-muted mx-auto subtitle-header">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ... </p>
          </div>

          <div class="login-box col-md-6 p-5 text-center rounded">
            <form action="{{route('post_member_login')}}" method="post">
              @csrf
              <div class="form-group {{session()->has('errors') ? 'has-danger' : ''}}">
                <input type="text" class="w-100 px-3" name="soeid" placeholder="SOEID" required>
                @if(session()->has('errors'))
                <p class="text-danger">{{session()->get('errors')->first()}}</p>
                @endif
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary w-100" name="button">Login</button>
              </div>
            </form>
          </div>

          <div class="col-md-12 my-5">
            <h3 class="text-white font-weight-bold">WIN <span class="text-purple">LOREM IPSUM PRIZE</span> FOR THE CHOSEN ONE!</h3>
          </div>
      </div>
    </div>
</div>
@endsection
