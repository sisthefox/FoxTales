@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Search Result</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($trades as $trade)
    
        <div class="col-md-3">
              <div class="thumbnail">
                <p> <img src="{{ $trade->book_image }}" width="150px" height="150px;"></p>
                <div class="caption">
                  
                  <h3 align=center>Book Name: {{ $trade->book_title}}</h3>
                  <p>Author: {{ $trade->author}}</p>
                  <p>Descritption: {{ $trade->description}}</p>
                  <p>Publishing Company: {{ $trade->publishing_company }}</p>
				          <p>User: {{ $trade->name }}</p>
              
                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>

  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong><h4>Comment:</h4></strong>
              {!! Form::text('comment', null, array('placeholder' => 'Comment','class' => 'form-control')) !!}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <form method="GET" action="/CommentsController">
              <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </div>

    
@endsection
