<?php
include('conn.php');
$userName = $_POST['userName'];

$getID = "SELECT * FROM `users` WHERE userName = '$userName'";
$ID = mysqli_query($conn, $getID);
$row = mysqli_fetch_assoc($ID);
$ID = $row['ID'];
//gets the id for that student so you know what subjects they do 
$getStudent = "SELECT * FROM `students` WHERE ID = '$ID'";
$student = mysqli_query($conn, $getStudent);
$studentInfo = mysqli_fetch_assoc($student);
$fullname = $studentInfo['fullName'];
$opA = $studentInfo['optionA'];
$opB = $studentInfo['optionB'];
$opC = $studentInfo['optionC'];
//assigns their options to variables
echo $fullname . "'s options are: <br>";
echo "<ol>" . $opA . "</ol>";
echo "<ol>" . $opB . "</ol>";
echo "<ol>" . $opC . "</ol>";
//displays it as an ordered list

?>
<html>
    <header><title>Edit Timetable</title></header>
    <body>
<form method="POST" action="insertTT.php">
<input type="hidden" value="<?php echo $ID; ?>" name="ID">
<!--    option A subjects-->
       Please select new options: <br>
        <select required name="opA">
        <option selected="true" disabled value="Option A">Option A</option>
        <option value="Business Studies">Business Studies</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Dance">Dance</option>
        <option value="Art">Art</option>   
        <option value="French">French</option>   
        </select><br>
<!--option B subjects-->
        <select required name="opB">
        <option selected="true" disabled value="Option B">Option B</option>
        <option value="Geography">Geography</option>
        <option value="Health and Social Care">Health and Social Care</option>
        <option value="History">History</option>
        <option value="Music">Music</option>   
        <option value="Philosophy and Ethics">Philosophy and Ethics</option>   
        </select><br>
<!--option C subjects-->
        <select required name="opC">
        <option selected="true" disabled value="Option C">Option C</option>
        <option value="Photography">Photography</option>
        <option value="Product Design">Product Design</option>
        <option value="Sociology">Sociology</option>
        <option value="Spanish">Spanish</option>   
        <option value="Textiles">Textiles</option>   
        </select><br>
        
     <br><br>   
    <button type="submit">Go</button> 
<!--    takes you to the page for uploading the timetable-->
    </form>
            <form method="POST" action="adminMM.php">
    <button type="submit">Return</button>
    </form>
    </body>
    </html>