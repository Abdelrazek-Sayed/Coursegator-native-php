


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
$desc = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['desc'])));
$cat_id = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['cat_id'])));

$img  = $_FILES['img'] ;

$imgName = $img['name'];
$imgTmpName = $img['tmp_name'];
$imgSize = $img['size'];
$imgType = $img['type'];
$imgError = $img['error'];

$errors =[];

// validation

//name
if (empty($name)){
    $errors [] = "name is required";
}elseif(! is_string($name)){
$errors[] = "name must be string ";
}elseif(strlen($name) > 200 ){
    $errors[] = "name max is 200 chars ";
    }

//desc
if (empty($desc)){
    $errors [] = "descsription is required";
}elseif(! is_string($desc)){
    $errors[] = "descsription must be string ";
}
//desc
if (empty($cat_id)){
    $errors [] = "cat_id is required";
}

// img -no errors -available extension - max size 2 mb 
$allowedExt = ['jpg','png','gif','jpeg'];
 $imgExt = pathinfo($imgName,PATHINFO_EXTENSION);
 $imgSizeMb = $imgSize/(1024 ** 2);

 // 
 if ($imgError != 0){
    $errors [] = "error while uploading image";
 }elseif ($imgSizeMb > 2){
    $errors [] = "size must be less than 2 mb";
 }elseif(! in_array($imgExt,$allowedExt)){
    $errors [] = "not valid extension allowed extensions are 'jpg','png','gif','jpeg' ";
 }

if (empty($errors)){

$randstr = uniqid();
// new name 
$imgNewName = "$randstr.$imgExt";
// save img with new img
move_uploaded_file($imgTmpName,"../assets/img/courses/$imgNewName");


    $sql = "INSERT INTO courses (name,`desc`,cat_id, img )
     values ('$name','$desc','$cat_id','$imgNewName')";
     $result = mysqli_query($conn, $sql);



    if ( $result) {
         $_SESSION['success'] = "added successfuly ";
         header("location:../all-courses.php");
        } else {
            $_SESSION['errors'] = " failed to add";
            header("location:../add-course.php");
         
        }

mysqli_close($conn);

}else{
    $_SESSION['errors'] = $errors;
    header("location:../add-course.php");
}
   
    
}



?>