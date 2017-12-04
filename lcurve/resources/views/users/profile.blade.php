@extends('layouts.app')

@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>User Details</h3>
            </div>


            <div class="panel-body">

            	{{Auth::user()->name}}
			<br>{{Auth::user()->email}}
			<br>{{Auth::user()->password}}
			<br>{{Auth::user()->language}}




            </div>

        </div>

        <div class="text-center">
           
        </div>
    </div>
</div>
@endsection




