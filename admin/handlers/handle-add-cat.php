


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

if (isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['name'])));

$errors =[];

// validation
if (empty($name)){
    $errors [] = "name is required";
}elseif(! is_string($name)){
$errors[] = "name must be string ";
}elseif(strlen($name) > 200 ){
    $errors[] = "name max is 200 chars ";
    }

if (empty($errors)){

    $sql = "INSERT INTO cats (name) values ('$name')";
    $result = mysqli_query($conn, $sql);
    if ( $result) {
         $_SESSION['success'] = "added successfuly ";
         header("location:../all-cats.php");
        } else {
            $_SESSION['errors'] = " failed to add";
            header("location:../add-cat.php");
         
        }

mysqli_close($conn);

}else{
    $_SESSION['errors'] = $errors;
    header("location:../add-cat.php");
}
   
    
}



?>