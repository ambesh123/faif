
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head><body>
    <form action="add_event_action.php" method="POST">
        <h1>Add Event</h1>
        <b><p>Enter Your Details</p></b>
        <label for="Title"><b>Title of Event</b></label><br> 
        <input type="text" placeholder="Title of Event" name="Title" required=""><br>

        <label for="Description"><b>Description of Event</b></label><br> 
        <input type="text" placeholder="Description of Event" name="Description" required=""><br>

        <label for="Date"><b>Date</b></label><br>
        From   <input type="Date" name="FromDate">  To <input type="Date" name="ToDate"><br>
        

        <label for="Time"><b>Time</b></label><br>
        From   <input type="Time" name="FromTime">  To <input type="Time" name="ToTime"><br>
        

        <label for="Venue"><b>Venue</b></label><br>
        <input type="text" placeholder="Enter Your Venue" name="Venue" required=""><br>

        <label for="Address"><b>Address</b></label><br>
        <input type="text" placeholder="Enter Your Address" name="Address" required=""><br>

      <!--  url of Event<br>
        <input type="url"><br> -->
        
         Image Upload<br>
          <action="action_page.php">
        <input type="file" name="pic" accept="image/*"><br>
        
        <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
        <button type="submit" class="registerbtn">Submit</button>
    </form>
</body>
</html>