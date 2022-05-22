<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal per regjistrimin e studenteve</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body id="studentPortal">
    <section id="studentForm">
    <header>
        <h1>
        Regjistrohu si nje student
        </h1>
    </header>

    <form name="studentRegisterForm" action="dbconfig/studentRegistration.php" method="post" onsubmit="return validate()" id="studentRegistrationForm">
        <input required type="text" autocomplete="off" name="fname" placeholder="Shkruani emrin tuaj">
        <input required type="text" autocomplete="off" name="lname" placeholder="Shkruani mbiemrin tuaj">
        <input required type="text" autocomplete="off" name="regNumber" placeholder="Shkruani numrin e ID-se tuaj">
        <input required type="text" autocomplete="off" name="username" placeholder="Shkruani username-in tuaj">
        <input required type="number"autocomplete="off" name="semester" placeholder="Shkruani semestrin qe po ndjekni tani">
        <input required type="email" autocomplete="off" name="email" placeholder="Shkruani email-in tuaj">
        <input required type="password" autocomplete="off" name="password" placeholder="Zgjedhni nje password">
        <input required type="submit" autocomplete="off" name="student_register" value="Regjistrohu">
    </form>
    </section>

    <footer>
         <a href="index.php">Kthehu tek faqja kryesore</a> 
    </footer>
    
    <!-- <script src="js/student.js"></script> -->
</body>
</html>

<script type="text/javascript"> 

function validate() {
 
    var usercheck = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;
    var fnamecheck = /^[A-Za-z. ]{3,20}$/;
    var lnamecheck = /^[A-Za-z. ]{3,20}$/;
    var emailcheck = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
    var pswcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9@#$%^&*]{8,15}$/;
    var number= /^[1-9]+[0-9]*$/;

 var name = document.forms["studentRegisterForm"]["fname"].value;
 if(!fnamecheck.test(name)){
 alert("Please enter a valid name!");
 return false;
 }
 if(nam)

 var lname = document.forms["studentRegisterForm"]["lname"].value;
 if(!lnamecheck.test(lname)){
 alert("Please enter a valid last name!");
 return false;
 }
 var regnumber = document.forms["studentRegisterForm"]["regNumber"].value;
 if(!number.test(regnumber)){
 alert("Please enter your ID");
 return false;
 }
 
 var username = document.forms["studentRegisterForm"]["username"].value;
 if(!usercheck.test(username)){
 alert("Please enter a username");
 return false;
 } 

 var pass = document.forms["studentRegisterForm"]["password"].value;
 if(!pswcheck.test(password)){
 alert("Please enter a password");
 return false;
 }
 var email = document.forms["studentRegisterForm"]["email"].value;
 
 if(!emailcheck.test(email)){
     
 alert("Please enter the email");
 return false;
 }
 else { return true; }  
 
}
</script>


