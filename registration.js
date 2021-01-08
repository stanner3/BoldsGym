window.onload = function() {
    // get some important nodes
    var registrationForm = document.getElementById("registration-form");
    var dayField = document.getElementById("dayofweek");
    var timeField = document.getElementById("time");
    
    // validate the form registration
    registrationForm.onsubmit = function() {
        return validateForm(dayField, timeField);
    }
};

function validateForm(dayField, timeField) {
    // get the selected day
    var daySelected = dayField[dayField.selectedIndex].value;
    // split it into yyyy-mm-dd
    var daySplit = daySelected.split("-");
    if( daySplit.length !== 3 ) {
        // if it's not 3 elements, something's wrong
        // TODO: error message
        return false;
    }
    
    // get the selected time
    var timeSelected = timeField[timeField.selectedIndex].value;
    // split it into hh-mm
    var timeSplit = timeSelected.split("-");
    if( timeSplit.length !== 2 ) {
        // if it's not 2 elements, something's wrong
        // TODO: error message
        return false;
    }
    
    // make a Date object for the selected date and time
    // remember: month starts at 0! need to subtract 1
    var dayAndTimeSelected = new Date(daySplit[0], daySplit[1] -1, daySplit[2], timeSplit[0], timeSplit[1], 0);
    // make a Date object for right now
    var now = new Date();
    
    // use getTime to compare dates: the selected day and time cannot be in the past
    if( dayAndTimeSelected.getTime() < now.getTime() ) {
        alert("Reserving a session for that day and time requires a time machine");
        return false;
    }
    
    // everything's ok, return true
    return true;
}