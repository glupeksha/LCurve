@extends('layouts.app')

@section('dash-left')
	<h3 class="page-title">Question Options</h3>
    <div class="col-lg-10"></div>
    <p>
        <a href="{{ route('quizzQuestionOptions.create') }}" class="btn btn-success">Add New</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"></th>
                        <th>question</th>
                        <th>option</th>
                        <th>correct</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($quizzQuestionOptions) > 0)
                        @foreach ($quizzQuestionOptions as $quizzQuestionOption)
                            <tr >
                                <td></td>
                                <td>{{ $quizzQuestionOption->question->question_text or '' }}</td>
                                <td>{{ $quizzQuestionOption->option }}</td>
                                <td>{{ $quizzQuestionOption->correct == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                
                                    <a href="{{ route('quizzQuestionOptions.show',[$quizzQuestionOption->id]) }}" class="btn  btn-success">view</a>
 
                                     @can('Edit QuizzQuestionOption')
                                        <a href="{{ route('quizzQuestionOptions.edit', [$quizzQuestionOption->id]) }}" class="btn btn-success" role="button">Edit</a>
                                    @endcan
                                    @can('Delete QuizzQuestionOption')
                                        {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['quizzQuestionOptions.destroy', $quizzQuestionOption->id] ]) !!} 
                                        {!! Form::submit('Delete', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}

                                     @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Entries In Table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection

