<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['submit'])) {   
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $address = $_POST['address'];
  
        
    // checking empty fields
    if(empty($name) || empty($age) || empty($student_id) || empty($gender)|| empty($course)|| empty($address)) {              
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($student_id)) {
            echo "<font color='red'>Student id field is empty.</font><br/>";
        }
        if(empty($gender)) {
            echo "<font color='red'>Gender field is empty.</font><br/>";
        }
        if(empty($course)) {
            echo "<font color='red'>Course field is empty.</font><br/>";
        }
        if(empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO stuinfo (`stuid`,`stu_name`,`age`,`gender`,`course`,`address`) VALUES('$student_id','$name','$age','$gender','$course','$address')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>