var error_status = findCookie("error_status")

if (error_status == "001") {
	new PNotify({
		title: 'Error',
        text: 'Please select at least one date!',
        type: 'error',
        styling: 'bootstrap3',
        delay: 2500
	});
}

if (error_status == "002") {
  new PNotify({
		title: 'Error',
        text: 'An error occurred, please try again.',
        type: 'error',
        styling: 'bootstrap3',
        delay: 2500
	});
}

if (error_status == "none") {
	new PNotify({
		title: 'Success',
        text: 'Availability submitted!',
        type: 'success',
        styling: 'bootstrap3',
        delay: 2500
	});
}


$("#submit-avail").click(function() {
	updateCookie("false")
});

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

function updateCookie(submitAvail) {
  console.log(submitAvail);
	document.cookie = "error_status="+submitAvail;
}