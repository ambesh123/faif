<?php 
	require "config/database.php";

	$db = new Database();
	$con = $db->connect();

	$table = "events";


	$query = 'INSERT INTO '.$table.' (title, description, date_from, date_to, time_from, time_to, venue, address) VALUES("'.$_POST['Title'].'" , "'.$_POST['Description'].'" ,"'.$_POST['FromDate'].'" , "'.$_POST['ToDate'].'" ,"'.$_POST['FromTime'].'" , "'.$_POST['ToTime'].'" ,"'.$_POST['Venue'].'" , "'.$_POST['Address'].'")';



	if($con->query($query)){
		echo "<h2>Event Added Successfully</h2>";

		echo "<a href = 'event_list.php'> Event List </a>";
	}
	else{
		echo "Database Error".$con->error;
	}

	$con->close();

?>