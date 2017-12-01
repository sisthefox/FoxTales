@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Add a New Comment</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trades.index', ['trade_id' => $trade_id]) }}"><span class="glyphicon glyphicon-chevron-left"></span></a>
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
      {!! Form::open(['method'=>'POST', 'route' => ['comments.store', 'trade_id' => $trade_id ]]) !!}
           @include('comments.form')
      {!! Form::close() !!}
    </div>

@endsection
