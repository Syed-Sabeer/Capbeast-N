/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Calendar init js
*/


var start_date = document.getElementById("event-start-date");

var date_range = null;
var T_check = null;
document.addEventListener("DOMContentLoaded", function () {
    flatPickrInit();
    var addEvent = new bootstrap.Modal(document.getElementById('event-modal'), {
        keyboard: false
    });
    document.getElementById('event-modal');
    var modalTitle = document.getElementById('modal-title');
    var formEvent = document.getElementById('form-event');
    var selectedEvent = null;
    var forms = document.getElementsByClassName('needs-validation');
    /* initialize the calendar */

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    
    var defaultEvents = [{
            id: 1,
            title: "Alfred Hurst",
            start: "2023-01-04",
            location: 'Atlanta, Georgia',
            allDay: true,
            className: "bg-info-subtle",
            status: "New",
            payment: "354.99",
        },
        {
            id: 2,
            title: "Tommy Carey",
            start: "2023-01-30",
            className: "bg-info-subtle",
            location: 'Virginia Beach, Virginia',
            allDay: true,
            status: "New",
            payment: "742.00",
        },
        {
            id: 3,
            title: "Cassius Brock",
            start: "2023-02-21",
            className: "bg-info-subtle",
            location: 'Sacramento, California',
            allDay: true,
            status: "New",
            payment: "150.99",
        },
        {
            id: 4,
            title: "Camilla Winters",
            start: "2023-03-08",
            className: "bg-info-subtle",
            location: 'Fresno, California',
            allDay: true,
            status: "New",
            payment: "96.26",
        },
        {
            id: 5,
            title: "Gabrielle Holden",
            start: "2023-02-22",
            className: "bg-info-subtle",
            location: 'El Paso, Texas',
            allDay: true,
            status: "New",
            payment: "229.00",
        },
        {
            id: 6,
            title: "Kristina Hooper",
            start: "2023-03-21",
            className: "bg-info-subtle",
            location: 'Seattle, Washington',
            allDay: true,
            status: "New",
            payment: "354.99",
        },
        {
            id: 7,
            title: "Jacques Leon",
            start: "2023-03-22",
            className: "bg-info-subtle",
            location: 'Fort Worth, Texas',
            allDay: true,
            status: "New",
            payment: "120.00",
        },
        {
            id: 8,
            title: "Theresa Crawford",
            start: "2023-04-07",
            className: "bg-info-subtle",
            location: 'Atlanta, Georgia',
            allDay: true,
            status: "New",
            payment: "81.99",
        },
        {
            id: 9,
            title: "Alina Holland",
            start: "2023-04-16",
            className: "bg-info-subtle",
            location: 'Portland, Oregon',
            allDay: true,
            status: "New",
            payment: "209.99",
        },
        {
            id: 10,
            title: "Edward Rogers",
            start: "2023-04-22",
            className: "bg-info-subtle",
            location: 'Denver, Colorado',
            allDay: true,
            status: "New",
            payment: "309.09",
        },
        {
            id: 153,
            title: 'Catherine Flores',
            start: new Date(y, m, 1),
            className: 'bg-success-subtle',
            location: 'Charlotte, North Carolina',
            allDay: true,
            status: "Delivered",
            extendedProps: {
                department: 'All Day Event'
            },
            description: 'An all-day event is an event that lasts an entire day or longer',
            payment: "126.99",
        },
        {
            id: 136,
            title: 'William Hendrix',
            start: new Date(y, m, d - 5),
            end: new Date(y, m, d - 2),
            allDay: true,
            status: "New",
            className: 'bg-info-subtle',
            location: 'San Francisco, California',
            extendedProps: {
                department: 'Long Event'
            },
            description: 'Long Term Event means an incident that last longer than 12 hours.',
            payment: "211.99",
        },
        {
            id: 999,
            title: 'Joan Trimble',
            start: new Date(y, m, d + 22, 20, 0),
            end: new Date(y, m, d + 24, 16, 0),
            allDay: true,
            status: "New",
            className: 'bg-info-subtle',
            location: 'Seattle, Washington',
            extendedProps: {
                department: 'Meeting with Alexis'
            },
            description: 'A meeting is a gathering of two or more people that has been convened for the purpose of achieving a common goal through verbal interaction, such as sharing information or reaching agreement.',
            payment: "260.04",
        },
        {
            id: 991,
            title: 'Emma Harper',
            start: new Date(y, m, d + 4, 16, 0),
            end: new Date(y, m, d + 9, 16, 0),
            allDay: true,
            status: "New",
            className: 'bg-info-subtle',
            location: 'Las Vegas, Nevada',
            extendedProps: {
                department: 'Repeating Event'
            },
            description: 'A recurring or repeating event is simply any event that you will occur more than once on your calendar. ',
            payment: "354.99",
        },
        {
            id: 112,
            title: 'Michael Burks',
            start: new Date(y, m, d, 12, 30),
            allDay: true,
            status: "Shipped",
            className: 'bg-warning-subtle',
            location: 'San Antonio, Texas',
            extendedProps: {
                department: 'Meeting'
            },
            description: 'Tell how to boost website traffic',
            payment: "94.69",
        },
        {
            id: 113,
            title: 'David McMillan',
            start: new Date(y, m, d + 9),
            end: new Date(y, m, d + 11),
            allDay: true,
            status: "New",
            className: 'bg-info-subtle',
            location: 'Phoenix, Arizona',
            extendedProps: {
                department: 'Lunch'
            },
            description: 'Strategies for Creating Your Weekly Schedule',
            payment: "350.99",
        },
        {
            id: 875,
            title: 'Marian Blevins',
            start: new Date(y, m, d + 1, 19, 0),
            allDay: true,
            status: "Cancelled",
            className: 'bg-danger-subtle',
            location: 'Los Angeles, California',
            extendedProps: {
                department: 'Birthday Party'
            },
            description: 'Family slumber party – Bring out the blankets and pillows and have a family slumber party! Play silly party games, share special snacks and wind down the fun with a special movie.',
            payment: "205.55",
        },                                                                                                                                                                                                                                                          
        {
            id: 783,
            title: 'Amy Krick',
            start: new Date(y, m, 28),
            end: new Date(y, m, 29),
            allDay: true,
            status: "Shipped",
            className: 'bg-warning-subtle',
            location: 'Chicago, Illinois',
            payment: "154.28",
        },
        {
            id: 456,
            title: 'Ryan Simmons',
            start: new Date(y, m, d + 23, 20, 0),
            end: new Date(y, m, d + 24, 16, 0),
            allDay: true,
            className: 'bg-info-subtle',
            location: 'Los Angeles, California',
            status: "New",
            extendedProps: {
                department: 'Discussion'
            },
            description: 'Tell how to boost website traffic',
            payment: "180.09",
        },
    ];

    var calendarEl = document.getElementById('calendar');

    function addNewEvent(info) {
        document.getElementById('form-event').reset();
        document.getElementById('btn-delete-event').setAttribute('hidden', true);
        addEvent.show();
        formEvent.classList.remove("was-validated");
        formEvent.reset();
        selectedEvent = null;
        modalTitle.innerText = 'Add Order';
        newEventData = info;
        document.getElementById("edit-event-btn").setAttribute("data-id", "new-event");
        document.getElementById('edit-event-btn').click();
        document.getElementById("edit-event-btn").setAttribute("hidden", true);
    }

    function getInitialView() {
        if (window.innerWidth >= 768 && window.innerWidth < 1200) {
            return 'timeGridWeek';
        } else if (window.innerWidth <= 768) {
            return 'listMonth';
        } else {
            return 'dayGridMonth';
        }
    }

    var eventCategoryChoice = new Choices("#event-category", {
        searchEnabled: false
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        editable: true,
        droppable: true,
        selectable: true,
        navLinks: true,
        initialView: getInitialView(),
        themeSystem: 'bootstrap',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        windowResize: function (view) {
            var newView = getInitialView();
            calendar.changeView(newView);
        },
        eventResize: function(info) {
            var indexOfSelectedEvent = defaultEvents.findIndex(function (x) {
                return x.id == info.event.id
            });
            if (defaultEvents[indexOfSelectedEvent]) {
                defaultEvents[indexOfSelectedEvent].title = info.event.title;
                defaultEvents[indexOfSelectedEvent].start = info.event.start;
                defaultEvents[indexOfSelectedEvent].end = (info.event.end) ? info.event.end : null;
                defaultEvents[indexOfSelectedEvent].allDay = info.event.allDay;
                defaultEvents[indexOfSelectedEvent].className = info.event.classNames[0];
                defaultEvents[indexOfSelectedEvent].description = (info.event._def.extendedProps.description) ? info.event._def.extendedProps.description : '';
                defaultEvents[indexOfSelectedEvent].location = (info.event._def.extendedProps.location) ? info.event._def.extendedProps.location : '';
            }
            upcomingEvent(defaultEvents);
        },
        eventClick: function (info) {
            document.getElementById("edit-event-btn").removeAttribute("hidden");
            document.getElementById('btn-save-event').setAttribute("hidden", true);
            document.getElementById("edit-event-btn").setAttribute("data-id", "edit-event");
            document.getElementById("edit-event-btn").innerHTML = "Edit";
            eventClicked();
            flatPickrInit();
            flatpicekrValueClear();
            addEvent.show();
            formEvent.reset();
            selectedEvent = info.event;

            // First Modal
            document.getElementById("modal-title").innerHTML = "";
            document.getElementById("event-location-tag").innerHTML = selectedEvent.extendedProps.location === undefined ? "" : selectedEvent.extendedProps.location;
            document.getElementById("event-payment-tag").innerHTML = selectedEvent.extendedProps.payment === undefined ? "No Location" : '$'+selectedEvent.extendedProps.payment;
            document.getElementById("event-description-tag").innerHTML = selectedEvent.extendedProps.description === undefined ? "No Description" : selectedEvent.extendedProps.description;

            // Edit Modal
            document.getElementById("event-title").value = selectedEvent.title;
            document.getElementById("event-location").value = selectedEvent.extendedProps.location === undefined ? "No Location" : selectedEvent.extendedProps.location;
            document.getElementById("event-payment").value = selectedEvent.extendedProps.payment === undefined ? "" : selectedEvent.extendedProps.payment;
            document.getElementById("event-description").value = selectedEvent.extendedProps.description === undefined ? "No Description" : selectedEvent.extendedProps.description;
            document.getElementById("eventid").value = selectedEvent.id;

            if (selectedEvent.classNames[0]) {
                eventCategoryChoice.destroy();
                eventCategoryChoice = new Choices("#event-category", {
                    searchEnabled: false
                });
                eventCategoryChoice.setChoiceByValue(selectedEvent.classNames[0]);
            }
            
            var st_date = selectedEvent.start;
            var ed_date = selectedEvent.end;

            var date_r = function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;
                return [year, month, day].join('-');
            };
            var updateDay = null
            if(ed_date != null){
                var endUpdateDay = new Date(ed_date);
                updateDay = endUpdateDay.setDate(endUpdateDay.getDate() - 1);
            }
            
            var r_date = ed_date == null ? (str_dt(st_date)) : (str_dt(st_date)) + ' to ' + (str_dt(updateDay));
            var er_date = ed_date == null ? (date_r(st_date)) : (date_r(st_date)) + ' to ' + (date_r(updateDay));

            flatpickr(start_date, {
                defaultDate: er_date,
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                mode: ed_date !== null ? "range" : "range",
                onChange: function (selectedDates, dateStr, instance) {
                    var date_range = dateStr;
                    var dates = date_range.split("to");
                    
                },
            });
            document.getElementById("event-start-date-tag").innerHTML = r_date;

            newEventData = null;
            modalTitle.innerText = selectedEvent.title;

            // formEvent.classList.add("view-event");
            document.getElementById('btn-delete-event').removeAttribute('hidden');
        },
        dateClick: function (info) {
            addNewEvent(info);
        },
        events: defaultEvents,
        eventContent: function(arg) {
            if(arg.event._def.extendedProps.status == 'New'){
                arg.event._def.ui.classNames = ['bg-info-subtle']
            }
            return {
              html: '<div class="fc-event-title fc-sticky">#TBT8'+arg.event.id+ " - " + arg.event.title+'</div>'
            }
        },
        eventReceive: function (info) {
            var newid = parseInt(info.event.id);
            var newEvent = {
                id: newid,
                title: info.event.title,
                start: info.event.start,
                allDay: info.event.allDay,
                className: info.event.classNames[0]
            };
            defaultEvents.push(newEvent);
            upcomingEvent(defaultEvents);
        },
        eventDrop: function (info) {
            var indexOfSelectedEvent = defaultEvents.findIndex(function (x) {
                return x.id == info.event.id
            });

            if (defaultEvents[indexOfSelectedEvent]) {
                defaultEvents[indexOfSelectedEvent].title = info.event.title;
                defaultEvents[indexOfSelectedEvent].start = info.event.start;
                defaultEvents[indexOfSelectedEvent].end = (info.event.end) ? info.event.end : null;
                defaultEvents[indexOfSelectedEvent].allDay = info.event.allDay;
                defaultEvents[indexOfSelectedEvent].className = info.event.classNames[0];
                defaultEvents[indexOfSelectedEvent].description = (info.event._def.extendedProps.description) ? info.event._def.extendedProps.description : '';
                defaultEvents[indexOfSelectedEvent].location = (info.event._def.extendedProps.location) ? info.event._def.extendedProps.location : '';
            }
            upcomingEvent(defaultEvents);
        }
    });

    calendar.render();

    upcomingEvent(defaultEvents);
    /*Add new event*/
    // Form to add new event
    formEvent.addEventListener('submit', function (ev) {
        ev.preventDefault();
        var updatedTitle = document.getElementById("event-title").value;
        var updatedCategory = document.getElementById('event-category').value;
        var start_date = (document.getElementById("event-start-date").value).split("to");
        var updateStartDate = new Date(start_date[0].trim());

        var newdate = new Date(start_date[1]);
        newdate.setDate(newdate.getDate() + 1);

        var end_date = null;
        var event_location = document.getElementById("event-location").value;
        var event_payment = document.getElementById("event-payment").value;
        var eventDescription = document.getElementById("event-description").value;
        var eventid = document.getElementById("eventid").value;
        var all_day = false;
        if (start_date.length > 1) {
            var end_date = new Date(start_date[1]);
            end_date.setDate(end_date.getDate() + 1);
            start_date = new Date(start_date[0]);
            all_day = true;
        } else {
            var e_date = start_date;
            start_date = new Date(start_date);
            end_date = new Date(e_date);
        }
        var e_id = defaultEvents.length + 1;
        var updateEndDate = (start_date[1]) ? newdate : new Date(start_date);

        // validation
        if (forms[0].checkValidity() === false) {
            forms[0].classList.add('was-validated');
        } else {
            if (selectedEvent) {
                selectedEvent.setProp("id", eventid);
                selectedEvent.setProp("title", updatedTitle);
                selectedEvent.setProp("classNames", [updatedCategory]);
                selectedEvent.setStart(updateStartDate);
                selectedEvent.setEnd(updateEndDate);
                selectedEvent.setAllDay(all_day);
                selectedEvent.setExtendedProp("description", eventDescription);
                selectedEvent.setExtendedProp("location", event_location);
                selectedEvent.setExtendedProp("payment", event_payment);
                var indexOfSelectedEvent = defaultEvents.findIndex(function (x) {
                    return x.id == selectedEvent.id
                });
                if (defaultEvents[indexOfSelectedEvent]) {
                    defaultEvents[indexOfSelectedEvent].title = updatedTitle;
                    defaultEvents[indexOfSelectedEvent].start = updateStartDate;
                    defaultEvents[indexOfSelectedEvent].end = updateEndDate;
                    defaultEvents[indexOfSelectedEvent].allDay = all_day;
                    defaultEvents[indexOfSelectedEvent].className = updatedCategory;
                    defaultEvents[indexOfSelectedEvent].description = eventDescription;
                    defaultEvents[indexOfSelectedEvent].location = event_location;
                    defaultEvents[indexOfSelectedEvent].payment = event_payment;
                }
                calendar.render();
                // default
            } else {
                var newEvent = {
                    id: e_id,
                    title: updatedTitle,
                    start: start_date,
                    end: end_date,
                    allDay: all_day,
                    className: updatedCategory,
                    description: eventDescription,
                    location: event_location,
                    payment: event_payment
                };
                calendar.addEvent(newEvent);
                defaultEvents.push(newEvent);
            }
            addEvent.hide();
            
            upcomingEvent(defaultEvents);
        }
    });

    document.getElementById("btn-delete-event").addEventListener("click", function (e) {
        if (selectedEvent) {
            for (var i = 0; i < defaultEvents.length; i++) {
                if (defaultEvents[i].id == selectedEvent.id) {
                    defaultEvents.splice(i, 1);
                    i--;
                }
            }
            upcomingEvent(defaultEvents);
            selectedEvent.remove();
            selectedEvent = null;
            addEvent.hide();
        }
    });

    document.getElementById("btn-new-event").addEventListener("click", function (e) {
        flatpicekrValueClear();
        flatPickrInit();
        addNewEvent();
        document.getElementById("edit-event-btn").setAttribute("data-id", "new-event");
        document.getElementById('edit-event-btn').click();
        document.getElementById("edit-event-btn").setAttribute("hidden", true);
    });

    // Search product list
    var searchResultList = document.getElementById("searchResultsList");
    searchResultList.addEventListener("keyup", function () {
        var inputVal = searchResultList.value.toLowerCase();
        function filterItems(arr, query) {
            return arr.filter(function (el) {
                return el.title.toLowerCase().indexOf(query.toLowerCase()) !== -1
            })
        }

        var filterData = filterItems(defaultEvents, inputVal);
        upcomingEvent(filterData);
    });
});


