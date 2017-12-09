@extends('layouts.app')
@section('dash-left')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create New Forum</h3>
         <hr class="hr_style">

        {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'forums.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('content', 'Forum content') }}
            {!! Form::textarea('content', null, array('class' => 'form-control','id'=>'myTextarea')) !!}
            <br>

            {{ Form::submit('Create Forum', array('class' => 'btn btn-success btn-lg btn-block')) }}

        </div>
        {{ Form::close() }}
        </div>
    </div>

@endsection
@push('styles')
    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector:'#myTextarea',
            height:350,
            theme:'modern',
            plugins:[
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools',
            ],
            toolbar1:'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent | link imag',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            imag_advtab: true
        });
    </script>
@endpush