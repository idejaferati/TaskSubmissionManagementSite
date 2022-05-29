<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

    include "config.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	
    	$np = md5($np);
		$op=md5($op);
        $id = $_SESSION['id'];

        $sql = "SELECT password
                FROM profesor WHERE 
                id_p='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE profesor
        	          SET password='$np'
        	          WHERE id_p='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: ../profesor/profile_p.php");
	        exit();

        }else {
        	header("Location: change-password.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: ../ndryshopassword.php");
	exit();
}

}else{
     header("Location: ../login.php");
     exit();
}