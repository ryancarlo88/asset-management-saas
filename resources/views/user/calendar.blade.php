<div id='calendar'></div>

@section('calendar')
<script>
    $(document).ready(function () {

        var SITEURL = "{{ url('/') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            editable: true,
            events: SITEURL + "/fullcalender",
            displayEventTime: false,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,

            eventClick: function (calEvent, jsEvent, view) {
              window.location = calEvent.url;
            }
        });
    });

    // document.addEventListener('DOMContentLoaded', function() {
    //   var calendarEl = document.getElementById('calendar');
    //   var calendar = new FullCalendar.Calendar(calendarEl, {
    //     initialView: 'dayGridMonth'
    //   });
    //   calendar.render();
    // });
</script>

@endsection