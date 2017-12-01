@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Sales</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="pull-left search">
        <div class="form_search-warp">
          <form method="GET" action="/salesresults">
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
          <a class="btn btn-success" href="{{ route('sales.create') }}"><span class="glyphicon glyphicon-plus"></span></a>
      </div>
    </div>

    <!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif-->

    @foreach ($sales as $sale)
    <!--<div class="row">-->
        <div class="col-md-3">
              <div class="thumbnail">
                <div class="text-center"> <img src="{{ $sale->book_image }}" class="img-thumbnail imgbooks"></div>
                <div class="caption">
                  <!--<td>{{ ++$i }}</td>-->
                  <h3 align=center>{{$sale->book_title}}</h3>
                  <p>Author: {{ $sale->author}}</p>
                  <!--<p>Descritption: {{ $sale->description}}</p>-->
                  <p data-toggle="collapse" data-target="#description{{$sale->id}}">Descritption <span class="caret"></span></p>
                  <div id="description{{$sale->id}}" class="collapse">
                    <p> {{ $sale->description}} </p>
                  </div>
                  <p>Publishing Company: {{ $sale->publishing_company }}</p>
                  <p>Price: {{ $sale->sale_price }}</p>

                  <p data-toggle="collapse" data-target="#comment{{ $sale->id}}">Comments <span class="caret"></span></p>
                      <div id="comment{{ $sale->id}}" class="collapse">
              			    @foreach ($sale->comment as $comment)

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
                                <!--<p>{{\App\User::find($comment->user_id)->name}} [{{$comment->created_at}}]: {{ $comment->comment }}</p>
                              </div>
                              <div class="panel-body">
                                <p> {{ $comment->comment }}</p>
                              </div>
                          </div>-->
                        @endforeach
                      </div>
                        <div align=right>

                          <a class="btn btn-primary" style="font-weight:bold" href="{{ route('salescomments.create', ['sale_id' => $sale->id] )}}"><span class="glyphicon glyphicon-retweet"></span></a>
                          <a class="btn btn-primary" href="{{ route('sales.edit',$sale->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>

                          {!! Form::open(['method' => 'DELETE','route' => ['sales.destroy', $sale->id],'style'=>'display:inline']) !!}
                          {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                          <!--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}-->
                          {!! Form::close() !!}

                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

  </div>
    {!! $sales->render() !!}
	<!--<div class="overlay_search">
	<div class="container">
		<div class="row">
			<div class="form_search-warp">
				<form method="GET" action="/reviewresults">
					<h3 align=center>Type a Review Book for Another User:</h3>
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
