@extends('layouts.citivote.auth')

@section('title')
Member Login
@endsection

@section('content')
<div class="row justify-content-center h-100">
    <!-- left -->
    <div class="col-md-4 col-sm-12 blue-panel">
        <div class="left-top p-5">
          <h2 class="text-white font-weight-bold text-capitalize">Forward Compatible</h2>
          <img src="{{ asset('images/logo_big.png') }}" class="my-2 w-75 image-fluid" alt=""><br>
          <div class="left-text pt-4 text-white">
            <h3 class="font-weight-bold text-capitalize">A Mindset Change</h3>
            <h6>"...forward compatible people are compelled to keep challenging themselves and be forever learning and growing..."</h6>
          </div>
        </div>

        <div class="left-bottom p-5">
          <!-- <img src="{{ asset('images/50_year.png') }}" alt=""> -->
        </div>
    </div>
    <!-- right -->
    <div class="col-md-8 col-sm-12">
      <div class="row justify-content-center">
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
      </div>
    </div>
</div>
@endsection
