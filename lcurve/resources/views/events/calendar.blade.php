@extends('layouts.app')

@push('styles')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.css"/>
<style>
.fc-center > h2{
  font-size: 20px !important;
}
</style>
@endpush

@section('dash-right')

    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Event Calendar</div>
                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
    </div>

@endsection

@push('scripts')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endpush
