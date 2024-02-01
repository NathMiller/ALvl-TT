<html>
    <header><title>Login</title></header>
<?php
    include('conn.php');
    
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];  
    
    $sql = "SELECT * FROM users WHERE userName = '$userName' AND passWord = '$passWord'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)>0){
//if an account is found it proceeds
    
        $row = mysqli_fetch_assoc($result);
        $authority = $row['authority'];
        $dbPassword = $row['passWord'];
            $ID = $row['ID'];

        if (($authority == 1) AND ($dbPassword != "12345678")){header("Location: http://userwebs.hallcross.org/mill5304/Development/adminMM.php");}
//        takes an admin to the right page if it isnt first login
        
        if (($authority < 3) AND ($dbPassword == "12345678")){
            ?>
                       <p> Please create a password: </p> 
             <form method='POST' action='teacherPW.php'>
                Password: <input type="password" name="passWord"><br>
                Confirm password: <input type="password" name="CpassWord"><br>
                 <input type='hidden' name='userName' value='<?php echo $userName; ?>'>
                 You will be taken back to login.<br>
             <button type='submit'>Go</button>    
             </form>
<!--    changes password if it is the default one-->
<?php
        }           
        if (($authority == 2) AND ($dbPassword != "12345678")){header("Location: http://userwebs.hallcross.org/mill5304/Development/teacherMM.php");}        
//        same again for teacher account              
        if ($authority == 3){
//            student login       
            $getStudents = "SELECT * FROM students WHERE ID = '$ID'";
            $students = mysqli_query($conn, $getStudents);
            $getName = mysqli_fetch_assoc($students);
            $name = $getName['fullName'];         
        ?>
           <p> Please confirm that you are <?php echo $name; ?>:</p> 
             <form method='POST' action='studentMM.php'>
             <input type='hidden' name='ID' value='<?php echo $ID; ?>'>
             <button type='submit'>Yes</button>    
             </form>
            
            <form method='POST' action='login.php'>
                  <button type='submit'>No</button>    
                  </form>          
     <?php
        }
    }
           
    else{    echo "<script type='text/javascript'>alert('No account found. Please try again.');
            location='login.php';</script>";
        exit();
//        sends them back if it is incorrect
            }    
    ?>
    </html>