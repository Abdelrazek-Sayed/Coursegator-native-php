<?php

session_start();
include("../inc/conn-open.php");

if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['name'])));
    $email = mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['email'])));
    $phone = mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['phone'])));
    $spec =mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['spec'])));
    $courseId = mysqli_real_escape_string($conn,trim(htmlspecialchars($_POST['course_id'])));
    

  

// validation 
$errors = [];

// name required - string -length
if (empty($name)){
    $errors [] ="sorry, name is required";
}elseif (! is_string($name)){
    $errors [] ="sorry, name must be string";
}elseif(strlen($name) > 255){
    $errors [] ="sorry, name max 255 chatacter";

}
// email required - email -length
if (empty($email)){
    $errors [] ="sorry, email is required";
}elseif (! filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors [] ="sorry, email is not valid";
}elseif(strlen($email) > 255){
    $errors [] ="sorry, email max 255 chatacter";
}


// phone required - string -length
if (empty($phone)){
    $errors [] ="sorry, phone is required";
}elseif (!is_string($phone)){
    $errors [] ="sorry, phone must be string";
}elseif(strlen($phone) > 255){
    $errors [] ="sorry, phone max 255 chatacter";
}
// spec     string -length
if (! empty($spec)) {
    if (! is_string($spec)) {
        $errors [] ="sorry, faculty must be string";
    } elseif (strlen($spec) > 255) {
        $errors [] ="sorry, faculty max 255 chatacter";
    }
}
// course_id required  
if (empty($courseId)) {
    $errors [] ="sorry, you must select course";
}




//

if (empty($errors)){

    $sql = "INSERT INTO reservations(name, email, phone, spec,course_id)
    VALUES  ('$name','$email','$phone','$spec','$courseId')";
     

    if ( mysqli_query($conn,$sql)){
        $_SESSION['success'] = "successful enrollment";

    }else {
        $_SESSION['queryError'] = "queryError";
    }
    
    mysqli_close($conn);
 
    
}else {


$_SESSION['errors'] = $errors;
}
header("location:../enroll.php");
}


?>