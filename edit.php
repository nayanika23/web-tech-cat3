<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{   
    $id = $_POST['student_id'];
    
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
              
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE stuinfo SET stu_id='$student_id',stu_name='$name',age='$age',gender='$gender',course='$course',address='$address' WHERE stu_id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['student_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE stu_id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $student_id = $res['student_id'];
    $age = $res['age'];
    $gender = $res['gender'];
    $course = $res['course'];
    $address = $res['address'];
}
?>
<html>
<head>  
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
        <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Student Id</td>
                <td><input type="text" name="student_id" value="<?php echo $student_id;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $age;?>"></td>
            </tr>
            <tr> 
              <td>Gender</td>
              <td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
          </tr>
          <tr> 
            <td>Course</td>
            <td><input type="text" name="course" value="<?php echo $course;?>"></td>
        </tr>
        <tr> 
          <td>Address</td>
          <td><input type="text" name="address" value="<?php echo $address;?>"></td>
      </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>