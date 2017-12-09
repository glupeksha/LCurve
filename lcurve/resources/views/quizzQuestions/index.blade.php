@extends('layouts.app')

@section('dash-left')
	<h3 class="page-title">Quizz</h3>

    <p>
        <a href="{{ route('quizzQuestions.create') }}" class="btn btn-success">Add a New Question</a>
    </p>

    <div class="panel panel-default">
    	<div class="panel-heading">
            list
      	</div>
      	<div class="panel-body">
      		<table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
      			<thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>topic</th>
                        <th>question-text</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                <td class="select-checkbox"><input type="checkbox" name="id" value="checked" /></td>
                                <td>{{ $question->topic->name or '' }}</td>
                                <td>{!! $question->question_text !!}</td>
                                <td>
                                    <a href="{{ route('quizzQuestions.show',[$question->id]) }}" class="btn btn-xs btn-primary">view</a>

                                    @can('Edit QuizzQuestion')
    									<a href="{{ route('quizzQuestions.edit', [$question->id]) }}" class="btn btn-info" role="button">Edit</a>
    								@endcan
								    @can('Delete QuizzQuestion')
								        {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['quizzQuestions.destroy', $question->id] ]) !!} 
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}

								     @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">quickadmin.no_entries_in_table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
      		</table>
      	</div>
    </div>
    
@endsection