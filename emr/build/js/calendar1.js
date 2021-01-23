var eventArr = [];
var description = document.getElementById('descr2');
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

function init_calendar(eventArr) {
    if (typeof($.fn.fullCalendar) === 'undefined') {
        return;
    }
    var cookiePreference = findCookie("preference")
    console.log('init_calendar');
    console.log(eventArr)
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
            $('#fc_edit').click();
            $('#title2').val(calEvent.title);
            $('#descr2').val(calEvent.location);
            $('#userID').val(calEvent.userID);

            categoryClass = $("#event_type").val();

            $(".antosubmit2").on("click", function() {
                calEvent.fullName = $("#title2").val();
                calEvent.description = $('#descr2').val();

                calendar.fullCalendar('updateEvent', calEvent);
                $('.antoclose2').click();
            });

            //  var descr = $('#descr2').val();

            calendar.fullCalendar('unselect');

        },
        editable: true,
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