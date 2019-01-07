@extends('layouts.citivote.main')

@section('title')
Vote Page
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h1 class="text-white font-weight-bold text-capitalize">Cast Your Vote Here</h1>
      <!-- <h5 class="text-white p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5> -->

      <form id="vote-form" action="{{route('create_vote')}}" v-on:submit.prevent="onSubmit" class="w-100 p-4" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$user_id}}">
        @foreach($categories as $category)
        <vote-category-box :category='{{ $category }}' :candidates='{!! $candidates !!}'></vote-category-box>
        @endforeach

        <center><button class="btn btn-primary btn-purple" name="submit">SUBMIT</button></center>
      </form>
    </div>
</div>
@endsection

@section('modal')
<div class="overlay w-100" v-on:click="closeOverlay" v-if="overlay">
  <div class="row justify-content-center w-100">
    @include('shared.warning_modal')
    @include('shared.done_modal')
  </div>
</div>
@endsection
