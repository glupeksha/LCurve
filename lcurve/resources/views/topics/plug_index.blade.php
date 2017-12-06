<li id="topic_{{$topic->id}}">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse{{$topic->id}}">{{$topic->name}}</a>
      </h4>
    </div>
    <div id="collapse{{$topic->id}}" class="panel-collapse collapse">
      <div class="panel-body">{{$topic->name}}</div>
      <div class="panel-footer">Panel Footer</div>
    </div>
  </div>
  <ol>
  @foreach ($classSubject->subtopics($topic->id) as $subtopic)
      @include('topics/plug_index',['topic' => $subtopic])
  @endforeach
  </ol>
</li>
