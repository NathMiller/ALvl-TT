<?php
$dbusername = "mill5304";
$dbpassword = "gwiuws";
$dbservername = "localhost";
$dbdatabase = "mill5304";
    
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbdatabase);
//attempts connection to database
if (!$conn){
    echo"connection failed";
//    will echo connection failed if it cant connect
}
?>