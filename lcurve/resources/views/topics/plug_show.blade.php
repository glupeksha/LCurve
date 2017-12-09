<div class="panel panel-default">
  <div class="panel-heading">
  {{$topic->name}}
  </div>
  <div class="panel-body">
    {!! $topic->content !!}
    <div>
      @foreach ($classSubject->subtopics($topic->id) as $subtopic)
          @include('topics/plug_show',['topic' => $subtopic])
      @endforeach
    </div>
  </div>
</div>
