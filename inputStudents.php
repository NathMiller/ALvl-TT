<html>
   <header><title>Register</title></header>
<body>

<p>Please enter in all the following information in accurately:</p>   

    <form method="POST" action="fixPopup.php">
        Full Name: <input type="text" name="fullName" placeholder="e.g. Nathan Miller" required><br><br>
        Password: <input type="password" name="passWord" required><br>
        Confirm Password: <input type="password" name="confirmPassWord" required><br>
        <br>
<!--        option A dropdown-->
        <select required name="opA">
        <option selected="true" disabled value="Option A">Option A</option>
        <option value="Business Studies">Business Studies</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Dance">Dance</option>
        <option value="Art">Art</option>   
        <option value="French">French</option>   
        </select><br>
<!--option B dropdown -->
        <select required name="opB">
        <option selected="true" disabled value="Option B">Option B</option>
        <option value="Geography">Geography</option>
        <option value="Health and Social Care">Health and Social Care</option>
        <option value="History">History</option>
        <option value="Music">Music</option>   
        <option value="Philosophy and Ethics">Philosophy and Ethics</option>   
        </select><br>
<!--option C dropdown -->
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
<!--        takes you to fixpopup.php-->
    </form>

    
</body> 
</html>