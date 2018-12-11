@extends('layouts.citivote.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Area</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link {{!request()->has('page') ? 'active' : ''}}" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="true">Vote Results</a>
                        <a class="nav-item nav-link {{request()->has('page') ? 'active' : ''}}" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">Input Users</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade {{!request()->has('page') ? 'show active' : ''}}" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
                        <div class="container">
                          <div class="row py-4">
                            <div class="col-sm-12">
                              <h1>Vote Result</h1>
                              <p>Total vote until now : {{$total_vote}} votes</p>
                              <form action="{{route('download_result')}}" method="get">
                                <button type="submit" name="button" class="btn btn-primary">Download Vote Result</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- tab2 -->
                      <div class="tab-pane fade {{request()->has('page') ? 'show active' : ''}}" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                        <div class="container">
                          <div class="row py-4">
                            <div class="col-sm-12">
                              <form action="{{route('import_member')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="input-file">File upload (csv)</label>
                                  <input type="file" name="file" accept=".csv" class="form-control-file" id="input-file" aria-describedby="fileHelp">
                                </div>
                                <div class="form-group">
                                  <button type="submit" name="button" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>

                          <div class="row py-3">
                            <div class="col-sm-12">
                              <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#SOEID</th>
                                    <th scope="col">has vote</th>
                                    <th scope="col">created at</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($members as $member)
                                  <tr>
                                    <th scope="row">{{$member->soeid}}</th>
                                    <td>{{$member->uservotes->count() > 1 ? 'yes' : 'no'}}</td>
                                    <td>{{date("d M Y", strtotime($member->created_at))}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              {{ $members->links() }}
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
