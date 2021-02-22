add_building_data()

function add_building_data() {
	$(".submitLocationData").on("click", function() {
        event.preventDefault();
        var locationName = $('#location').val();

        var locationData = {
            name: locationName
        }

        $.ajax({
            url: 'http://certus.local/locations/addData/',
            type: 'POST',
            dataType: 'json',
            data: locationData,
            success: function(data) {
              new PNotify({
                title: 'Success',
                text: 'Added ' + locationData.name + ' to database!',
                type: 'success',
                styling: 'bootstrap3',
                delay: 2000
              });

              document.getElementById("locationInput").reset();
            },
            error: function(data) {
                console.log('error');
            }
        });
        PNotify.removeAll()
    });
}