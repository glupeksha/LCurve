<div class="panel panel-default">
  <div class="panel-heading">
  {{ Form::model($topic, array('action' => ['TopicController@updateName', $topic], 'method' => 'PUT')) }}
  {{ Form::button('<i class="material-icons">mode_edit</i> Save Changes', array('type'=>'submit','class' => 'waves-effect waves-light btn editbtn')) }}
  {{ Form::text('name', $topic->name, array('class' => 'form-control') ) }}

  {{ Form::close() }}
  </div>
  <div class="panel-body">
    {{$topic->content}}
    <div>
      @foreach ($classSubject->subtopics($topic->id) as $subtopic)
          @include('topics/plug_show',['topic' => $subtopic])
      @endforeach
    </div>
  </div>
</div>
