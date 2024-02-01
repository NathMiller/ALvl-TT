<html>
<header><title>Edit Menu</title></header>
    <?php
    include('conn.php');
    $inputName = $_POST['userName'];
    $checkName = "SELECT * from `users` WHERE userName = '$inputName'";
    $result = mysqli_query($conn, $checkName);
   
    $row = mysqli_fetch_assoc($result);
    $authority = $row['authority'];
//  this gets the authority to make sure they are the student 
    if ((mysqli_num_rows($result) == 0) OR ($authority < 3)){
        
        echo "<script type='text/javascript'>alert('Not a valid student. Please try again.');
                location='editName.php';</script>";
        exit();
    }
    ?>    
    <body>
<!--this is the html for displaying the menu-->
            <form method="POST" action="editPW.php">
                <input type="hidden" value="<?php echo $inputName; ?>" name="userName">
                <button type="submit">Change Password</button>
            </form>
<!--        takes to edit password-->
            <form method="POST" action="editTT.php">
                <input type="hidden" value="<?php echo $inputName; ?>" name="userName">
                <button type="submit">Change Options</button>
            </form>
<!--        takes to edit timetable (changing options) -->
            <form method="POST" action="adminMM.php">
    <button type="submit">Return</button>
    </form>

    </body>
</html>