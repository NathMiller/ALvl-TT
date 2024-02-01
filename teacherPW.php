<?php
include('conn.php');
$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
$cPW = $_POST['CpassWord'];

if ($passWord != $cPW){
    echo "<script type='text/javascript'>alert('Passwords do not match. Please try again.');
                location='login.php';</script>";
//    passwords have to match
        exit();
}

    
$sql = "UPDATE `users` SET passWord = '$passWord' WHERE userName = '$userName'";
mysqli_query($conn, $sql);
//uploads the new password for the right account
echo $sql;

header("Location: http://userwebs.hallcross.org/mill5304/Development/login.php");
//takes you straight back to login
?>
<html>    <header><title>Set Password</title></header>
</html>