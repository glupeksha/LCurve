@extends('layouts.app')
@section('dash-left')

<h3 class="page-title">title</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            view
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>question</th>
                    <td>{{ $quizzQuestionOption->question->question_text or '' }}</td></tr>
                    <tr><th>option</th>
                    <td>{{ $quizzQuestionOption->option }}</td></tr><tr><th>correct</th>
                    <td>{{ $quizzQuestionOption->correct == 1 ? 'Yes' : 'No' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('quizzQuestionOptions.index') }}" class="btn btn-default">Back To List</a>
        </div>
    </div>

@endsection