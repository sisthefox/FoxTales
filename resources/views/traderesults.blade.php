@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Trades From Another Users</h2>
            </div>
        </div>
    </div>

    <!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif-->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trades.index') }}"><span class="glyphicon glyphicon-chevron-left"></span></a>
            </div>
        </div>
    </div>

    @foreach ($trades as $trade)
      <div class="col-md-3">
          <div class="thumbnail">
             <div class="text-center"> <img src="{{ $trade->book_image }}" class="img-thumbnail imgbooks"></div>
             <div class="caption">

                    <h3 align=center>{{ $trade->book_title}}</h3>
                    <p>Author: {{ $trade->author}}</p>
                    <!--<p>Descritption: {{ $trade->description}}</p>-->
                    <p data-toggle="collapse" data-target="#description{{ $trade->id}}">Descritption <span class="caret"></span></p>
                    <div id="description{{ $trade->id}}" class="collapse">
                      <p> {{ $trade->description}} </p>
                    </div>
                    <p>Publishing Company: {{ $trade->publishing_company }}</p>
  				          <p>Trade by: <strong style="color: rgb(222, 99, 24);font-size: large">{{ $trade->user->name }}</strong></p>

                    <p data-toggle="collapse" data-target="#comment{{ $trade->id}}">Comments <span class="caret"></span></p>
                        <div id="comment{{ $trade->id}}" class="collapse">
                          @foreach ($trade->comment as $comment)

                            <div class="panel panel-default coments-panels">
                                <div class="panel-heading paneltop">
                                  <span class="glyphicon glyphicon-user" style="color:black;font-size: large"></span> <strong style="color:rgb(222, 99, 24);font-size: large">{{\App\User::find($comment->user_id)->name}} </strong>
                                  <div>
                                      <span style="font-size:smaller">{{$comment->created_at->format('d/m/Y - H:i')}} </span>
                                  </div>

                                  <!--<span>{{$comment->created_at->format('d/m/Y H:i')}} - </span> <!--<strong style="color:#fff">User:</strong> <span class="glyphicon glyphicon-user" style="color:black"></span> <strong style="color:rgb(222, 99, 24);font-size: initial">{{\App\User::find($comment->user_id)->name}} </strong> <span>says:</span>-->
                                </div>
                                <div class="panel-body">
                                  <p> {{ $comment->comment }}</p>
                                </div>
                            </div>

                            <!--<div class="panel panel-default coments-panels">
                                <div class="panel-heading paneltop">
                                  <span>{{$comment->created_at->format('d/m/Y H:i')}} - </span> <!--<strong style="color:#fff">User:</strong> <span class="glyphicon glyphicon-user" style="color:black"></span> <strong style="color:rgb(222, 99, 24);font-size: initial">{{\App\User::find($comment->user_id)->name}} </strong> <span>says:</span>
                                </div>
                                <div class="panel-body">
                                  <p> {{ $comment->comment }}</p>
                                </div>
                            </div>-->
                            @endforeach
                        </div>

							      <!--<p>Comments:</p>
      						  @foreach ($trade->comment as $comment)
      							<p>{{\App\User::find($comment->user_id)->name}} [{{$comment->created_at}}]: {{ $comment->comment }}</p>
      						  @endforeach-->
                    <div align=right>
                       <a class="btn btn-primary" style="font-weight:bold" href="{{ route('comments.create', ['trade_id' => $trade->id] )}}"><span class="glyphicon glyphicon-comment"></span></a>
                    </div>
              </div>
          </div>
      </div>
    @endforeach
  <!--</div>-->
@endsection
