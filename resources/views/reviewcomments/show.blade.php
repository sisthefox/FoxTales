@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Comments Page</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="pull-right add">
          <a class="btn btn-success" href=""> Add a new book</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    
  </div>
    
@endsection
