@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add a New Comment</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('reviews.index', ['review_id' => $review_id]) }}"><span class="glyphicon glyphicon-chevron-left"></span></a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        {{ csrf_field() }}
      {!! Form::open(['method'=>'POST', 'route' => ['reviewcomments.store', 'review_id' => $review_id ]]) !!}
           @include('reviewcomments.form')
      {!! Form::close() !!}
    </div>

@endsection
