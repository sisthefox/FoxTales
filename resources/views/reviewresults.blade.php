@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Reviews From Another Users</h2>
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
                <a class="btn btn-primary" href="{{ route('reviews.index') }}"><span class="glyphicon glyphicon-chevron-left"></span></a>
            </div>
        </div>
    </div>
    @foreach ($reviews as $review)
        <div class="col-md-3">
              <div class="thumbnail">
                <div class="text-center"> <img src="{{ $review->book_image }}" class="img-thumbnail imgbooks"></div>
                <div class="caption">

                  <h3 align=center>{{ $review->book_title}}</h3>
                  <p>Book Author: {{ $review->author}}</p>
                  <!--<p>Descritption: {{ $review->description}}</p>-->
                  <p data-toggle="collapse" data-target="#description{{ $review->id}}">Descritption <span class="caret"></span></p>
                  <div id="description{{ $review->id}}" class="collapse">
                    <p> {{ $review->description}} </p>
                  </div>
                  <p>Publishing Company: {{ $review->publishing_company }}</p>
				          <p>Review By: <strong style="color: rgb(222, 99, 24);font-size: large">{{ $review->user->name }}</strong></p>

                  <p data-toggle="collapse" data-target="#comment{{ $review->id}}">Comments <span class="caret"></span></p>
                      <div id="comment{{ $review->id}}" class="collapse">
                        @foreach ($review->comment as $comment)

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
    						  @foreach ($review->comment as $comment)
    							<p>{{\App\User::find($comment->user_id)->name}} [{{$comment->created_at->format('d/m/Y H:i')}}]: {{ $comment->comment }}</p>
    						  @endforeach-->
                  <div align=right>
					           <a class="btn btn-primary" style="font-weight:bold" href="{{ route('reviewcomments.create', ['review_id' => $review->id] )}}"><span class="glyphicon glyphicon-comment"></span></a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>




@endsection
