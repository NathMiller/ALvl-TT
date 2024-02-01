<html>
<header><title>Create Timetable</title></header>
<form method="POST" action="uploadTT.php">    
    Please enter how many students you are creating timetables for: <input type="number" name="totalStudents" required><br>
    Please enter how many classes you want per subject per cohort: <input type="number" name="totalClasses" required><br>
    <button type="submit" >Next</button>    
<!--    submits the variables for number of students and classes per cohort-->
</form>
    <form method="POST" action="adminMM.php">
    <button type="submit">Return</button>
    </form>
<!--    takes user back to the homepage-->
</html>