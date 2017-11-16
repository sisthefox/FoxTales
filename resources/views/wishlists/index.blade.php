@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books Wishlist</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="pull-right add">
          <a class="btn btn-success" href="{{ route('wishlists.create') }}"> Add a new book</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($wishlists as $wishlist)
    <!--<div class="row">-->
        <div class="col-md-3">
              <div class="thumbnail">
                <img src="{{ $wishlist->book_image}}" alt="não tem imagem nessa porra">
                <div class="caption">
                  <!--<td>{{ ++$i }}</td>-->
                  <h3 align=center>Book Name: {{ $wishlist->book_title}}</h3>
                  <p>Author: {{ $wishlist->author}}</p>
                  <p>Descritption: {{ $wishlist->description}}</p>
                  <p>Publishing Company: {{ $wishlist->publishing_company }}</p>
                  <div align=right>
                      <!--<a class="btn btn-info" href="{{ route('wishlists.show',$wishlist->id) }}">Show</a>-->
                      <a class="btn btn-primary" href="{{ route('wishlists.edit',$wishlist->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['wishlists.destroy', $wishlist->id],'style'=>'display:inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>
    {!! $wishlists->render() !!}
@endsection
