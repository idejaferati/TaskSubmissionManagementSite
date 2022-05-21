<?php
function emptyInputLogin_p($email,$password,$choice){
    $result;
    if(empty($email)|| empty($password)|| empty($choice)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function uidExists($conn, $email){
    $sql="SELECT * FROM profesor Where email_p=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php/error=stmtfailed");
        exit();
    }
}
function loginUser($conn,$email,$pwd){
    $uidExists=uidExists($conn,$email);

    if($uidExists===false){
        header("location:../login.php?error=wronglogin");
        exit();
    }
    $hashedpassword=$uidExists["password"];
    $checkPwd=password_verify($pwd,$hashedpassword);
    if($checkPwd===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else
{
    session_start();
    $_SESSION["id_p"]=$uidExists["useraId"];
    $_SESSION["seruid"]=$uidExists["usersUid"];
    header("location: ../profesor/main.php");
    exit();

}}