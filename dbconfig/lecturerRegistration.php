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
    $role="profesor";
    $hashedpassword= md5($userPassword);
    $sql=" INSERT INTO profesor(id_p,name_p,surname_p,email_p,username,password,role) VALUES ('$userRegNumber','$userFname','$userLname','$email','$userName','$hashedpassword','$role')";
    if (mysqli_query($conn, $sql)) {
      echo "New record has been added successfully !";
   } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
   }

   mysqli_close($conn);
}
?>



