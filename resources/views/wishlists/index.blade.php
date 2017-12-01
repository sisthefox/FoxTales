@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="page-header">
                <h2>Wishlist</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="pull-right add">
          <a class="btn btn-success" href="{{ route('wishlists.create') }}"><span class="glyphicon glyphicon-plus"></span></a>
      </div>
    </div>

    <!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif-->

    @foreach ($wishlists as $wishlist)
    <!--<div class="row">-->
        <div class="col-md-3">
              <div class="thumbnail">
                <div class="text-center">
                  <img src="{{ $wishlist->book_image }}" class="img-thumbnail imgbooks">
                </div>
                <div class="caption">
                  <!--<td>{{ ++$i }}</td>-->

                  <h3 align=center>{{ $wishlist->book_title}}</h3>
                  <p>Author: {{ $wishlist->author}}</p>
                  <p data-toggle="collapse" data-target="#descritption{{ $wishlist->id}}">Descritption <span class="caret"></span></p>
                  <div id="descritption{{ $wishlist->id}}" class="collapse">
                    <p>{{ $wishlist->description}}</p>
                  </div>
                  <p>Publishing Company: {{ $wishlist->publishing_company }}</p>

                  <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $wishlist->rating }}" data-size="xs" disabled="">
                  <div align=right>


                      <!--<a class="btn btn-info" href="{{ route('wishlists.show',$wishlist->id) }}">Show</a>-->
                      <a class="btn btn-primary" href="{{ route('wishlists.edit',$wishlist->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                      {!! Form::open(['method' => 'DELETE','route' => ['wishlists.destroy', $wishlist->id],'style'=>'display:inline']) !!}
                      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>

    {!! $wishlists->render() !!}
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
