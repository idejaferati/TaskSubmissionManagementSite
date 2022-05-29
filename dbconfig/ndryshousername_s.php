<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

    include "config.php";

if (isset($_POST['username']) && isset($_POST['op'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$op = validate($_POST['op']);

    
    if(empty($op)){
      header("Location: change-password.php?error= Password is required");
	  exit();
    }else if(empty($username)){
      header("Location: ../profesor/ndryshousername.php?error=New username is required");
	  exit();
    }
   else {
    	// hashing the password
    	
    	$op = md5($op);
        $id = $_SESSION['id'];

        $sql = "SELECT username_s
                FROM student WHERE 
                id_s='$id' AND password_s='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE student
        	          SET username_s='$username'
        	          WHERE id_s='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: ../student/profile_s.php");
	        exit();

        }else {
        	header("Location: change-password.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: ../ndryshousername.php");
	exit();
}

}else{
     header("Location: ../login.php");
     exit();
}