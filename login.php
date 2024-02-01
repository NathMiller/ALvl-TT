<html>
    <header><title>Login</title></header>
    <body>
    
    <form method="POST" action="menu.php">
        Username: <input type="text" name="userName"><br>
        Password: <input type="password" name="passWord"><br>
    <button type="submit">Go</button>    
    </form>
<!-- this is the same login for teachers, admins, and students -->
    
    <br><br>  
    <form method="POST" action="inputStudents.php">
      If you are a new user, please go here:   
    <button type="submit">Register</button>
    </form>
<!-- allows student to register an account    -->
    </body>   
</html>