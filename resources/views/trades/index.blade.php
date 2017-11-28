@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Trade</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="pull-left search">
        <div class="form_search-warp">
          <form method="GET" action="/traderesults">
            <label class="col-md-4 searchlebel control-label" style="font-size:24px" for="query"><span class="glyphicon glyphicon-search" style="font-size:20px"></span> Search</label>
            <div class="col-md-8">
              <input class="overlay_search-input form-control" name="query" placeholder ="Type a Trade Book for Another User" type="text" size="39">
              <a href="#" class="overlay_search-close">
            </div>

              <span></span>
              <span></span>
            </a>
          </form>
        </div>
      </div>
      <div class="pull-right add">
          <a class="btn btn-success" href="{{ route('trades.create') }}"><span class="glyphicon glyphicon-plus"></span> Add a new book</a>
      </div>
    </div>

    <!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif-->

    @foreach ($trades as $trade)
    <!--<div class="row">-->
        <div class="col-md-3">
              <div class="thumbnail">
                <div class="text-center"> <img src="{{ $trade->book_image }}" class="img-thumbnail" width="150px"></div>
                <div class="caption">
                  <!--<td>{{ ++$i }}</td>-->
                  <h3 align=center>{{ $trade->book_title}}</h3>
                  <p>Author: {{ $trade->author}}</p>
                  <p data-toggle="collapse" data-target="#description{{ $trade->book_title}}">Descritption <span class="caret"></span></p>
                  <div id="description{{ $trade->book_title}}" class="collapse">
                    <p> {{ $trade->description}} </p>

                  </div>
                  <p>Publishing Company: {{ $trade->publishing_company }}</p>

                  <p data-toggle="collapse" data-target="#comment{{ $trade->book_title}}">Comments <span class="caret"></span></p>
                  <div id="comment{{ $trade->book_title}}" class="collapse">
                    @foreach ($trade->comment as $comment)
                      <div class="panel panel-default coments-panels">
                          <div class="panel-heading paneltop">
                            <span>{{$comment->created_at}} - </span> <!--<strong style="color:#fff">User:</strong>--> <span class="glyphicon glyphicon-user" style="color:black"></span> <strong style="color:rgb(222, 99, 24);font-size: initial">{{\App\User::find($comment->user_id)->name}} </strong> <span>says:</span>

                          </div>
                          <div class="panel-body">
                            <p> {{ $comment->comment }}</p>
                          </div>

                      </div>

                      @endforeach

                  </div>
				    <!--@foreach ($trade->comment as $comment)
						<p>{{\App\User::find($comment->user_id)->name}} [{{$comment->created_at}}]: {{ $comment->comment }}</p>
					@endforeach-->


					<a class="btn btn-primary" href="{{ route('comments.create', ['trade_id' => $trade->id] )}}"><span class="glyphicon glyphicon-retweet"></span> Reply Users</a>

                      <a class="btn btn-primary" href="{{ route('trades.edit',$trade->id) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
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
<!--<div class="overlay_search">
	<div class="container">
		<div class="row">
			<div class="form_search-warp">
				<form method="GET" action="/traderesults">
					<h3 align=center>Type a Trade Book for Another User:</h3>
					<input class="overlay_search-input" style="color: #000" name="query" placeholder ="Type and hit Enter..." type="text">
					<a href="#" class="overlay_search-close">
						<span></span>
						<span></span>
					</a>
				</form>
			</div>
		</div>
	</div>
</div>-->
@endsection
