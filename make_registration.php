<?php
	require "config/database.php";
	$db = new Database();
	$con = $db->connect();

	$table = "registrations";

	$query = 'INSERT INTO '.$table.' (event_id, name, email, contact, designation, organisation) VALUES("'.$_POST['event_id'].'" , "'.$_POST['Name'].'" ,"'.$_POST['Email'].'" , "'.$_POST['Contact'].'" ,"'.$_POST['Designation'].'" , "'.$_POST['Organisation'].'")';


	$con->query($query);

	$res = $con->query('SELECT * FROM '.$table.' ORDER BY reg_id DESC LIMIT 1');

	$row = $res->fetch_assoc();

	$reg_id = $row['reg_id'];
	$name = $row['name'];
	$email = $row['email'];
	$event_id = $row['event_id'];

	echo "Congratulations You have registered for the Event. <br> Your Registration ID is : ".$reg_id;

	$res = $con->query('SELECT * FROM events WHERE event_id = "'.$event_id.'"');	

	$row = $res->fetch_assoc();

	$event_title = $row['title'];
	$date = $row['date_from'];
	$time = $row['time_from'];
	$venue = $row['venue'];


	echo "<br>wait while you are automatically being redirected<br>"

?>

<form method="POST" action="pdf_generation/qr.php" style="display: hidden" id = "form1">
	<input type="text" name="reg_id" value = "<?php echo $reg_id ?>">
	<input type="text" name="name" value = "<?php echo $name ?>">
	<input type="email" name="email" value = "<?php echo $email ?>">
	<input type="date" name="date" value = "<?php echo $date ?>">
	<input type="text" name="time" value = "<?php echo $time ?>">
	<input type="text" name="venue" value = "<?php echo $venue ?>">
	<input type="text" name="event_title" value = "<?php echo $event_title ?>">
	<input type="submit">
</form>


<script type="text/javascript">
	var form = document.getElementById("form1");
	form.submit();
</script>