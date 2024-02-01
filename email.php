<html>
    <header><title>Email</title></header>
<?php
    $ID = $_POST['ID'];
    $sender = $_POST['name'];
    $message = $_POST['message'];
    $message = wordwrap($message,70);
//    gets the email from previous page

    $email = "mill5304@hallcrossacademy.co.uk";
    $subject = $sender . " has requested help.";
  
    
    mail($email, $subject, $message);
    echo "Message delivered.";
//sends email

?>
    
    <body>
    <br><br>
    <form method="POST" action="studentMM.php">
        <input type="hidden" value="<?php echo $ID; ?>" name="ID">
        <button type="submit">Return</button>
<!--        takes back to student main menu-->
    </form>
    
    </body>


</html>
    
