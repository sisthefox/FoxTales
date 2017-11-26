@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Book</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('reviews.index') }}"> < Back</a>
        </div>
      </div>

    </div>
    <div class="container styleform">
      <div class="row fontsize">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Book Name:</strong>
                  {{ $review->book_title}}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong class="">Author:</strong>
                  {{ $review-->author}}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Description:</strong>
                  {{ $review->description}}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Publishing Company:</strong>
                  {{ $review->publishing_company}}
              </div>
          </div>
		  
    </div>

@endsection
