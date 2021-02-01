<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursat";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



if (isset($_GET['id'])){

    $id = $_GET['id'];
    $imgOldName = $_GET['imgOldName'];

    unlink("assets/img/courses/$imgOldName");

    $sql = "DELETE FROM courses WHERE id = $id";

    if (mysqli_query($conn,$sql) == true ){

        $_SESSION['success'] = "you deleted course successfully";
         

    }

    header("location:all-courses.php");
}


?>