


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
    $id = $_SESSION['adminId'];

$name = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['name'])));
$email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
$password = $_POST['password'];
$confirm_password =$_POST['confirm_password'];
$errors =[];

// validation
// name
if (empty($name)){
    $errors [] = "name is required";
}elseif(! is_string($name)){
$errors[] = "name must be string ";
}elseif(strlen($name) > 200 ){
    $errors[] = "name max is 200 chars ";
    }


//email
    if (empty($email)){
        $errors [] ="sorry, email is required";
    }elseif (! filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors [] ="sorry, email is not valid";
    }elseif(strlen($email) > 255){
        $errors [] ="sorry, email max 255 chatacter";
    }

//password

if (! empty($password)){

 if(strlen($password) < 3 or strlen($password) > 100){
    $errors [] = "password between 4 and 100 chars ";
}elseif($password != $confirm_password){
    $errors [] = "password  dont match ";
}

$hashed_password = password_hash($password,PASSWORD_DEFAULT);
}

if (empty($errors)){

    if (! empty($password)){

    $sql = "UPDATE  admins SET name = '$name',
    email = '$email',
    `password` = '$hashed_password'
     where id = $id";
     
    }else{

        $sql = "UPDATE  admins SET name = '$name',
        email = '$email'
        where id = $id";
    }
    $result = mysqli_query($conn, $sql);
    if ( $result) {
         $_SESSION['success'] = "upated successfuly ";
         $_SESSION['adminName'] = $name;
         header("location:../edit-profile.php");
        } else {
            $_SESSION['errors'] = " failed to update";
            header("location:../edit-profile.php");
         
        }
mysqli_close($conn);

}else{
    $_SESSION['errors'] = $errors;
    header("location:../edit-profile.php?id=$id");
}
   
    
}



?>