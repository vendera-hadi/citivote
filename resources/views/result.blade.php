@extends('layouts.citivote.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h1 class="text-white font-weight-bold text-capitalize mb-5 mx-2 text-center">Current standings to Current Results</h1>
      @foreach($categories as $category)
      <div class="vote-category-box rounded py-4 mx-2 mb-5 w-100">
        <h1 class="text-center font-weight-bold">{!! $category->name !!}</h1>
        <p class="text-center mx-2">{!! $category->description !!}</p>
        <div class="row p-3">
          @foreach($candidates as $candidate)
          <div class="candidate-box col-lg-2 col-md-4 col-sm-12 text-center">
            <h5 class="font-weight-bold">{{$candidate->nickname}}</h5>
            <img src="{{asset('images/users/'.$candidate->image)}}" title="{{$candidate->name}}" data-placement="right" data-toggle="tooltip" class="img-fluid circle py-3" alt="">
            <!-- <h6>{!!$candidate->description!!}</h6> -->
            @php
            $total_votes_of_category = $candidate->votes()->where('vote_category_id', $category->id)->count();
            $percentage = round($total_votes_of_category / 2000 * 100, 1);
            @endphp
            <div class="progress mx-4">
              <div class="progress-bar" role="progressbar" style="width: {{$percentage}}%" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="text-blue font-weight-bold">{{$percentage}}%</p>
            <p class="text-blue font-weight-bold">{{$total_votes_of_category}}/2000 votes</p>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
</div>
@endsection
