availability_morning()
availability_evening()
availability_night()

document.getElementById("filterby").innerHTML = "Filtered by " + get_today();

$("#dayofweek li").click(function() {
    var filteredDay
    filteredDay = this.id;
    document.getElementById("filterby").innerHTML = "Filtered by " + filteredDay;
});

function get_today() {
    var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

    var today = new Date();
    var day = String(today.getDay());

    return weekday[day];
}

function availability_morning() {
    ul = document.getElementById("availability_morning");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.indexOf(get_today()) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }

	$("#dayofweek li").click(function() {
        var filteredDay, ul, li, txtValue
        filteredDay = this.id;

        ul = document.getElementById("availability_morning");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.indexOf(filteredDay) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
        // var className = document.getElementsByClassName('fc-event availability')
        // for (var i = 0; i < className.length; i++) {
        //     var availabilityDay = document.getElementById('availabilityDay')
        //     console.log(className[i])
        //     // console.log(availabilityDay.attributes.name)
        //     console.log(availabilityDay.innerText)
        // //     var availabilityDay = filteredDay.name


        //     // if (filteredDay == availabilityDay) {
        //     //     var className = document.getElementsByClassName('fc-event availability')
        //     //     for (var j = 0; j <className.length; j++) {
        //     //         console.log("filteredDay");
        //     //     }
        //     // }

        //     // console.log(className[i].firstElementChild)
        //     // console.log(className.firstElementChild)
        // }
    });
}

function availability_evening() {
    ul = document.getElementById("availability_evening");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.indexOf(get_today()) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }

    $("#dayofweek li").click(function() {
        var filteredDay, ul, li, txtValue
        filteredDay = this.id;

        ul = document.getElementById("availability_evening");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.indexOf(filteredDay) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    });
}



function availability_night() {
    ul = document.getElementById("availability_night");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.indexOf(get_today()) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }

    $("#dayofweek li").click(function() {
        var filteredDay, ul, li, txtValue
        filteredDay = this.id;

        ul = document.getElementById("availability_night");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.indexOf(filteredDay) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    });
}