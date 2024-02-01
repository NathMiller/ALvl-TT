<html>
<header><title>Timetable</title></header>
<?php
    
include('conn.php');
$userName = $_POST['userName'];
    

    $inputName = $_POST['userName'];
    $checkName = "SELECT userName from `users` WHERE userName = '$inputName'";
    $result = mysqli_query($conn, $checkName);
//    gets the user based on inputted name
    if (mysqli_num_rows($result) == 0){
        
        echo "<script type='text/javascript'>alert('Not a valid student. Please try again.');
                location='viewTT.php';</script>";
        exit(); 
//        if no account is found a popup appears 
    }
    
    
    
$getID = "SELECT * FROM `users` WHERE userName = '$userName'";
$query = mysqli_query($conn, $getID);
$row = mysqli_fetch_assoc($query);
$ID = $row['ID'];
$timetable = "SELECT * FROM `classTimetable` WHERE ID = '$ID'";
//     gets the id for the relevent student and then loads their timetable
     $getStudent = "SELECT * FROM `students` WHERE ID = '$ID'";
     $student = mysqli_query($conn, $getStudent);
     $options = mysqli_fetch_assoc($student);
     $opA = $options['optionA'];
     $opB = $options['optionB'];
     $opC = $options['optionC'];
     
//    gets the same students options 
   $result = mysqli_query($conn, $timetable);
     
     
    

   $row = mysqli_fetch_assoc($result);
     
     echo "<h2>Name: ". $options['fullName']. "<br></h2>";
     echo "<h2>Class: ". $row['Class'] . "<br></h2>";
//basic info displayed 
        $monday1 = $row["monday1"];
        $monday2 = $row["monday2"];
        $monday3 = $row["monday3"];
        if ($monday3 = "Option A"){$monday3 = $opA;}
    elseif ($monday3 = "Option B"){$monday3 = $opB;}   //replaces the blank spaces with their option choices
        $monday4 = $row["monday4"];
        $monday5 = $row["monday5"];
//displays all of monday
        $tuesday1 = $row["tuesday1"];
        if ($tuesday1 = "Option C"){$tuesday1 = $opC;}
    elseif ($tuesday1 = "Option A"){$tuesday1 = $opA;}
        $tuesday2 = $row["tuesday2"];
        if ($tuesday2 = "Opioon B"){$tuesday2 = $opB;}
    elseif ($tuesday2 = "Option C"){$tuesday2 = $opC;}
        $tuesday3 = $row["tuesday3"];                               
        $tuesday4 = $row["tuesday4"];
        $tuesday5 = $row["tuesday5"];
//displays all of tuesday
        $wednesday1 = $row["wednesday1"];
        if ($wednesday1 = "Option A"){$wednesday1 = $opA;}
    elseif ($wednesday1 = "Option B"){$wednesday1 = $opB;}
        $wednesday2 = $row["wednesday2"];
        if ($wednesday2 = "Option C"){$wednesday2 = $opC;}
    elseif ($wednesday2 = "Option A"){$wednesday2 = $opA;}
        $wednesday3 = $row["wednesday3"]; 
        if ($wednesday3 = "Option B"){$wednesday3 = $opB;}
    elseif ($wednesday3 = "Option C"){$wednesday3 = $opC;}
        $wednesday4 = $row["wednesday4"];
        $wednesday5 = $row["wednesday5"];
//displays all of wednesday
        $thursday1 = $row["thursday1"];
        $thursday2 = $row["thursday2"];
        $thursday3 = $row["thursday3"]; 
        $thursday4 = $row["thursday4"];
        $thursday5 = $row["thursday5"];
//displays all of thursday
        $friday1 = $row["friday1"];
        if ($friday1 = "Option C"){$friday1 = $opC;}
    elseif ($friday1 = "Option A"){$friday1 = $opA;}
        $friday2 = $row["friday2"];
        if ($friday2 = "Option B"){$friday2 = $opB;}
        elseif ($friday2 = "Option C"){$friday2 = $opC;}
        $friday3 = $row["friday3"]; 
        if ($friday3 = "Option A"){$friday3 = $opA;}
        elseif ($friday3 = "Option C"){$friday3 = $opC;}
        $friday4 = $row["friday4"];
        $friday5 = $row["friday5"];           
//    displays all of friday    
    
        $tablecontents = $tablecontents . "

        <tr>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        </tr>

        <tr><td>$monday1</td>
        <td>$tuesday1</td>
        <td>$wednesday1</td>
        <td>$thursday1</td>
        <td>$friday1</td></tr>

        <tr><td>$monday2</td>
        <td>$tuesday2</td>
        <td>$wednesday2</td>
        <td>$thursday2</td>
        <td>$friday2</td></tr>

        <tr><td>$monday3</td>
        <td>$tuesday3</td>
        <td>$wednesday3</td>
        <td>$thursday3</td>
        <td>$friday3</td></tr>

        <tr><td>$monday4</td>
        <td>$tuesday4</td>
        <td>$wednesday4</td>
        <td>$thursday4</td>
        <td>$friday4</td></tr>

        <tr><td>$monday5</td>
        <td>$tuesday5</td>
        <td>$wednesday5</td>
        <td>$thursday5</td>
        <td>$friday5</td></tr>
        ";  //stores the timetable in a single variable     
    ?>

<body>
    
    <table border="1" width="10px" class="table">
        <form method="POST" action="studentMM.php" style="width: 300px">
            <?php echo $tablecontents; ?>
<!--          displays the table for the subjects       -->
        </form>

    </table>
</body>

</html>