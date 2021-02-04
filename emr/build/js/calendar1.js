var eventArr = [];
var description = document.getElementById('descr2');

function get_locations() {
    var locations = [
        "MOR", "COX", "Receiving", "840C", "INF", 
        "Vaccine Clinic", "BRK", "CAC", "J-Wing", 
        "D1 –Out", "PAE", "OHS DC" //Paediatric Stream
    ]

    sortedLocations = locations.sort()

    for (var location = 0; location < sortedLocations.length; location++) {
        var options = '<option value = ' + sortedLocations[location] + '>' + sortedLocations[location] + '</option>'
        var allOptions = allOptions + options
    }

    return allOptions;
}

/* CALENDAR */
function get_data() {
    $(document).ready(function() {
        $.ajax({
            url: 'http://certus.local/main/index',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                jQuery.each(data, function(index, value) {
                    jQuery.each(value, function(index, eventArray) {
                        var fullName = eventArray.first_name + " " + eventArray.last_name
                        var color = ""
                        if (eventArray.location === 'MOR') {
                            color = '#2E8B57'
                        } else if (eventArray.location === 'COX') {
                            color = '#1E90FF'
                        } else if (eventArray.location === 'SCNR') {
                            color = '#9370DB'
                        } else if (eventArray.location === 'CAC') {
                            color = '#DA70D6'
                        } else if (eventArray.location === 'OHS DC') {
                            color = '#20B2AA'
                        }

                        eventArr.push({
                            title: fullName,
                            start: eventArray.start,
                            end: eventArray.end,
                            location: eventArray.location,
                            scheduleid: eventArray.id,
                            color: color
                        })
                    })
                });

	            init_calendar(eventArr)
            },
            error: function(data) {
                console.log('error');
            }
        });
    });
}

function set_schedule_data(startTime, endTime, locationName, scheduleid) {
    $(document).ready(function() {
        var scheduleData = {
            id: scheduleid,
            start: startTime,
            end: endTime,
            location: locationName
        }

        $.ajax({
            url: 'http://certus.local/screeners/editSchedule/',
            type: 'POST',
            dataType: 'json',
            data: scheduleData,
            success: function(data) {
              new PNotify({
                title: 'Success',
                text: 'Event updated!',
                type: 'success',
                styling: 'bootstrap3',
                delay: 2000
              });
            },
            error: function(data) {
                console.log('error');
            }
        });
    });

}

function init_calendar(eventArr) {
    if (typeof($.fn.fullCalendar) === 'undefined') {
        return;
    }
    var cookiePreference = findCookie("preference")
    console.log('init_calendar');

    $('#external-events .fc-event').each(function() {
        $(this).data('event', {
            title: $.trim($(this).text()),
            stick: true
        });
        
        $(this).draggable({
            zIndex: 999,
            revert: true,
            revertDuration: 0
        });
    });

    var date = new Date(),
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),
        started,
        categoryClass;

    var calendar = $('#calendar').fullCalendar({
        defaultView: cookiePreference,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        droppable: true,
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            $('#fc_create').click();

            started = start;
            ended = end;

            $(".antosubmit").on("click", function() {
                var title = $("#title").val();
                if (end) {
                    ended = end;
                }

                categoryClass = $("#event_type").val();

                if (title) {
                    calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: started,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }

                $('#title').val('');

                //Add table data here


                calendar.fullCalendar('unselect');

                $('.antoclose').click();

                return false;
            });

        },
        eventClick: function(calEvent, jsEvent, view) {
            dateTimeStart = new Date(calEvent.start);
            yearStart = dateTimeStart.getFullYear().toString().padStart(4, '0');
            monthStart = (dateTimeStart.getMonth()+1).toString().padStart(2, '0');
            dayStart = dateTimeStart.getDate().toString().padStart(2, '0');
            hoursStart = (dateTimeStart.getHours()+5).toString().padStart(2, '0');
            minutesStart = dateTimeStart.getMinutes().toString().padStart(2, '0')

            startDateTime = (yearStart + '-' + monthStart + '-' + dayStart + 'T' + hoursStart + ':' + minutesStart)

            dateTimeEnd = new Date(calEvent.end);
            yearEnd = dateTimeEnd.getFullYear().toString().padStart(4, '0');
            monthEnd = (dateTimeEnd.getMonth()+1).toString().padStart(2, '0');
            dayEnd = dateTimeEnd.getDate().toString().padStart(2, '0');
            hoursEnd = (dateTimeEnd.getHours()+5).toString().padStart(2, '0');
            minutesEnd = dateTimeEnd.getMinutes().toString().padStart(2, '0')

            endDateTime = (yearEnd + '-' + monthEnd + '-' + dayEnd + 'T' + hoursEnd + ':' + minutesEnd) 

            $('#fc_edit').click();
            $('#title2').val(calEvent.title);
            $('#start').val(startDateTime);
            $('#end').val(endDateTime);
            $('#id').val(calEvent.scheduleid);

            var node = document.getElementById('location');
            node.innerHTML = '<option value = ' + calEvent.location + '>' + calEvent.location + '</option>' + get_locations();

            categoryClass = $("#event_type").val();

            $(".antosubmit2").on("click", function() {
                calEvent.location = $('#location').val();
                calEvent.startDateTime = $('#start').val();
                calEvent.endDateTime = $('#end').val();

                calendar.fullCalendar('updateEvent', calEvent);
                $('.antoclose2').click();
            });

            //  var descr = $('#descr2').val();

            calendar.fullCalendar('unselect');

        },
        editable: true,
        eventDrop: function(event, delta, revertFunc) {
            set_schedule_data(event.start.format(), event.end.format(), event.location, event.scheduleid)
        },
        events: eventArr
    });
}

function createCookie() {
    if (document.cookie.indexOf('preference') === -1) { //cookie does not exsist
        document.cookie = "preference=month";
    }
}

function findCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

createCookie()