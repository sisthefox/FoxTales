@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body home">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                           			<strong>Name: {{ Auth::user()->name }}</strong>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                  <strong>E-mail: {{ Auth::user()->email }}</strong>

                                </div>
                            </div>
                            {!! Form::open(['method' => 'DELETE','route' => ['myaccount.destroy', Auth::id()],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
