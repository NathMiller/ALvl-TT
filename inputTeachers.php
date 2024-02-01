<?php
include('conn.php');
$fullName = $_POST['fullName'];
$authority = $_POST['authority'];
if (($authority > 2) OR ($authority <= 0)){
    echo "<script type='text/javascript'>alert('An account registered here cannot have an authority level lower than 2.');
                location='teacherRegister.php';</script>";
//    this makes sure its not a student or invalid number 
    exit();
}
$getNumbers = "SELECT userName FROM `users`";
    $numbers = mysqli_query($conn, $getNumbers);
    
    do {    
        if ($userNumber == substr($row, 1)){
        $userNumber = mt_rand(100, 999);}   
       }while($row = mysqli_fetch_assoc($numbers));

$userLetter = substr($fullName, 0, 1);
$userName = $userLetter. $userNumber;
$passWord = "12345678";
//creates username with unique id and general password

echo "The username is " . $userName . ".";
echo "<br>For the first login, please use 12345678. They will then be asked to create their own password.";
    $sql = "INSERT INTO `users`(userName, passWord, authority) VALUES ('$userName', '$passWord', '$authority')";
    mysqli_query($conn, $sql);
//uploads information
?>
<html>
    <header><title>Teacher Register</title></header>
<body>
        <form method="POST" action="adminMM.php">
    <button type="submit">Return</button>
    </form>
    </body>
</html>