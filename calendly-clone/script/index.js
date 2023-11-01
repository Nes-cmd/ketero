var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var slicedAvailabilities = JSON.parse(document.getElementById('slicedTimes').innerText);
// console.log(slicedAvailabilities)
// var event = JSON.parse(sessionStorage.getItem("eventObj"));
var event = JSON.parse(document.getElementById('theEvent').innerText)
console.log(event)


// Calendar
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',
        showNonCurrentDates: false,
        selectable: true,
        select: function (info) {
            // var currentDay = new Date();
            var daySelected = info.start;

            // Create the Date object
            const startingDate = new Date(document.getElementById('startDate').innerText);

            let shortDay = getThreeLetterDay(daySelected).toLowerCase()

            var timesAvailable = slicedAvailabilities[shortDay]
            // console.log(timesAvailable)
            if (daySelected >= startingDate) {

                var timeDiv = document.getElementById("available-times-div");

                while (timeDiv.firstChild) {
                    timeDiv.removeChild(timeDiv.lastChild);
                }

                //Heading - Date Selected
                var h4 = document.createElement("h4");
                var h4node = document.createTextNode(
                    days[daySelected.getDay()] + ", " +
                    months[daySelected.getMonth()] + " " +
                    daySelected.getDate());
                h4.appendChild(h4node);

                timeDiv.appendChild(h4);

                //Time Buttons
                for (var i = 0; i < timesAvailable.length; i++) {
                    var timeSlot = document.createElement("div");
                    timeSlot.classList.add("time-slot");

                    var timeBtn = document.createElement("button");

                    var btnNode = document.createTextNode(timesAvailable[i]);
                    timeBtn.classList.add("time-btn");

                    timeBtn.appendChild(btnNode);
                    timeSlot.appendChild(timeBtn);

                    timeDiv.appendChild(timeSlot);

                    // When time is selected
                    var last = null;
                    timeBtn.addEventListener("click", function () {
                        if (last != null) {
                            console.log(last);
                            last.parentNode.removeChild(last.parentNode.lastChild);
                        }
                        var confirmBtn = document.createElement("button");
                        var confirmTxt = document.createTextNode("Confirm");
                        confirmBtn.classList.add("confirm-btn");
                        confirmBtn.appendChild(confirmTxt);
                        this.parentNode.appendChild(confirmBtn);
                        event.time = this.textContent;
                        confirmBtn.addEventListener("click", function () {
                            event.date =
                                days[daySelected.getDay()] + ", " +
                                months[daySelected.getMonth()] + " " +
                                daySelected.getDate();
                            sessionStorage.setItem("    ", JSON.stringify(event));
                            console.log(event);
                            window.location.href = `/book-register?selectedDate=${event.date}&selectedSlot=${event.time}&eventId=${event.id}`;
                        });
                        last = this;

                    });
                }

                var containerDiv = document.getElementsByClassName("container")[0];
                containerDiv.classList.add("time-div-active");

                document.getElementById("calendar-section").style.flex = "2";

                timeDiv.style.display = "initial";

            } else { alert("Sorry that date has already passed or occupied. Please select another date."); }
        },
    });
    calendar.render();
});

function getThreeLetterDay(date) {
    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const dayIndex = date.getDay();
    return daysOfWeek[dayIndex];
}

