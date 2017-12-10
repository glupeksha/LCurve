@forelse ($essay->essayAnswers()->orderby('id','desc')->paginate(5) as $essayAnswers)
  <div class="thumbnail">
      <div class="media-left">
        <img src="../images/doc.png" class="media-object" style="width: 30px;height: 30px;" >
      </div>
      <div class="media-body">
        <h6 class="media-heading">{{$essayAnswers->user->name}} 
        <small><i> {{$essayAnswers->created_at->diffForHumans()}}</i></small>
        </h6>
         <a href="{{route('essayAnswers.show',[$essayAnswers]) }}" >        
        <p class="test">{!!($essayAnswers->content)!!}</p>
        </a>
      </div>
 
  </div>
@empty
  &nbsp;&nbsp;
  Add Essay
@endforelse

<div class="text-center">
    {!! $essay->essayAnswers()->orderby('id','desc')->paginate(5)->links() !!}      
</div>
