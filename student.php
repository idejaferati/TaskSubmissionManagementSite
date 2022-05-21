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

    <form action="dbconfig/studentRegistration.php" method="post" id="studentRegistrationForm">
        <input type="text" name="fname" placeholder="Shkruani emrin tuaj">
        <input type="text" name="lname" placeholder="Shkruani mbiemrin tuaj">
        <input type="text" name="regNumber" placeholder="Shkruani numrin e ID-se tuaj">
        <input type="text" name="username" placeholder="Shkruani username-in tuaj">
        <input type="number" name="semester" placeholder="Shkruani semestrin qe po ndjekni tani">
        <input type="email" name="email" placeholder="Shkruani email-in tuaj">
        <input type="password" name="password" placeholder="Zgjedhni nje password">
        <input type="submit" name="student_register" value="Regjistrohu">
    </form>
    </section>

    <footer>
         <a href="index.php">Kthehu tek faqja kryesore</a> 
    </footer>
    
    <!-- <script src="js/student.js"></script> -->
</body>
</html>