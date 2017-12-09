@forelse ($forum->comments()->orderby('id','desc')->paginate(5) as $comment)
  <div class="thumbnail">
      <div class="media-left">
        <img src="../images/chatcomments.png" class="media-object" style="width:50px">
      </div>
      <div class="media-body">
        <h6 class="media-heading">{{$comment->user->name}} <small><i> {{$comment->created_at->diffForHumans()}}</i></small></h6>
        <p class="test">{!!($comment->content)!!}</p>
      </div>

 
  </div>
@empty
  &nbsp;&nbsp;
  Start the discussion for this forum
@endforelse

<div class="text-center">
    {!! $forum->comments()->orderby('id','desc')->paginate(5)->links() !!}      
</div>
