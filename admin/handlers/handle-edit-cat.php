


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
                $id = $_GET['id'];

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

            $sql = "UPDATE  cats SET name = '$name' where id =$id";
            $result = mysqli_query($conn, $sql);
            if ( $result) {
            $_SESSION['success'] = "upated successfuly ";
            header("location:../all-cats.php");
            } else {
            $_SESSION['errors'] = " failed to update";
            header("location:../edit-cat.php");

            }

            mysqli_close($conn);

            }else{
            $_SESSION['errors'] = $errors;
            header("location:../edit-cat.php?id=$id");
            }


            }



?>