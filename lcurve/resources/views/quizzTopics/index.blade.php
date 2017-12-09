@extends('layouts.app')

@section('dash-left')
	<h3 class="page-title">Quizz Topics</h3>

    <p>
        <a href="{{ route('quizzTopics.create') }}" class="btn btn-success">Add New</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            list
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($topics) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>title</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($topics) > 0)
                        @foreach ($topics as $topic)
                            <tr data-entry-id="{{ $topic->id }}">
                                 <td class="select-checkbox"><input type="checkbox" name="id" value="checked" /></td>
                                <td>{{ $topic->name }}</td>
                                <td>
                                    <a href="{{ route('quizzTopics.show',[$topic->id]) }}" class="btn btn-xs btn-primary">view</a>
                                     @can('Edit QuizzTopic')
                                        <a href="{{ route('quizzTopics.edit',[$topic->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    @endcan

                                    @can('Delete QuizzTopic')
                                        {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['quizzTopics.destroy', $topic->id] ]) !!} 
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}

                                     @endcan
                                   
                                    
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No Entries In Table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection