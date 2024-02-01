<html><header><title>Upload Timetable</title></header>
<?php
    include('conn.php');
$totalStudents = $_POST['totalStudents'];
$totalClasses = $_POST['totalClasses'];

if (($totalStudents <= 0) OR ($totalClasses <= 0)){
    echo "<script type='text/javascript'>alert('Enter in a valid number.');
    location='createTT.php';</script>";
        exit();
//    validates the number entered
}
    
    if ($totalClasses > 8){
        echo "<script type='text/javascript'>alert('Please do not have more than 8 classes');
    location='createTT.php';</script>";
//        max limit
        exit();
        }
$cohortA = intdiv($totalStudents, 2);
$cohortB = $totalStudents - $cohortA;
        
#CLASS ALLOCATION START

$classTotal = intdiv($cohortA, $totalClasses); #how many people goes in a class

$count = 1; 
$arraycount = 1;
$empty = "DELETE FROM classTimetable";
         mysqli_query($conn,$empty); 
$wipe = "DELETE FROM users WHERE ID >= 1";
        mysqli_query($conn, $wipe);
    
$ID = 1;
    
    while ($ID <= $totalStudents){
        $insert = "INSERT INTO `classTimetable` (`ID`) VALUES ('$ID')";
        mysqli_query($conn,$insert);
        $ID = $ID + 1;
        }
    
//  these are the possible subjects for that lesson
       while ($count <= $totalClasses){          
         $classTotal = intdiv($cohortA, $totalClasses);
         $class = $count . "A";
           
        $monday1options = array("", "Maths", "English", "Biology", "Physics");
        $monday1 = $monday1options[$count];            
                   
        $monday2options = array("", "PE", "Maths", "English", "Chemistry");
        $monday2 = $monday2options[$count];
                   
        $monday3options = array("", "Option A", "Option A", "Option B", "Option B");
        $monday3 = $monday3options[$count];
           
        $monday4options = array("", "English", "Biology", "Physics", "Maths");
        $monday4 = $monday4options[$count];
           
        $monday5options = array("", "PE", "Maths", "English", "Chemistry");
        $monday5 = $monday5options[$count];

        $tuesday1options = array("", "Option C", "Option C", "Option A", "Option A");
        $tuesday1 = $tuesday1options[$count];

        $tuesday2options = array("", "Option B", "Option B", "Option C", "Option C");
        $tuesday2 = $tuesday2options[$count];
           
        $tuesday3options = array("", "Chemistry", "PE", "Maths", "English");
        $tuesday3 = $tuesday3options[$count];
         
        $tuesday4options = array("", "Biology", "Physics", "Maths", "English");
        $tuesday4 = $tuesday4options[$count];

        $tuesday5options = array("", "Physics", "Maths", "English", "Biology");
        $tuesday5 = $tuesday5options[$count];
         
        $wednesday1options = array("", "Option A", "Option A", "Option B", "Option B");
        $wednesday1 = $wednesday1options[$count];
           
        $wednesday2options = array("", "Option C", "Option C", "Option A", "Option A");
        $wednesday2 = $wednesday2options[$count];
        
        $wednesday3options = array("", "Option B", "Option B", "Option C", "Option C");
        $wednesday3 = $wednesday3options[$count];
        
        $wednesday4options = array("", "English", "Chemistry", "PE", "Maths");
        $wednesday4 = $wednesday4options[$count];
           
        $wednesday5options = array("", "English", "Chemistry", "PE", "Maths");
        $wednesday5 = $wednesday5options[$count];
           
        $thursday1options = array("", "Maths", "English", "Biology", "Physics");
        $thursday1 = $thursday1options[$count];

        $thursday2options = array("", "Maths", "English", "Biology", "Physics");
        $thursday2 = $thursday2options[$count];
           
        $thursday3options = array("", "Biology", "Physics", "Maths", "English");
        $thursday3 = $thursday3options[$count];
           
        $thursday4options = array("", "Chemistry", "PE", "Maths", "English");
        $thursday4 = $thursday4options[$count];
           
        $thursday5options = array("", "Physics", "Maths", "English", "Biology");
        $thursday5 = $thursday5options[$count];
           
        $friday1options = array("", "Option C", "Option C", "Option A", "Option A");
        $friday1 = $friday1options[$count];
           
        $friday2options = array("", "Option B", "Option B", "Option C", "Option C");
        $friday2 = $friday2options[$count];
           
        $friday3options = array("", "Option A", "Option A", "Option B", "Option B");
        $friday3 = $friday3options[$count];
           
        $friday4options = array("", "English", "Chemistry", "PE", "Maths");
        $friday4 = $friday4options[$count];
           
        $friday5options = array("", "Maths", "English", "Chemistry", "PE");
        $friday5 = $friday5options[$count];
        
        
//    resets the loop
            if ($count > 4) {    
            $monday1 = $monday1options[$arraycount];
            $monday2 = $monday2options[$arraycount];
            $monday3 = $monday3options[$arraycount];
            $monday4 = $monday4options[$arraycount];
            $monday5 = $monday5options[$arraycount];

            $tuesday1 = $tuesday1options[$arraycount];
            $tuesday2 = $tuesday2options[$arraycount];
            $tuesday3 = $tuesday3options[$arraycount];
            $tuesday4 = $tuesday4options[$arraycount];
            $tuesday5 = $tuesday5options[$arraycount];
                
            $wednesday1 = $wednesday1options[$arraycount];
            $wednesday2 = $wednesday2options[$arraycount];
            $wednesday3 = $wednesday3options[$arraycount];
            $wednesday4 = $wednesday4options[$arraycount];
            $wednesday5 = $wednesday5options[$arraycount];

            $thursday1 = $thursday1options[$arraycount];
            $thursday2 = $thursday2options[$arraycount];
            $thursday3 = $thursday3options[$arraycount];
            $thursday4 = $thursday4options[$arraycount];
            $thursday5 = $thursday5options[$arraycount];
                
            $friday1 = $friday1options[$arraycount];
            $friday2 = $friday2options[$arraycount];
            $friday3 = $friday3options[$arraycount];
            $friday4 = $friday4options[$arraycount];
            $friday5 = $friday5options[$arraycount];
                               
            $arraycount = $arraycount + 1;
            }       
          $classTotal = $classTotal * $count;
        $sqlA = "UPDATE `classTimetable` SET `Class`='$class',`monday1`='$monday1',`monday2`='$monday2',`monday3`='$monday3',`monday4`='$monday4',`monday5`='$monday5',`tuesday1`='$tuesday1',`tuesday2`='$tuesday2',`tuesday3`='$tuesday3',`tuesday4`='$tuesday4',`tuesday5`='$tuesday5',`wednesday1`='$wednesday1',`wednesday2`='$wednesday2',`wednesday3`='$wednesday3',`wednesday4`='$wednesday4',`wednesday5`='$wednesday5',`thursday1`='$thursday1',`thursday2`='$thursday2',`thursday3`='$thursday3',`thursday4`='$thursday4',`thursday5`='$thursday5',`friday1`='$friday1',`friday2`='$friday2',`friday3`='$friday3',`friday4`='$friday4',`friday5`='$friday5' WHERE ID <= '$classTotal' AND Class IS NULL";
           
//       uploads all of cohort A
        $insertA = mysqli_query($conn, $sqlA);         
        $count = $count + 1;        
       }
    
