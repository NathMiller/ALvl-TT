<?php
include('conn.php');

$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
$CpassWord = $_POST['CpassWord'];

if ($passWord != $CpassWord){
    echo "<script type='text/javascript'>alert('Passwords do not match. Please try again.');</script>";
    echo "<script type='text/javascript'>location='editName.php';</script>";
//    the passwords have to match to proceed
    exit();
}

else{

$update = "UPDATE `users` SET passWord='$passWord' WHERE userName = '$userName'";
mysqli_query($conn, $update);
//    uploads the new password
}
?>
<html>
<header><title>Edit Password</title></header>
<body>
    <form method="POST" action="adminMM.php">
    <p>Password updated.</p><br>
    <button type="submit">Return</button>
    </form>
    
</body>

</html>