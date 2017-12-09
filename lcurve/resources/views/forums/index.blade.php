@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1" >
        <div class="panel panel-default" > 
            <div class="panel-heading"  >
                <h3>Forums</h3>
            </div>
             

            @foreach ($forums as $forum)         
                <div class="panel-body panel-heading">
                        <a href="{{ route('forums.show', $forum->id ) }}">
                            <p class="teaser">
                            <div class="row">
                              <div class="col-lg-1 " >  
                                <img src="{{ asset('images\speaking.png') }}" class="image-style">
                              </div> 
                              <div class="col-lg-9 col-lg-offset-1">
                                {{  str_limit($forum->title, 50) }} 
                                <br>
                        </a>
                                <small>
                                {!!  str_limit($forum->content,75) !!} 
                                </small>
                              </div>
                        
                              <div class="col-lg-1">
                              <a href="{{ route('forums.show', $forum->id ) }}">
                               <img src="{{asset('images\chat.png' )}}" class="image-style1" >
                               </a>
                               {{$forum->comments->count()}} 
                                </div>
                             </div>
                            </p>
                         
                            <p >
                              <div class="col-md-offset-2 row">
                                <h6 class="media-heading" style="font-family:inherit;">
                                    Posted by {{$forum->user->name}} &nbsp;
                                    <i><small>{{$forum->created_at->diffForHumans()}}</small></i>

                                </h6>                              
  
                              </div>
                            </p>                            
                                      
                </div>                  
            @endforeach
        </div>
    </div>
            
    <div class="text-center">
        {!! $forums->links() !!}
    </div>
</div>

@endsection