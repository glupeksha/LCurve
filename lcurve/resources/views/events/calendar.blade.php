@extends('calendarlayouts.app')

@section('dash-left')


  {!! $fullcalendar->calendar() !!}



@endsection

@push('scripts')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js">
  </script>
  <script src='fullcalendar/lang/es.js'></script>
  <script src='fullcalendar/lang/si.js'></script>
  <script src='fullcalendar/lang/ta.js'></script>
  {!! $fullcalendar->script() !!}



@endpush
