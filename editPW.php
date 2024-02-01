
<?php
    $userName = $_POST['userName'];
//gets the username from the previous page
?>
<html>
    <header><title>Password Edit</title></header>
    <body>
            <form method="POST" action="insertPW.php">
                Please enter the new password: <input type="password" name="passWord"><br>
                Enter it again: <input type="password" name="CpassWord"><br>
<!--                this is to make sure they know what they have changed it to-->
                <input type="hidden" value="<?php echo $userName; ?>" name="userName">
<!--                passes the username that was entered already again-->
                <button type="submit">Go</button>
            </form>
        <form method="POST" action="adminMM.php">
    <button type="submit">Return</button>
<!--            goes back to the admin homepage-->
    </form>
    </body>

</html>