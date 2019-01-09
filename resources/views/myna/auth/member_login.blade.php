@extends('myna.layouts.main')

@section('title')
Member Login
@endsection

@section('content')
<div class="row justify-content-center w-100 h-100">

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
