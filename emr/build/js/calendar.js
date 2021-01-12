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
  var appRef =  db.collection("pat_appointments");

  // Firebase Variables
  var fb_title, fb_desc, fb_start_date, fb_end_date;
  var eventArr = [];
  var description = document.getElementById('descr2');
/* CALENDAR */
 function init_calendar() {
		appRef.get().then(function(querySnapshot) {
      querySnapshot.forEach(function(doc) {
        fb_title = doc.get('title');
        fb_start_date = Date.parse(doc.get('start_date'));
        fb_end_date = Date.parse(doc.get('end_date'));

        eventArr.push({
          title: doc.get('title'),
          start: Date.parse(doc.get('start_date')),
          end: Date.parse(doc.get('end_date')),
          description: doc.get('description')
        })
      })
 
     if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
     console.log('init_calendar');
        
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
                 allDay: false
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
           calEvent.title = $("#title2").val();
           calEvent.description = $('#descr2').val();

           calendar.fullCalendar('updateEvent', calEvent);
           $('.antoclose2').click();
         });

        //  var descr = $('#descr2').val();

         calendar.fullCalendar('unselect');


       },
       editable: true,

       events: [{
          userID: '1',
          title: 'All Day Event',
          start: new Date(y, m, 1),
          location: 'Location 1',
          color: 'coral'
          }, {
          userID: '2',
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          location: 'Location 2',
          color: 'red'
          }, {
          userID: '3',
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          location: 'Location 3',
          color: 'blue'
          }, {
          userID: '4',
          title: 'Lunch',
          start: new Date(y, m, d + 14, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          location: 'Location 4',
          color: 'aqua'
          }, {
          userID: '5',
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          location: 'Location 5',
          color: 'maroon'
          }, {
          userID: '6',
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/',
          location: 'Location 6',
          color: 'navy'
          }],
     });
    }).catch(function (error) {
        console.log("Error Connecting: ", error);
    })
    
 };

