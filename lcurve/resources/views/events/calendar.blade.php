@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link rel="stylesheet" href="/css/bootstrap-fullcalendar.css">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endpush
