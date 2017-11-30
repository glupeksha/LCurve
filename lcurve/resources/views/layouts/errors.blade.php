@if(count($errors))
  <div class="form-group">
    <div class="alert alert-danger">
      <strong>Error!</strong>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
