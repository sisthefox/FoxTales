@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Review</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="pull-left search">
        <div class="form_search-warp">
          <form method="GET" action="/reviewresults">
            <label class="col-md-4 searchlebel control-label" style="font-size:24px" for="query"><span class="glyphicon glyphicon-search" style="font-size:20px"></span> Search</label>
            <div class="col-md-8">
              <input class="overlay_search-input form-control" name="query" placeholder ="Type a book name to search" type="text" size="39">
              <a href="#" class="overlay_search-close">
            </div>

              <span></span>
              <span></span>
            </a>
          </form>
        </div>
      </div>
      <div class="pull-right add">
          <a class="btn btn-success" href="{{ route('reviews.create') }}"><span class="glyphicon glyphicon-plus"></span></a>
      </div>
    </div>

    <!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif-->

    @foreach ($reviews as $review)
    <!--<div class="row">-->
        <div class="col-md-3">
              <div class="thumbnail">
                <div class="text-center"> <img src="{{ $review->book_image }}" class="img-thumbnail imgbooks"></div>
                <div class="caption">
                    <!--<td>{{ ++$i }}</td>-->
                    <h3 align=center>{{$review->book_title}}</h3>
                    <p>Author: {{ $review->author}}</p>
                    <!--<p>Descritption: {{$review->description}}</p>-->
                    <p data-toggle="collapse" data-target="#description{{$review->id}}">Descritption <span class="caret"></span></p>
                    <div id="description{{ $review->id}}" class="collapse">
                      <p>{{ $review->description}}</p>
                    </div>
                    <p>Publishing Company: {{ $review->publishing_company }}</p>

                     <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $review->classification }}" data-size="xs" disabled="">
                    <div align=right></div>


                    <p data-toggle="collapse" data-target="#comment{{$review->id}}">Comments <span class="caret"></span></p>
                    <div id="comment{{$review->id}}" class="collapse">
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
                                <!--<p>{{\App\User::find($comment->user_id)->name}} [{{$comment->created_at}}]: {{ $comment->comment }}</p>
                                <span>{{$comment->created_at->format('d/m/Y H:i')}} - </span> <span class="glyphicon glyphicon-user" style="color:black"></span> <strong style="color:rgb(222, 99, 24);font-size: initial">{{\App\User::find($comment->user_id)->name}} </strong> <span>says:</span>
                              </div>
                              <div class="panel-body">
                                <p> {{ $comment->comment }}</p>
                              </div>

                          </div>-->
              					@endforeach
                    </div>

                      <div align=right>
    					            <a class="btn btn-primary" style="font-weight:bold" href="{{ route('reviewcomments.create', ['review_id' => $review->id] )}}"><span class="glyphicon glyphicon-retweet"></span></a>
                          <a class="btn btn-primary" href="{{ route('reviews.edit',$review->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>

                          {!! Form::open(['method' => 'DELETE','route' => ['reviews.destroy', $review->id],'style'=>'display:inline']) !!}
                          {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                          <!--  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}-->
                          {!! Form::close() !!}

                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

  </div>
    {!! $reviews->render() !!}
<script type="text/javascript">
        $("#input-id").rating();
    </script>

<style>
div.clear-rating{display: none!important}
span.label{display: none!important}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>



@endsection
