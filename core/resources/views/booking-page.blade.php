<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Calendly</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        
        <!-- Calendar -->
        <link href="{{ asset('calendly-clone/fullcalendar/main.css')}}" rel='stylesheet' />
        <script src="{{ asset('calendly-clone/fullcalendar/main.js')}}"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('calendly-clone/css/styles.css')}}">
        <link rel="stylesheet" href="{{ asset('calendly-clone/css/schedule.css')}}">


    </head>

    <body>

        <div class="container">
            <section class="description-section">
                <hgroup>
                    <h4 id="scheduler">ACME Sales</h4> 
                    <h2 id="event">Pricing Review</h2>
                    <div class="icon-text-div">
                        <img src="{{ asset('calendly-clone/icons/clock.svg')}}" alt="clock-icon">
                        <h4 id="duration">15 min</h4>
                    </div>
                </hgroup>
                <p id=description>Our team will meet with you to review pricing options.</p>
            </section>
            <div class="divider"></div>
            <section id="calendar-section" class="body-section">
                <h3>Select a Date & Time</h3>
                <div id="schedule-div">
                    <div id="available-times-div"><!-- Available times --></div>
                    <div id="calendar"></div>
                </div>
            </section>
        

        </div>
        
        <script src="{{ asset('calendly-clone/script/event.js')}}"></script>
        <script src="{{ asset('calendly-clone/script/index.js')}}"></script>

    </body>
</html>