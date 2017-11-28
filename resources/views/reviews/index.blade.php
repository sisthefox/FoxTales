@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Books Review</h2>
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
          <a class="btn btn-success" href="{{ route('reviews.create') }}"><span class="glyphicon glyphicon-plus"></span> Add a new book</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($reviews as $review)
    <!--<div class="row">-->
        <div class="col-md-3">
              <div class="thumbnail">
                <div class="text-center"> <img src="{{ $review->book_image }}" class="img-thumbnail" width="150px"></div>
                <div class="caption">
                  <!--<td>{{ ++$i }}</td>-->
                  <h3 align=center>{{$review->book_title}}</h3>
                  <p>Author: {{ $review->author}}</p>
                  <p>Descritption: {{ $review->description}}</p>
                  <p>Publishing Company: {{ $review->publishing_company }}</p>

					@foreach ($review->comment as $comment)
						<p>{{\App\User::find($comment->user_id)->name}} [{{$comment->created_at}}]: {{ $comment->comment }}</p>
					@endforeach


					<a class="btn btn-primary" href="{{ route('reviewcomments.create', ['review_id' => $review->id] )}}"><span class="glyphicon glyphicon-retweet"></span> Reply Users</a>

                      <a class="btn btn-primary" href="{{ route('reviews.edit',$review->id) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a>

                      {!! Form::open(['method' => 'DELETE','route' => ['reviews.destroy', $review->id],'style'=>'display:inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

  </div>
    {!! $reviews->render() !!}
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
