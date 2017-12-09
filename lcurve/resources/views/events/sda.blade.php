@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css"/>
<style>
.fc-center > h2{
  font-size: 10px !important;
}

.fc-basic-view .fc-body .fc-row { min-height: 2.5em; }
.fc-event{
    width: 30px !important;
}

.fc-event-container{
  visibility: hidden;
}

.fc-today{
  background-color: #b0ead2 !important;
}
.fc-unthemed td.fc-today { background: green; }

.fc-widget-content {  /* <td>, usually */
  border: 1px solid #e5e5e5;
  background-color: green;
  }

</style>


@endpush

@section('dash-right')

    <div class="row" id="calendar">
  {!! $calendar->calendar() !!}
    </div>


@endsection

@push('scripts')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js">
  </script>
  {!! $calendar->script() !!}



@endpush