function flatPickrInit() {
    var config = {
        enableTime: true,
        noCalendar: true,
    };
    var date_range = flatpickr(
        start_date, {
            enableTime: false,
            mode: "range",
            minDate: "today",
            onChange: function (selectedDates, dateStr, instance) {
                var date_range = dateStr;
                var dates = date_range.split("to");
                
            },
        });
}

function flatpicekrValueClear() {
    start_date.flatpickr().clear();
}


function eventClicked() {
    document.getElementById('form-event').classList.add("view-event");
    document.getElementById("event-title").classList.replace("d-block", "d-none");
    document.getElementById("event-category").classList.replace("d-block", "d-none");
    document.getElementById("event-start-date").parentNode.classList.add("d-none");
    document.getElementById("event-start-date").classList.replace("d-block", "d-none");
    
    document.getElementById("event-location").classList.replace("d-block", "d-none");
    document.getElementById("event-payment").classList.replace("d-block", "d-none");
    document.getElementById("event-description").classList.replace("d-block", "d-none");
    document.getElementById("event-start-date-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-payment-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-location-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-description-tag").classList.replace("d-none", "d-block");
    document.getElementById('btn-save-event').setAttribute("hidden", true);
}

function editEvent(data) {
    var data_id = data.getAttribute("data-id");
    if (data_id == 'new-event') {
        document.getElementById('modal-title').innerHTML = "";
        document.getElementById('modal-title').innerHTML = "Add Order";
        document.getElementById("btn-save-event").innerHTML = "Add Order";
        eventTyped();
    } else if (data_id == 'edit-event') {
        data.innerHTML = "Cancel";
        data.setAttribute("data-id", 'cancel-event');
        document.getElementById("btn-save-event").innerHTML = "Update Order";
        data.removeAttribute("hidden");
        eventTyped();
    } else {
        data.innerHTML = "Edit";
        data.setAttribute("data-id", 'edit-event');
        eventClicked();
    }
}

