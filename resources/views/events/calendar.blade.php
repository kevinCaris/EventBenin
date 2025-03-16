<x-dashboard-layout>

    <div class="container bg-white p-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-xl font-bold mb-4">Calendrier des réservations</h3>
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet">

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/fr.js"></script>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                locale: 'fr',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'Aujourd\'hui',
                    month: 'Mois',
                    week: 'Semaine',
                    day: 'Jour'
                },
                defaultView: 'month',
                editable: false,
                events: @json($events).map(event => ({
                    title: `${event.title} - ${event.hall_name}`, // Afficher Type + Nom de la salle
                    start: event.start,
                    end: event.end,
                    description: event.description ?? 'Aucune description',
                    backgroundColor: '#3b82f6', // Bleu Tailwind
                    borderColor: '#2563eb', // Bleu plus foncé
                    textColor: '#ffffff'
                })),
                eventRender: function(event, element) {
                    element.attr('title', `${event.title} \n ${event.user_name} \n ${event.start} \n ${event.end}`);
                }
            });
        });
    </script>
</x-dashboard-layout>
