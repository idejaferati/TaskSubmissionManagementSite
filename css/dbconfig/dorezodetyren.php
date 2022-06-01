<?php
include_once 'config.php';
session_start();

  $msg = "";
 
  // If upload button is clicked ...
  if (isset($_FILES['Filename']) && isset($_POST['dorezodetyren'])&&$_POST['lenda']) {

    $filename = $_FILES["Filename"]["name"];
    $tempname = $_FILES["Filename"]["tmp_name"];   
        $folder = "../uploads/".$filename;
    $emrilendes=$_POST['lenda'];
 
        // Get all the submitted data from the form
		

		$query1="Select tasks.id_t from tasks INNER JOIN lendet ON tasks.lendaid_t=lendet.id_l Where lendet.name_l='$emrilendes'";
		$result=$conn->query($query1);
		while($row=$result->fetch_assoc()){
			$id_t=$row['id_t'];
	
		}
$id_s=$_SESSION['id'];
date_default_timezone_set('UTC');
$date = date('Y-m-d');
        $sql = "INSERT INTO tasks_done (id_t,id_s,date_d,content_d)VALUES
		 ('$id_t','$id_s','$date','$filename')";
 
        // Execute query(Select distinct(tasks.id_t) from tasks INNER JOIN lendet ON tasks.lendaid_t=lendet.id_l Where lendet.name_l=$emrilendes)
        mysqli_query($conn, $sql);
		echo "mire";
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
			header("Location:../student/detyrat_s.php");
		
        }else{
            $msg = "Failed to upload image";
      }
  }

?>