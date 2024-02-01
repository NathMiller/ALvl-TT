<?php
include('conn.php');   

     $fullname = $_POST['fullName'];
     $password = $_POST['passWord'];   
     $cPW = $_POST['confirmPassWord'];   
     $opA = $_POST['opA'];   
     $opB = $_POST['opB'];   
     $opC = $_POST['opC'];

    $remove = "'";
    $fullname = str_replace($remove, " ", $fullname);
    
    
    if(strpos($password, "'")){
        echo "<script type='text/javascript'>alert('You cannot have an apostrophe in your password. Please try again.');
        location='inputStudents.php';</script>";
    exit(); 
    }
//    checks for apostrophe
    
    if (empty($password)){
    echo "<script type='text/javascript'>alert('You have not entered a password. Please try again.');
    location='inputStudents.php';</script>";
    exit(); 
    }
//checks something was entered
    if (empty($fullname)){
    echo "<script type='text/javascript'>alert('You have not entered a name. Please try again.');
    location='inputStudents.php';</script>";
    exit(); 
    }
//checks something was entered

    if ($password != $cPW){
    echo "<script type='text/javascript'>alert('Your passwords do not match. Please try again.');
    location='inputStudents.php';</script>";
    exit();   
    }
//    checks the passwords match
    if (($opA != "Business Studies") AND ($opA != "Computer Science") AND ($opA != "Dance") AND ($opA != "Art") AND ($opA != "French")){
        echo "<script type='text/javascript'>alert('You have not selected an option. Please try again.');
        location='inputStudents.php';</script>";
        exit(); 
    }
//checks an option was picked
    elseif (($opB != "Geography") AND ($opB != "Health and Social Care") AND ($opB != "History") AND ($opB != "Music") AND ($opB != "Philosophy and Ethics")){
        echo "<script type='text/javascript'>alert('You have not selected an option. Please try again.');
        location='inputStudents.php';</script>";
        exit(); 
    }
//checks an option was picked

    elseif (($opC != "Photography") AND ($opC != "Product Design") AND ($opC != "Sociology") AND ($opC != "Spanish") AND ($opC != "Textiles")){
        echo "<script type='text/javascript'>alert('You have not selected an option. Please try again.');
        location='inputStudents.php';</script>";
        exit(); 
    }
//checks an option was picked


    $userNumber = mt_rand(5000, 6000);
    $userLetter = substr($fullname, 0, 1);
    
    $getNumbers = "SELECT userName FROM `users`";
    $numbers = mysqli_query($conn, $getNumbers);
    
    do {    
        if ($userNumber == substr($row, 1)){
        $userNumber = mt_rand(5000, 6000);}   
       }while($row = mysqli_fetch_assoc($numbers));
//       checks that the id generated has not been used before 
    $userName = $userLetter . $userNumber;
    $authority = 3;
//      creates a student account
    $classTimetableRows = "SELECT * FROM `classTimetable`";
    $getRows = mysqli_query($conn,$classTimetableRows);
    $rows = mysqli_num_rows($getRows); 
    
    $getIDsql = "SELECT * FROM `students`"; 
    $getID = mysqli_query($conn,$getIDsql);
    $ID = mysqli_num_rows($getID); 
    $ID = $ID + 1;
//    generates their database ID
    if ($ID <= $rows){
    $userInsert = "INSERT INTO `users`(`userName`, `passWord`, `authority`, `ID`) VALUES ('$userName','$password','$authority', '$ID')";
    mysqli_query($conn,$userInsert);
//    uploads account information


   $studentInsert = "INSERT INTO `students`(`ID`, `fullName`, `optionA`, `optionB`, `optionC`) VALUES ('$ID','$fullname','$opA','$opB','$opC')";
   mysqli_query($conn,$studentInsert);
        
//    uploads student information    
        echo "Account registered. Your username for logging in is: " . $userName . ". Please use this to log in after clicking the button below.";
        
        echo "<form action='login.php'><button type='submit'>Login</button></form>";
        
    
    }
    else{
        echo "All students have already been registered. If this is a problem, please contact an administrator.";
//        if the id is equal to the total rows then they are not registered
    }

?>
<html>
    <header><title>Register</title></header>
    <body><form action='login.php'><button type='submit'>Login</button></form></body>
</html>
