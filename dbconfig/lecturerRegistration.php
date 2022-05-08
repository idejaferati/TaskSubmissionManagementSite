<?php

include_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $userFname      = $_POST['fname'];
    $userLname      = $_POST['lname'];
    $userRegNumber  = $_POST['regNumber'];
    $userName       = $_POST['username'];
    $email          = $_POST['email'];
    $userPassword   = $_POST['password'];
    $register       = $_POST['lec_register'];
    $role="lecturer";
    $sql=" INSERT INTO users(email,id,name,password,role,surname,username) VALUES ('$email','$userRegNumber','$userFname','$userPassword','$role','$userLname','$userName')";
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     mysqli_close($conn);
}
?>



