<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

    include "config.php";

if (isset($_POST['notimi'])&& isset($_POST['taskid'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$notimi = validate($_POST['notimi']);
    $task=validate($_POST['taskid']);
    if(empty($notimi)){
      header("Location: ../profesor/dorezimet_p.php");
	  exit();
    }
   else {
    
        $id = $_SESSION['id'];

        $sql = "SELECT grade_d
                FROM tasks_done WHERE 
                id_td='$task'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE tasks_done
        	          SET grade_d='$notimi'
        	          WHERE id_td='$task'";
        	mysqli_query($conn, $sql_2);
        	header("Location: ../profesor/vleresimet_p.php");
	        exit();

        }else {
        	header("Location: ../profesor/dorezimet_p.php");
	        exit();
        }

    }

    
}else{
	header("Location: ../profesor.dorezimet_p.php");
	exit();
}

}else{
     header("Location: ../login.php");
     exit();
}