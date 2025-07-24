@extends('layouts.app')

@section('content')
    <h1>Planning des Cours</h1>
    <p style="text-align:center;">Cliquez sur un cours pour réserver.</p>

    <div id="calendar" style="max-width: 900px; margin: 2rem auto;"></div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script>
        const cours = @json($cours->toArray());

        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: cours.map(c => ({
                    title: c.titre,
                    start: c.date_heure,
                    url: `{{ url('/cours') }}/${c.id_cours}/confirmer`
                })),
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // empêche ouverture dans une nouvelle fenêtre
                    if (info.event.url) {
                        window.location.href = info.event.url;
                    }
                }
            });

            calendar.render();
        });
    </script>
@endsection
