<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
    <br>

    {{ Form::label('content', 'Announcement content') }}
    {{ Form::textarea('content', null, array('class' => 'form-control')) }}

    <br>

    {{ Form::submit('Create Announcement', array('class' => 'btn btn-success btn-lg btn-block')) }}
</div>

<div class="form-group">
    <div class="checkbox{{ $errors->has('hasEvent') ? ' has-error' : '' }}">
        <label for="hasEvent">
            {!! Form::checkbox('hasEvent', null, null, ['id' => 'toggle-event','data-toggle'='toggle']) !!} Create Event?
        </label>
    </div>
    <small class="text-danger">{{ $errors->first('hasEvent') }}</small>
</div>

<div id="event">
  @include('events.plug_create')
</div>

@push('script')
  <script>
    $(function() {
      $('#toggle-event').change(function() {
        $('#event').html('Toggle: ' + $(this).prop('checked'))
      })
    })
</script>
@endpush
