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

                    Welcome to the FoxTales!
                   <p> Did you read today?</p>
                    Take your beer and let's get started

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
