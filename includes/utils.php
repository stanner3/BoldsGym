<?php

/* Create and return a MySQL connection to the requested database
 * $hostname: the database hostname or ip address
 * $username: the username to connect to the database with
 * $password: the password that goes along with the username
 * $database: the database name
 *
 * return: a MySQL connection
 * throws: Exception if it is not possible to connect
 */
function getDatabaseConnection($hostname = "localhost", $username = "", $password = "", $database = "") {
    $conn = mysqli_connect("localhost", "kchaney", "The1Ring", "kchaney");
    
    if( !$conn ) {
        throw new Exception("Database connection failed");
    } else {
        return $conn;
    }
}

/* 
 * Generate a list of HTML <option> tags for the trainers
 * return: a list of HTML <option> tags
 */
function getTrainerOptions() {
    $output = '<option value="choose one" selected="selected">Choose a trainer</option>';
    
    try { 
        $conn = getDatabaseConnection(); // will throw an Exception if it can't connect
	
    	$queryS = "SELECT `tid`, `tfname`, `tlname` FROM `trainer`";
    	$query = mysqli_query($conn, $queryS); // do the query
    	
    	if( !$query ) {
    		// TODO: handle error better
    		die(mysqli_error($conn));
    	}
    	
    	while( $row = mysqli_fetch_assoc($query) ) {
    	    // TODO: handle database -> HTML sanitizing
    	    $id = $row['tid'];
    	    $name = $row['tfname'] . ' ' . $row['tlname'];
    		$output .= "<option value=\"{$id}\">{$name}</option>";
    	}
    	
    	mysqli_close($conn);
    } catch(Exception $e) {
    	// in case couldn't connect
    	echo "Something went wrong: " . $e->getMessage();
    }
    
    return $output;
}

/* 
 * Generate a list of HTML <option> tags for the required dates
 * $from: the day to start counting from
 * $howManyDays: number of days to include in the list, starting from $from
 * return: a list of HTML <option> tags
 */
function getDateOptions($from = "now", $howManyDays = 14) {
    $output = '<option value="choose one" selected="selected">Choose a date</option>';
    
    // get the date for $from
    $start = strtotime($from);
    // generate date options for the required dates
    for($i = 0; $i < $howManyDays; $i++) {
        // get the date for $i days from $start
        $date = strtotime("+$i day", $start);
        // make a date for the value attribute
        $yyyymmddDate = strftime('%G-%m-%d', $date);
        // make a readable date
        $readableDate = strftime('%A, %B %e, %G', $date);
        // put it all together
        $output .= '<option value="' . $yyyymmddDate . '">' . $readableDate . '</option>';
    }
    
    return $output;
}

/* 
 * Generate a list of HTML <option> tags for the required hours
 * $from: the hour to start counting from
 * $howManyHours: number of hours to include in the list, starting from $from
 * return: a list of HTML <option> tags
 */
function getTimeOptions($from = "9 am", $howManyHours = 7) {
    $output = '<option value="choose one" selected="selected">Choose a time</option>';
    
    // get the date for today at $from
    $start = strtotime($from);
    // generate time options for the required hours
    for($i = 0; $i < $howManyHours; $i++) {
        // get the date for $i hours $start
        $date = strtotime("+$i hour", $start);
         // make a time for the value attribute
        $hhmmTime = strftime('%H-%M', $date);
        // make a readable time
        $readableTime = strftime('%l:%M %p', $date);
        // put it all together
        $output .= '<option value="' . $hhmmTime . '">' . $readableTime . '</option>';
    }
    
    return $output;
}
