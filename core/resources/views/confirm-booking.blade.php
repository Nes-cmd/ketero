<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Calendly</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('calendly-clone/css/styles.css')}}">
        <link rel="stylesheet" href="{{ asset('calendly-clone/css/confirm.css')}}">

    </head>

    <body>

        <div class="container">
            <section class="body-section">
                <h3>Confirmed!</h3>
                <p id="scheduler">You are scheduled with ACME Sales.</p>
            </section>
            <section class="description-section">
                <hgroup>
                    <h3 id="event">{{ $event->name }}</h3>
                    <div class="icon-text-div">
                        <img src="{{ asset('calendly-clone/icons/clock.svg')}}" alt="clock-icon">
                        <h4 id="duration">{{ $event->duration }}</h4>
                    </div><br>
                    <div class="icon-text-div">
                        <img src="{{ asset('calendly-clone/icons/calendar (1).svg')}}" alt="calendar-icon">
                        <h4 id="event-time-stamp">{{$selectedSlot}}, {{$selectedDate}}</h4>
                    </div>
                </hgroup>
            </section>
        </div>

    </body>
</html>