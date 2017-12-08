<li id="topic_{{$topic->id}}">
  <div class="panel panel-default">
    {{ Form::model($topic, array('route' => array('topics.update', $topic->id), 'method' => 'PUT')) }}
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse{{$topic->id}}">
          {{ Form::text('name',$topic->name, array('class' => 'form-control','placeholder'=>"Topic Name")) }}
        </a>
      </h4>
    </div>
    <div id="collapse{{$topic->id}}" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="form-group">
          {{ Form::label('content', 'Content') }}
          {{ Form::textarea('content', null, array('class' => 'form-control','id'=>'tiny_'.$topic->id)) }}
        </div>

      </div>
      <div class="panel-footer">
        {{ Form::submit('Save', array('class' => 'btn btn-primary','style'=>'background-color: #0b9b7e')) }}


      </div>
    </div>
    {{ Form::close() }}
  </div>
  <ol>
  @foreach ($classSubject->subtopics($topic->id) as $subtopic)
      @include('topics/plug_index',['topic' => $subtopic])
  @endforeach
  </ol>
</li>

@push('tinycode')
      tinymce.triggerSave();
      tinymce.remove('#tiny_{{$topic->id}}');
      tinymce.init({
          selector:'#tiny_{{$topic->id}}',
          height:350,
          theme:'modern',
          plugins:[
              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
              'insertdatetime media nonbreaking save table contextmenu directionality',
              'emoticons template paste textcolor colorpicker textpattern imagetools',
          ],
          toolbar1:'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent | link imag',
          toolbar2: 'print preview media | forecolor backcolor emoticons mybutton',
          imag_advtab: true,
          setup: function (editor) {
            editor.addButton('mybutton', {
              text: 'My button',
              icon: false,
              onclick: function () {
                editor.insertContent('&nbsp;<b>It\'s my button!</b>&nbsp;');
              }
            });
          }
      });
@endpush
