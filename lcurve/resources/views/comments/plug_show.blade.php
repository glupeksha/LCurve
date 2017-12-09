<div class="thumbnail">
  <div class="media">
    <div class="media-left">
       <img src="images\speaking.png" style="width: 50px;height: 50px;">
    </div>
    <div class="media-body">
      <h6 class="media-heading">{{$comment->user->name}} 

      <small>{{$comment->created_at->diffForHumans()}}</small></h6>
      <p>{{($comment->content)}}</p>
    </div>
  </div>
</div>
