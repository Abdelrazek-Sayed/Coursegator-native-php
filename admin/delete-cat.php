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

    $sql = "DELETE FROM cats where id = $id";
   // $result = mysqli_query($conn,$sql);

    if (mysqli_query($conn,$sql) == true) {
        $_SESSION['success'] = "Deleted Successfully";
    }
    header("location:all-cats.php");
}


?>