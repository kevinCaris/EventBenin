<x-dashboard-layout>
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                ddddddddddddddddddd
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    @foreach($reservations as $reservation)
                    {
                        id: "{{ $reservation->id }}",
                        title: "{{ $reservation->title }}",  <!-- Assure-toi que ton modèle Event a bien le champ title -->
                        start: "{{ $reservation->start_date }}",  <!-- La date de début -->
                        end: "{{ $reservation->end_date }}",  <!-- La date de fin -->
                        backgroundColor: "#28a745",  <!-- Tu peux personnaliser la couleur si nécessaire -->
                        borderColor: "#28a745"
                    },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>
</x-dashboard-layout>
