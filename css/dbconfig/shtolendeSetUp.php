<?php

include_once 'config.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $EmriLendes      = $_POST['lenda'];
    $semestri      = $_POST['semestri'];
  
    $profid=$_SESSION['id'];
    $sql=" INSERT INTO lendet(name_l,semestri_l,profesorid_l) VALUES ('$EmriLendes','$semestri','$profid')";
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        header("location: ../profesor/lendet_p.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     mysqli_close($conn);
}
?>