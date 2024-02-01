<?php
include('conn.php');     
     $ID = $_POST['ID'];
     $opA = $_POST['opA'];   
     $opB = $_POST['opB'];   
     $opC = $_POST['opC'];
//gets variables from previous page
    if (($opA != "Business Studies") AND ($opA != "Computer Science") AND ($opA != "Dance") AND ($opA != "Art") AND ($opA != "French")){
        echo "<script type='text/javascript'>alert('You have not selected an option. Please try again.');
        location='editName.php';</script>";
        exit(); 
    }
    elseif (($opB != "Geography") AND ($opB != "Health and Social Care") AND ($opB != "History") AND ($opB != "Music") AND ($opB != "Philosophy and Ethics")){
        echo "<script type='text/javascript'>alert('You have not selected an option. Please try again.');
        location='editName.php';</script>";
        exit(); 
    }
    elseif (($opC != "Photography") AND ($opC != "Product Design") AND ($opC != "Sociology") AND ($opC != "Spanish") AND ($opC != "Textiles")){
        echo "<script type='text/javascript'>alert('You have not selected an option. Please try again.');
        location='editName.php';</script>";
        exit(); 
    }
//checks an option has been sent for everything 
$update = "UPDATE `students` SET optionA='$opA',optionB='$opB',optionC='$opC' WHERE ID = '$ID'";
mysqli_query($conn, $update);
//uploads the new timetable
?>
<html>
<header><title>Edit Timetable</title></header>
<body>
    <form method="POST" action="adminMM.php">
    <p>Options updated.</p><br>
    <button type="submit">Return</button>
    </form>  
</body>
</html>