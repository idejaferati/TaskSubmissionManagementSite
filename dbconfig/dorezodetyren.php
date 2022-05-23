<?php
include_once 'config.php';
session_start();

  $msg = "";
 
  // If upload button is clicked ...
  if (isset($_POST['dorezodetyren'])&& isset($_POST['lenda'])&& isset($_POST['detyra'])&& isset($_POST['semestri'])&& isset($_POST['Filename'])) {
 
    $filename = $_FILES["Filename"]["name"];
    $tempname = $_FILES["Filename"]["tmp_name"];   
        $folder = "uploads/".$filename;
    $emrilendes=$_POST['lenda'];
 
        // Get all the submitted data from the form
$id_s=$_SESSION['id'];
$sql1="Select distinct(id_t) from tasks INNER JOIN lendet ON tasks.lendaid_t=lendet.id_l Where lendet.name_l=$emrilendes";
$id_t=mysqli_query($conn,$sql);
$koha=curdate();
        $sql = "INSERT INTO tasks_done (id_t,id_s,date_d,content_d)VALUES ('$id_t','$id_s','$koha','$filename')";
 
        // Execute query
        mysqli_query($conn, $sql);
         
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
  $result = mysqli_query($db, "SELECT * FROM tasks_done");
?>