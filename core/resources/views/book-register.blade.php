<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Calendly</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('calendly-clone/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('calendly-clone/css/register.css')}}">

</head>

<body>

    <div class="container">
        <section class="description-section">
            <button class="back-btn" onclick="goBack()"><img class="arrow-icon" src="{{ asset('calendly-clone/icons/arrow (1).svg')}}" alt="back-arrow"></button>
            <hgroup>
                <h4 id="scheduler">ACME Sales</h4>
                <h2 id="event">{{ $event->name }}</h2>
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
        <div class="divider"></div>
        <section id="register-section" class="body-section">
            <form method="post" action="{{ route('book')}}">
                @csrf 
                <input type="hidden" name="eventtype_id" value="{{$event->id}}">
                <input type="hidden" name="selectedSlot" value="{{$selectedSlot}}">
                <input type="hidden" name="selectedDate" value="{{$selectedDate}}">
                <h3>Enter Details</h3>
                <label for="name">Name</label>

                <input type="text" name="name" id="name" required>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <button id="submit-btn" type="submit">Schedule Event</button>
            </form>
        </section>

    </div>

    <script src="{{ asset('calendly-clone/script/register.js')}}"></script>

</body>

</html>