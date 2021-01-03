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
	$(document).ready(function() {
	    $.ajax({
	        url: 'http://certus.local/main/index',
	        type: 'POST',
	        dataType: 'json',
	        success: function ( data) {
	            // console.log(data);
		        jQuery.each(data, function(index, value){
		        	jQuery.each(value, function(index, eventArray){
			            eventArr.push({
			            	title: eventArray.title,
			            	start: eventArray.start,
			            	end: eventArray.end
			            })
			        })
		        });

		        if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
			     console.log('init_calendar');
			     console.log(eventArr)
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
			          

			           calendar.fullCalendar('unselect');

			           $('.antoclose').click();

			           return false;
			         });

			       },
			       eventClick: function(calEvent, jsEvent, view) {
			         $('#fc_edit').click();
			         $('#title2').val(calEvent.title);
			         $('#descr2').val(calEvent.description);


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
			       events: eventArr
			     });   
	        },
	        error: function ( data ) {
	            console.log('error');
	        }
	    });
	}); 
 };

