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
                        <td>{{ $quizzQuestion->topic->title or '' }}</td></tr><tr>
                    <th>question-text</th>
                    <td>{!! $quizzQuestion->question_text !!}</td></tr><tr>
                    <th>code-snippet</th>
                    <td>{!! $quizzQuestion->code_snippet !!}</td></tr><tr>
                    <th>answer-explanation</th>
                    <td>{!! $quizzQuestion->answer_explanation !!}</td></tr><tr>
                    <th>more-info-link</th>
                    <td>{{ $quizzQuestion->more_info_link }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('quizzQuestions.index') }}" class="btn btn-default">back_to_list</a>
        </div>
    </div>
@endsection