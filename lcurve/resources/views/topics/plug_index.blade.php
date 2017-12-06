<li id="topic_{{$topic->id}}">
  <div class="">
    <a href="#" class="list-group-item">{{$topic->name}}</a>
  </div>
  <ol>
  @foreach ($classSubject->subtopics($topic->id) as $subtopic)
      @include('topics/plug_index',['topic' => $subtopic])
  @endforeach
  </ol>
</li>
