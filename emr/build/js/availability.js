availability_morning()
availability_evening()
availability_night()

function availability_morning() {
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