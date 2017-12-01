<div class="container styleform">
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong><h4>Book Name:</h4></strong>
              {!! Form::text('book_title', null, array('placeholder' => 'Book Name','class' => 'form-control')) !!}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong><h4>Author:</h4></strong>
              {!! Form::text('author', null, array('placeholder' => 'Author','class' => 'form-control')) !!}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong><h4>What's your opinion?</h4></strong>
              {!! Form::text('description', null, array('placeholder' => 'Review','class' => 'form-control')) !!}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong><h4>Publishing Company:</h3></strong>
              {!! Form::text('publishing_company', null, array('placeholder' => 'Publishing Company','class' => 'form-control')) !!}
          </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong><h4>Rating:</h3></strong>
               
              {!! Form::text('classification', null, array('placeholder' => 'Please set 1 -> 5','class' => 'form-control')) !!}
          </div>
       </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <label for="book_image">Please Set an Image (all the time): </label>
              
              {!! Form::file('book_image', null, array('placeholder' => 'BookImage', 'class' => 'image')) !!}

          </div>
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </div>
</div>