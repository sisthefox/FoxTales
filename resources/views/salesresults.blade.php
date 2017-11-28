@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Search Result</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($sales as $sale)
        <div class="col-md-3">
              <div class="thumbnail">
                <p> <img src="{{ $sale->book_image }}" width="150px" height="150px;"></p>
                <div class="caption">

                  <h3 align=center>Book Name: {{ $sale->book_title}}</h3>
                  <p>Author: {{ $sale->author}}</p>
                  <p>Descritption: {{ $sale->description}}</p>
                  <p>Publishing Company: {{ $sale->publishing_company }}</p>
				          <p>User: {{ $sale->user->name }}</p>
              
							<p>Comments:</p>


						  @foreach ($sale->comment as $comment)
							<p>{{\App\User::find($comment->user_id)->name}} [{{$comment->created_at}}]: {{ $comment->comment }}</p>
						  @endforeach
					<a class="btn btn-primary" href="{{ route('salescomments.create', ['sale_id' => $sale->id] )}}">comment</a>

                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>




@endsection
