<?php

include_once 'config.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$idLendes=$_POST['id_l'];
  
    $semestri      = $_POST['semestri'];
    $profid=$_SESSION['id'];
    $sql=" UPDATE lendet SET semestri_l='$semestri' WHERE id_l='$idLendes'";
    mysqli_query($conn, $sql);
 
        header("location: ../profesor/lendet_p.php");
  
     mysqli_close($conn);
}
?>