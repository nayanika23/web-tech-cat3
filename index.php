<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM stuinfo"); // using mysqli_query instead
?>

<html>
<head>  
    <title>Homepage</title>
</head>

<body>
    <a href="add.html">Add New Data</a><br/><br/>

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Student-id</td>
            <td>Name</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Course</td>
            <td>Address</td>
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['stu_id']."</td>";
            echo "<td>".$res['stu_name']."</td>";
            echo "<td>".$res['age']."</td>";  
            echo "<td>".$res['gender']."</td>";
            echo "<td>".$res['course']."</td>";
            echo "<td>".$res['address']."</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
        }
        ?>
    </table>
</body>
</html>