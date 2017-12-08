@forelse ($forum->comments()->get() as $comment)
  <div class="thumbnail">
    <div class="media">
      <div class="media-left">
        <img src="../images/img_avatar1.png" class="media-object" style="width:60px">
      </div>
      <div class="media-body">
        <h4 class="media-heading">{{$comment->user->name}} <small><i> {{$comment->created_at->diffForHumans()}}</i></small></h4>
        <p>{{($comment->content)}}</p>
      </div>
    </div>
  </div>
@empty
  Start the discussion for this forum
@endforelse
