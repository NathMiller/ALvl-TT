<html>
       <header><title>Teacher Registration</title></header>

<body>

<p>Please enter in all the following information in accurately:</p>   

    <form method="POST" action="inputTeachers.php">
        Full Name: <input type="text" name="fullName" placeholder="e.g. Nathan Miller" required><br><br>
        Authority Level: <input type ="number" name="authority" required><br>
        <button type="submit">Go</button>
<!--        creates a new teacher or admin account-->
    </form>
        <form method="POST" action="adminMM.php">
    <button type="submit">Return</button>
    </form>
</body>
</html>