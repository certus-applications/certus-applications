var error_status = findCookie("error_status")

if (error_status == "001") {
	new PNotify({
		title: 'Error',
        text: 'Password changed!',
        type: 'success',
        styling: 'bootstrap3',
        delay: 2500
	});
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

function updateCookie(changePassword) {
	document.cookie = "change_password="+changePassword;
}