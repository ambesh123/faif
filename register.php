<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<?php
    require "config/database.php";

    $db = new Database();
    $con = $db->connect();
    $table = "events";

    $event_id = $_GET['event_id'];

    $res = $con->query('SELECT * FROM '.$table.' WHERE event_id = '.$event_id);

    if($res->num_rows == 0){
        echo "NO SUCH EVENT EXISTS <br>";
    }
    else $row = $res->fetch_assoc();

    $event_title = $row['title'];
    $venue = $row['venue'];
    $date = $row['date_from'];
    $time = $row['time_from'];

?>

<form action="make_registration.php" method="POST">

    <div class="well">
        <?php
            echo "<h3>Registeration for Event : ".$event_title."</h3>";
            echo "<h3>Event ID : <input type = 'text' name = 'event_id' value = '".$event_id."' readonly></h3>";
            echo "<h3>Venue : ".$venue."</h3>";
            echo "<h3>Date : ".$date."</h3>";
            echo "<h3>Time : ".$time."</h3>";
        ?>
    </div>

    <div class="text-center">

        <h4>Please Enter Your Details</h4>
        <label for="Name"><b>Name</b></label><br> 
        <input type="text" placeholder="Enter Your Name" name="Name" required><br>

        <label for="email"><b>Email</b></label><br>
        <input type="text" placeholder="Enter Email" name="Email" required><br>

        <label for="Contact"><b>Contact</b></label><br>
        <input type="text" placeholder="Enter Your Number" name="Contact" required><br>

        <label for="Designation"><b>Designation</b></label><br>
        <input type="text" placeholder="Enter Your Designation" name="Designation" required><br>

        <label for="Institution/Organisation"><b>Institution/Organisation</b></label><br>
        <input type="text" placeholder="Institution/Organisation" name="Organisation" required><br>

        <label>
              Conformation to attend Event <input type="checkbox" checked="checked" name="sameadr"><br>
            </label><br>

        <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
        <button type="submit" class="registerbtn">Submit</button>
    </div>
</form>

<?php $con->close(); ?>
