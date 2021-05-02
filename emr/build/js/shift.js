console.log("loading js")

$('.buttonNext').click(function() {
    console.log('shift js script');
    // Check for screener id?
    // Check Scheduler DB to see if screener id is there and to see if they're scheduled for that day
    event.preventDefault();
    // Sending declined data
    var screener_id = $('#screenerid').val();
    var shiftStatus = $('#shiftCheckboxIn').val();

    // var shiftData = {
    //     screenerid = screener_id,
    //     shift_status = shiftStatus
    // }

    // $.ajax({
    //     url: 'http://certus.local/shifts/add/',
    //     type: 'POST',
    //     dataType: 'text',
    //     data: shiftData,
    //     success: function(data) {
    //         console.log('submit success');
    //     },
    //     error: function(data) {
    //         console.log('error');
    //     }
    // });
});



// $('#buttonFinish').click(function() {
    
// });
