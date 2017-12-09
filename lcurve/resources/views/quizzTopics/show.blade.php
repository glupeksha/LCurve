 @extends('layouts.app')

@section('dash-left')

 <h3 class="page-title">Topics</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            view
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>title</th>
                    <td>{{ $topic->name }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('quizzTopics.index') }}" class="btn btn-default">back_to_list</a>
        </div>
    </div>

@endsection