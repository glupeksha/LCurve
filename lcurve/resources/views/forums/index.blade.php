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
                        <a href="{{ route('forums.show', $forum->id ) }}" style="font-family:sans-serif;">
                            <p class="teaser">
                              <div style="float:left;" >  
                                <img src="images\speaking.png" style="width: 50px;height: 50px;">
                              </div> 
                              <div class="col-md-offset-2">
                                {{  str_limit($forum->content, 100) }} {{-- Limit teaser to 100 characters --}}
                              </div>
                            </p>
                        </a> 
                            <p>
                              <div class="col-md-offset-2">
                              <p>posted by fgdjfkhsklf {{$forum->created_at}}</p>
                              
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