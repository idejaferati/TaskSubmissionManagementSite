<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student registration portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body id="studentPortal">
    <section id="studentForm">
    <header>
        <h1>
            Register as a lecturer
        </h1>
    </header>

    <form action="dbConfig/lecturerRegistration.php" name="lecReg" onsubmit="return validatelec()" method="post">
        <input required autocomplete="off" type="text" name="fname" placeholder="Shkruani emrin tuaj">
        <input required autocomplete="off" type="text" name="lname" placeholder="Shkruani mbiemrin tuaj">
        <input required autocomplete="off" type="text" name="regNumber" placeholder="Shkruaj numrin e id-se tuaj">
        <input required autocomplete="off" type="text" name="username" placeholder="Zgjedhni nje username">
        <input required autocomplete="off" type="text" name="email" placeholder="Shkruani email-in tuaj">
        <input required autocomplete="off" type="password" name="password" placeholder="Zgjedhni nje password">
        <input type="submit" name="lec_register" value="Regjistrohu">
    </form>
     <a href="index.php">Kthehuni tek faqja kryesore</a> 
    </section>

    <footer>
    <script src="js/lecturer.js"></script>
    </footer>
 
</body>
</html>

<script type="text/javascript"> 

function validatelec() {
 
    var usercheck = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;
    var fnamecheck = /^[A-Za-z. ]{3,20}$/;
    var lnamecheck = /^[A-Za-z. ]{3,20}$/;
    var emailcheck = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
    var pswcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9@#$%^&*]{8,15}$/;
    var number= /^[1-9]+[0-9]*$/;

 var name = document.forms["lecReg"]["fname"].value;
 if(!fnamecheck.test(name)){
 alert("Please enter a valid name!");
 return false;
 }
 if(nam)

 var lname = document.forms["lecReg"]["lname"].value;
 if(!lnamecheck.test(lname)){
 alert("Please enter a valid last name!");
 return false;
 }
 var regnumber = document.forms["lecReg"]["regNumber"].value;
 if(!number.test(regnumber)){
 alert("Please enter your ID");
 return false;
 }
 
 var username = document.forms["lecReg"]["username"].value;
 if(!usercheck.test(username)){
 alert("Please enter a username");
 return false;
 } 

 var pass = document.forms["lecReg"]["password"].value;
 if(!pswcheck.test(password)){
 alert("Please enter a password");
 return false;
 }
 var email = document.forms["lecReg"]["email"].value;
 
 if(!emailcheck.test(email)){
     
 alert("Please enter the email");
 return false;
 }
 else { return true; }  
 
}
</script>
