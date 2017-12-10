@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1"  >
        <div class="panel panel-default" > 
           
            <div class="col-md-offset-1" >

                    <div class="media">
                    <br>
                      <div class="media-left">
                         <img src="../images/doc.png" style="width: 50px;height: 50px;">
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">{{$essayAnswers->user->name}} </h6>
                        <p>{!!($essayAnswers->content)!!}</p>
                      </div>
                    </div>              
                  <div class="col-lg-10"></div>
                  <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
                <br>
              <br>

          </div>  
        </div>       

</div>
</div>
@endsection

