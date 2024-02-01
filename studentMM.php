 <html> 
         <header><title>Timetable</title></header>

<?php
include('conn.php');
$ID = $_POST['ID'];
$timetable = "SELECT * FROM `classTimetable` WHERE ID = '$ID'";
//     gets their timetable
     $getStudent = "SELECT * FROM `students` WHERE ID = '$ID'";
     $student = mysqli_query($conn, $getStudent);
     $options = mysqli_fetch_assoc($student);
     $opA = $options['optionA'];
     $opB = $options['optionB'];
     $opC = $options['optionC'];
//     gets their options
     
   $result = mysqli_query($conn, $timetable);
   $row = mysqli_fetch_assoc($result);
     
     echo "<h2>Name: ". $options['fullName']. "<br></h2>";
     echo "<h2>Class: ". $row['Class'] . "<br></h2>";
//displays basic info
        $monday1 = $row["monday1"];
        $monday2 = $row["monday2"];
        $monday3 = $row["monday3"];
        if ($monday3 = "Option A"){$monday3 = $opA;}
    elseif ($monday3 = "Option B"){$monday3 = $opB;}
        $monday4 = $row["monday4"];
        $monday5 = $row["monday5"];

        $tuesday1 = $row["tuesday1"];
        if ($tuesday1 = "Option C"){$tuesday1 = $opC;}
    elseif ($tuesday1 = "Option A"){$tuesday1 = $opA;}
        $tuesday2 = $row["tuesday2"];
        if ($tuesday2 = "Opioon B"){$tuesday2 = $opB;}
    elseif ($tuesday2 = "Option C"){$tuesday2 = $opC;}
        $tuesday3 = $row["tuesday3"];                               
        $tuesday4 = $row["tuesday4"];
        $tuesday5 = $row["tuesday5"];

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

        $thursday1 = $row["thursday1"];
        $thursday2 = $row["thursday2"];
        $thursday3 = $row["thursday3"]; 
        $thursday4 = $row["thursday4"];
        $thursday5 = $row["thursday5"];

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
//        assings each period to a subject and moves around options where appropriate
    
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
        ";       
//saves the table
    ?>
<body> 
    <table border="1" width="10px" class="table">
        <form method="POST" action="studentMM.php" style="width: 300px">
            <?php echo $tablecontents; ?>
<!--            outputs the table-->          
        </form>
    </table>
    <br><br>
<!--    this is the help section-->
    <form method="POST" action="email.php">
            If you have any queries, please enter your message here: <input type="text" name="message" required>
            <input type="hidden" value="<?php echo $options['fullName']; ?>" name="name">
            <input type="hidden" value="<?php echo $_POST['ID']; ?>" name="ID">
            <button type="submit">Send</button>
    </form>
</body>    
</html>