function eventTyped() {
    document.getElementById('form-event').classList.remove("view-event");
    document.getElementById("event-title").classList.replace("d-none", "d-block");
    document.getElementById("event-category").classList.replace("d-none", "d-block");
    document.getElementById("event-start-date").parentNode.classList.remove("d-none");
    document.getElementById("event-start-date").classList.replace("d-none", "d-block");
    document.getElementById("event-location").classList.replace("d-none", "d-block");
    document.getElementById("event-payment").classList.replace("d-none", "d-block");
    document.getElementById("event-description").classList.replace("d-none", "d-block");
    document.getElementById("event-start-date-tag").classList.replace("d-block", "d-none")
    document.getElementById("event-payment-tag").classList.replace("d-block", "d-none");;
    document.getElementById("event-location-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-description-tag").classList.replace("d-block", "d-none");
    document.getElementById('btn-save-event').removeAttribute("hidden");
}

// upcoming Event
function upcomingEvent(a) {
    a.sort(function (o1, o2) {
        return (new Date(o1.start)) - (new Date(o2.start));
    });
    document.getElementById("upcoming-event-list").innerHTML = null;
    Array.from(a).forEach(function (element) {
        var title = element.title;
        if (element.end) {
            endUpdatedDay = new Date(element.end);
            var updatedDay = endUpdatedDay.setDate(endUpdatedDay.getDate() - 1);
          }
        var e_dt = updatedDay ? updatedDay : undefined;
        if (e_dt == "Invalid Date" || e_dt == undefined) {
            e_dt = null;
        } else {
            const newDate = new Date(e_dt).toLocaleDateString('en', { year: 'numeric', month: 'numeric', day: 'numeric' });
            e_dt = new Date(newDate)
              .toLocaleDateString("en-GB", {
                day: "numeric",
                month: "short",
                year: "numeric",
              })
              .split(" ")
              .join(" ");
        }
        var st_date = element.start ? str_dt(element.start) : null;
        var ed_date = updatedDay ? str_dt(updatedDay) : null;
        if (st_date === ed_date) {
            e_dt = null;
        }
        var startDate = element.start;
        if (startDate === "Invalid Date" || startDate === undefined) {
            startDate = null;
        } else {
            const newDate = new Date(startDate).toLocaleDateString('en', { year: 'numeric', month: 'numeric', day: 'numeric' });
            startDate = new Date(newDate)
              .toLocaleDateString("en-GB", {
                day: "numeric",
                month: "short",
                year: "numeric",
              })
              .split(" ")
              .join(" ");
        }

        var end_dt = (e_dt) ? e_dt : startDate;
        var description = (element.description) ? element.description : "";
        var e_time_s = tConvert(getTime(element.start));
        var e_time_e = tConvert(getTime(updatedDay));
        if (e_time_s == e_time_e) {
            var e_time_s = "Full day event";
            var e_time_e = null;
        }
        var e_time_e = (e_time_e) ? " to " + e_time_e : "";

            

        u_event = '<div class="card">\
        <div class="card-body">\
            <div class="d-flex align-items-center mb-4">\
                <p class="mb-0 flex-grow-1">OrderID: <span class="fw-medium">#TBT8'+element.id+'</span></p>\
                <div class="flex-shrink-0">\
                    '+isStatus(element.status)+'\
                </div>\
            </div>\
            <h5 class="fs-16">'+ title +'</h5>\
            <div class="d-flex justify-content-between align-items-center mb-0">\
                <p class="mb-0"><i class="bi bi-calendar2-check me-1 text-muted align-middle"></i>'+startDate+'</p>\
                <p class="mb-0"><i class="bi bi-box-seam me-1 text-muted align-middle"></i>'+end_dt+'</p>\
            </div>\
        </div>\
    </div>';
        document.getElementById("upcoming-event-list").innerHTML += u_event;
    });
};

function getTime(params) {
    params = new Date(params);
    if (params.getHours() != null) {
        var hour = params.getHours();
        var minute = (params.getMinutes()) ? params.getMinutes() : 00;
        return hour + ":" + minute;
    }
}

function isStatus(val) {
    switch (val) {
        case "Delivered":
            return ('<span class="badge bg-success-subtle text-success">' + val + "</span>");
        case "Shipped":
            return ('<span class="badge bg-warning-subtle text-warning">' + val + "</span>");
        case "Cancelled":
            return ('<span class="badge bg-danger-subtle text-danger">' + val + "</span>");
        case "New":
            return ('<span class="badge bg-info-subtle text-info">' + val + "</span>");
        default:
            return ('<span class="badge bg-info-subtle text-info">' + val + "</span>");
    }
}

function tConvert(time) {
    var t = time.split(":");
    var hours = t[0];
    var minutes = t[1];
    var newformat = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return (hours + ':' + minutes + ' ' + newformat);
}

var str_dt = function formatDate(date) {
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var d = new Date(date),
        month = '' + monthNames[(d.getMonth())],
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    return [day + " " + month, year].join(',');
};