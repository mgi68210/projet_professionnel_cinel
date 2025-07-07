@extends('layouts.app')

@section('content')
    <h1>Planning des Cours</h1>
    <p style="text-align:center;">Cliquez sur un cours pour réserver.</p>

    <!-- Le calendrier s'affiche ici -->
    <div id="calendar" style="max-width: 900px; margin: 2rem auto;"></div>
@endsection

@section('styles')
    <!-- Le CSS du calendrier -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <!-- Le JS du calendrier -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr', // langue française
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: [
                    @foreach ($cours as $c)
                        {
                            title: '{{ $c->titre }}',
                            start: '{{ \Carbon\Carbon::parse($c->date_heure)->format("Y-m-d\TH:i:s") }}',
                            url: '{{ route("cours.confirmer", $c->id_cours) }}'
                        },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>
@endsection
