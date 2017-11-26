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
              <strong><h4>Description:</h4></strong>
              {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
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
              <label for="book_image">Image: </label>
              
              {!! Form::file('book_image', null, array('placeholder' => 'BookImage', 'class' => 'image')) !!}

          </div>
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </div>
</div>