<?php

include_once 'config.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $EmriLendes      = $_POST['lenda'];
    $semestri      = $_POST['semestri'];
    $profid=$_SESSION['id'];
    $sql=" UPDATE lendet SET semestri_l='$semestri' WHERE name_l='$EmriLendes' AND profesorid_l='$profid'";
    if (mysqli_query($conn, $sql)) {
        echo "Lenda u modifikua me sukses!";
        header("location: ../profesor/lendet_p.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     mysqli_close($conn);
}
?>