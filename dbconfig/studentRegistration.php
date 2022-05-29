<?php

include_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $userFname      = $_POST['fname'];
    $userLname      = $_POST['lname'];
    $userRegNumber  = $_POST['regNumber'];
    $userName       = $_POST['username'];
    $email          = $_POST['email'];
    $userPassword   = $_POST['password'];
    $register       = $_POST['student_register'];
    $semester       =$_POST['semester'];
    $role="student";
    $hashedpassword= md5($userPassword);
    $sql=" INSERT INTO student(email_s,id_s,name_s,password_s,role,surname_s,username_s,semestri_s) VALUES ('$email','$userRegNumber','$userFname','$hashedpassword','$role','$userLname','$userName','$semester')";
    if (mysqli_query($conn, $sql)) {
      header("Location: ../login.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     mysqli_close($conn);
}
?>



