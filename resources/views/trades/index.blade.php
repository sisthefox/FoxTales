@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books Trade</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="pull-right add">
          <a class="btn btn-success" href="{{ route('trades.create') }}"> Add a new book</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($trades as $trade)
    <!--<div class="row">-->
        <div class="col-md-3">
              <div class="thumbnail">
                <p> <img src="{{ $trade->book_image }}" width="150px" height="150px;"></p>
                <div class="caption">
                  <!--<td>{{ ++$i }}</td>-->
                  <h3 align=center>Book Name: {{ $trade->book_title}}</h3>
                  <p>Author: {{ $trade->author}}</p>
                  <p>Descritption: {{ $trade->description}}</p>
                  <p>Publishing Company: {{ $trade->publishing_company }}</p>
				  <p>User: {{ $trade->user_id }}</p>
                  
                  <div align=right>
                      
                      <a class="btn btn-primary" href="{{ route('trades.edit',$trade->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['trades.destroy', $trade->id],'style'=>'display:inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>
    {!! $trades->render() !!}
@endsection