$count = 1;
$arraycount = 1;
$newClassTotal = $classTotal;
$classTotal = intdiv($cohortA, $totalClasses);
//    the same again for classes b
     while ($count <= $totalClasses){  
         
        $monday1options = array("", "Maths", "English", "Biology", "Physics");
        $monday1 = $monday1options[$count];            
                   
        $monday2options = array("", "PE", "Maths", "English", "Chemistry");
        $monday2 = $monday2options[$count];
                   
        $monday3options = array("", "Option A", "Option A", "Option B", "Option B");
        $monday3 = $monday3options[$count];
           
        $monday4options = array("", "English", "Biology", "Physics", "Maths");
        $monday4 = $monday4options[$count];
           
        $monday5options = array("", "PE", "Maths", "English", "Chemistry");
        $monday5 = $monday5options[$count];

        $tuesday1options = array("", "Option C", "Option C", "Option A", "Option A");
        $tuesday1 = $tuesday1options[$count];

        $tuesday2options = array("", "Option B", "Option B", "Option C", "Option C");
        $tuesday2 = $tuesday2options[$count];
           
        $tuesday3options = array("", "Chemistry", "PE", "Maths", "English");
        $tuesday3 = $tuesday3options[$count];
         
        $tuesday4options = array("", "Biology", "Physics", "Maths", "English");
        $tuesday4 = $tuesday4options[$count];

        $tuesday5options = array("", "Physics", "Maths", "English", "Biology");
        $tuesday5 = $tuesday5options[$count];
         
        $wednesday1options = array("", "Option A", "Option A", "Option B", "Option B");
        $wednesday1 = $wednesday1options[$count];
           
        $wednesday2options = array("", "Option C", "Option C", "Option A", "Option A");
        $wednesday2 = $wednesday2options[$count];
        
        $wednesday3options = array("", "Option B", "Option B", "Option C", "Option C");
        $wednesday3 = $wednesday3options[$count];
        
        $wednesday4options = array("", "English", "Chemistry", "PE", "Maths");
        $wednesday4 = $wednesday4options[$count];
           
        $wednesday5options = array("", "English", "Chemistry", "PE", "Maths");
        $wednesday5 = $wednesday5options[$count];
           
        $thursday1options = array("", "Maths", "English", "Biology", "Physics");
        $thursday1 = $thursday1options[$count];

        $thursday2options = array("", "Maths", "English", "Biology", "Physics");
        $thursday2 = $thursday2options[$count];
           
        $thursday3options = array("", "Biology", "Physics", "Maths", "English");
        $thursday3 = $thursday3options[$count];
           
        $thursday4options = array("", "Chemistry", "PE", "Maths", "English");
        $thursday4 = $thursday4options[$count];
           
        $thursday5options = array("", "Physics", "Maths", "English", "Biology");
        $thursday5 = $thursday5options[$count];
           
        $friday1options = array("", "Option C", "Option C", "Option A", "Option A");
        $friday1 = $friday1options[$count];
           
        $friday2options = array("", "Option B", "Option B", "Option C", "Option C");
        $friday2 = $friday2options[$count];
           
        $friday3options = array("", "Option A", "Option A", "Option B", "Option B");
        $friday3 = $friday3options[$count];
           
        $friday4options = array("", "English", "Chemistry", "PE", "Maths");
        $friday4 = $friday4options[$count];
           
        $friday5options = array("", "Maths", "English", "Chemistry", "PE");
        $friday5 = $friday5options[$count];
        
            if ($count > 4) {    
            $monday1 = $monday1options[$arraycount];
            $monday2 = $monday2options[$arraycount];
            $monday3 = $monday3options[$arraycount];
            $monday4 = $monday4options[$arraycount];
            $monday5 = $monday5options[$arraycount];

            $tuesday1 = $tuesday1options[$arraycount];
            $tuesday2 = $tuesday2options[$arraycount];
            $tuesday3 = $tuesday3options[$arraycount];
            $tuesday4 = $tuesday4options[$arraycount];
            $tuesday5 = $tuesday5options[$arraycount];
                
            $wednesday1 = $wednesday1options[$arraycount];
            $wednesday2 = $wednesday2options[$arraycount];
            $wednesday3 = $wednesday3options[$arraycount];
            $wednesday4 = $wednesday4options[$arraycount];
            $wednesday5 = $wednesday5options[$arraycount];

            $thursday1 = $thursday1options[$arraycount];
            $thursday2 = $thursday2options[$arraycount];
            $thursday3 = $thursday3options[$arraycount];
            $thursday4 = $thursday4options[$arraycount];
            $thursday5 = $thursday5options[$arraycount];
                
            $friday1 = $friday1options[$arraycount];
            $friday2 = $friday2options[$arraycount];
            $friday3 = $friday3options[$arraycount];
            $friday4 = $friday4options[$arraycount];
            $friday5 = $friday5options[$arraycount];
                     
            $arraycount = $arraycount + 1;
            }       
            
         $class = $count . "B";
         $newClassTotal = $newClassTotal + $classTotal; 
    
        $sqlB = "UPDATE `classTimetable` SET `Class`='$class',`monday1`='$monday1',`monday2`='$monday2',`monday3`='$monday3',`monday4`='$monday4',`monday5`='$monday5',`tuesday1`='$tuesday1',`tuesday2`='$tuesday2',`tuesday3`='$tuesday3',`tuesday4`='$tuesday4',`tuesday5`='$tuesday5',`wednesday1`='$wednesday1',`wednesday2`='$wednesday2',`wednesday3`='$wednesday3',`wednesday4`='$wednesday4',`wednesday5`='$wednesday5',`thursday1`='$thursday1',`thursday2`='$thursday2',`thursday3`='$thursday3',`thursday4`='$thursday4',`thursday5`='$thursday5',`friday1`='$friday1',`friday2`='$friday2',`friday3`='$friday3',`friday4`='$friday4',`friday5`='$friday5' WHERE ID <= '$newClassTotal' AND Class IS NULL";
         
       $insertB = mysqli_query($conn, $sqlB);
       $count = $count + 1;
     }
# CLASS ALLOCATION END  
           
        $clearStudents = "DELETE FROM students";
        mysqli_query($conn, $clearStudents);

        $sqlC = "UPDATE `classTimetable` SET `Class`='$class',`monday1`='$monday1',`monday2`='$monday2',`monday3`='$monday3',`monday4`='$monday4',`monday5`='$monday5',`tuesday1`='$tuesday1',`tuesday2`='$tuesday2',`tuesday3`='$tuesday3',`tuesday4`='$tuesday4',`tuesday5`='$tuesday5',`wednesday1`='$wednesday1',`wednesday2`='$wednesday2',`wednesday3`='$wednesday3',`wednesday4`='$wednesday4',`wednesday5`='$wednesday5',`thursday1`='$thursday1',`thursday2`='$thursday2',`thursday3`='$thursday3',`thursday4`='$thursday4',`thursday5`='$thursday5',`friday1`='$friday1',`friday2`='$friday2',`friday3`='$friday3',`friday4`='$friday4',`friday5`='$friday5' WHERE Class IS NULL";

        mysqli_query($conn,$sqlC);
    ?>
    <body>Timetables uploaded.
        <form method="POST" action="adminMM.php">
    <button type="submit">Return</button>
    </form>
    
    </body>
    </html>