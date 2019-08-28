<?php 
require "config/database.php";

$db = new Database();
$con = $db->connect();

$id = $_POST["id"];
$mysql_qry = "UPDATE registrations SET present=1 WHERE reg_id = '$id'";

if(mysqli_query($con, $mysql_qry)) { 
	echo "1";
}
else {
	echo "0";
} 
$con->close();
?>
