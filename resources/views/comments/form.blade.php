<div class="container styleform">
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong><h4>Comment:</h4></strong>
              {!! Form::text('comment', null, array('placeholder' => 'Comment','class' => 'form-control')) !!}
          </div>
      </div>
      
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </div>
</div>