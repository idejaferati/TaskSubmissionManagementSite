<?php
/*
IF(ISSET($_GET["error"])){
    if ($_GET["error"]=="emptyinput"){
        echo "<p>Fill in all fields!</p>";
    }
    else id($_GET["error"]=="wronglogin"){
        echo "<p>Incorrent login information!</p>";
    }
}
if(isset($_POST["SUBMIT"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $choice=$_POST["loginAS"];

    require_once "config.php";
    require_once "func.inc.php";



    if(emptyInputLogin($username,$pwd)!==false){
        if($choice==='student')
        header("location: ../student/home.php");
        else if($choice==='profesor'){
            header("location: ../profesor/home.php");
            else{
                echo "Something is wrong with the login form"
            }
        }
        exit();
    }
    loginUser($conn,$username,$pwd);
}
else{
    header("location: ../dbconfig/loginSetUp");
    exit();
}

*/
session_start(); 

include "config.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);
    $choice=$_POST['loginAS'];

    if (empty($email)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{
        if($choice==='profesor'){

        $sql = "SELECT * FROM profesor WHERE email_p='$email' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email_p'] === $email && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email_p'];

                $_SESSION['name'] = $row['name_p'];

                $_SESSION['id'] = $row['id_p'];

                header("Location: ../profesor/home_p.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }
    else{
        $sql = "SELECT * FROM student WHERE email_s='$email' AND password_s='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email_s'] === $email && $row['password_s'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email+s'];

                $_SESSION['name'] = $row['name_s'];

                $_SESSION['id'] = $row['id_s'];

                header("Location: ../student/home_s.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }
}
}
else{

    header("Location: index.php");

    exit();
}

    
