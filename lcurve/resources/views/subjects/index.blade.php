<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">

            <h3>Subjects</h3>
            </div>

            <div class="panel-heading" style="background-color: #d9dbaa; border-color: #d9dbaa !important">Page {{ $subject->currentPage() }} of {{ $classSubjects->lastPage() }}
            </div>

            @foreach ($subjects as $subject)
                <div class="panel-body panel-heading">
                <div class="col-lg-1"></div>
                        <a href="{{ route('subjects.show', $subject->id ) }}" style="font-family:sans-serif;"><b>
                          {{  $subject->name }}
                        </b><br>
                        </a>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {!! $subject->links() !!}
        </div>
    </div>
</div>

@can('Create ClassSubject')
<div class="col-lg-8"></div>
    <a href="{{ route('classSubjects.create') }}" class="btn btn-info" role="button" style="background-color: #0b9b7e;border-color: #0b9b7e;">Add Subject For a Class</a>
@endcan
