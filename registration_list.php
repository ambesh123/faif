<!DOCTYPE html>
<html>
<head>
	<title>Registration List</title>

	<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>

</head>
<body>

	<?php
		require "config/database.php";
		$db = new Database();
		$con = $db->connect();

		$table = "registrations";

		$query = 'SELECT * FROM '.$table;


		$res = $con->query($query);

	?>

	<div class="container">
		<h2>Registration List</h2>

		<table class="table .table-striped">

			<thead>
				<tr>
			        <th>Registration ID</th>
			        <th>Event ID</th>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Contact</th>
			        <th>Designation</th>
			        <th>Institute/Organisation</th>
			      </tr>
			</thead>

			<tbody>
				

			<?php
				while($row = $res->fetch_assoc()):
			?>
			<tr>
				<td><?php echo $row['reg_id'] ?></td>
				<td><?php echo $row['event_id'] ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['contact'] ?></td>
				<td><?php echo $row['designation'] ?></td>
				<td><?php echo $row['organisation'] ?></td>

			</tr>

			<?php endwhile?>

			</tbody>
			
		</table>

	</div>

</body>
</html>