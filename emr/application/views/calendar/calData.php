<!-- 
<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDxbAX1Ki1V4SKNa7en-85ladjOfjZ0TXU",
    authDomain: "certus-6400a.firebaseapp.com",
    databaseURL: "https://certus-6400a.firebaseio.com",
    projectId: "certus-6400a",
    storageBucket: "certus-6400a.appspot.com",
    messagingSenderId: "996578780277",
    appId: "1:996578780277:web:fb156f6545d7f59445443c",
    measurementId: "G-VK9XDSV3WW"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  console.log('firebase initialized');

  var db = firebase.firestore();
  var appRef = db.doc("users/appointments");

  // Firebase Variables
  var fb_title, fb_start_date, fb_end_date;

  appRef.get().then(function(doc) {
    if (doc.exists) {
      fb_title = doc.get('title');
      fb_start_date = doc.get('start_date');
      fb_end_date = doc.get('end_date');

      console.log(fb_title);
      console.log(fb_start_date);
      console.log(fb_end_date);
    } else {
      console.log("No document");
    }
  

  console.log('loading calData...', fb_title);
  var table_data = [];
  function init_calendar() {
      
    if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
    console.log('calData calendar');
        
    var date = new Date(),
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),
        started,
        categoryClass;

    var calendar = $('#calendar').fullCalendar({
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
            var sub = {
                'title' : title,
                'start' : started,
                'end' : end,
                'allDay' : allDay
            }

            table_data.push(sub);

            calendar.fullCalendar('unselect');

            $('.antoclose').click();

            return false;
        });

        },
        eventClick: function(calEvent, jsEvent, view) {
        $('#fc_edit').click();
        $('#title2').val(calEvent.title);

        categoryClass = $("#event_type").val();

        $(".antosubmit2").on("click", function() {
            calEvent.title = $("#title2").val();

            calendar.fullCalendar('updateEvent', calEvent);
            $('.antoclose2').click();
        });

        calendar.fullCalendar('unselect');

        },
        editable: true,
        events: [{
        title: 'All CHANGED Event',
        start: new Date(y, m, 3)
        }, {
        title: 'Long Event',
        start: new Date(y, m, d - 5),
        end: new Date(y, m, d - 2)
        }, {
        title: 'Meeting',
        start: new Date(y, m, d, 10, 30),
        allDay: false
        }, {
        title: 'Lunch',
        start: new Date(y, m, d + 14, 12, 0),
        end: new Date(y, m, d, 14, 0),
        allDay: false
        }, {
        title: 'Birthday Party Edit',
        start: new Date(y, m, d + 1, 15, 0),
        end: new Date(y, m, d + 1, 22, 30),
        allDay: false
        }, {
        title: 'Click for Google',
        start: new Date(y, m, 28),
        end: new Date(y, m, 29),
        url: 'http://google.com/'
        }]
    });
      console.log('end of cal');
  };
}).catch(function(error) {
    console.log("Error getting document: ", error);
});

</script> -->


<!-- 
<script>
  // // Ajax used to insert into database
  console.log("second script running");
  console.log(table_data);
  $(function() {
    $('#add_new_event').click(function() {
      var data = { 'table_data': table_data };
      $.ajax({
            data: data,
            type: 'POST',
            url: '<?php echo base_url('Main/saveEvent'); ?>',
            crossOrigin: false,
            dataType: 'json',
            success: function(result) {
            //   console.log(result.check);
            console.log(result.check);
            }
          })
    })
  })
    
</script> -->