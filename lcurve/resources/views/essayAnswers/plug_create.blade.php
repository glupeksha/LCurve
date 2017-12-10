{{ Form::open(array('action'=>array('EssayAnswerController@store',$essay))) }}
<div class="form-group">    
    {{ Form::textarea('content', null, array('class' => 'form-control', 'placeholder'=>'Your essay here..','id'=>'myTextarea')) }}
    <br>
    {{ Form::submit('Add Essay', array('class' => 'btn btn-success btn-lg btn-block')) }}
   

</div>
{{ Form::close() }}

@push('styles')
    <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector:'#myTextarea',
            height:150,
            theme:'modern',
            plugins:[
                'advlist autolink lists link image charmap hr anchor pagebreak',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools',
            ],
            toolbar1:'insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent | link imag',
            toolbar2: 'forecolor backcolor emoticons',
            imag_advtab: true
        });
    </script>
@endpush
