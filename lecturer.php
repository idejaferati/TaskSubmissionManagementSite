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

    <form action="dbConfig/lecturerRegistration.php" method="post">
        <input type="text" name="fname" placeholder="Shkruani emrin tuaj">
        <input type="text" name="lname" placeholder="Shkruani mbiemrin tuaj">
        <input type="text" name="regNumber" placeholder="Shkruaj numrin e id-se tuaj">
        <input type="text" name="username" placeholder="Zgjedhni nje username">
        <input type="text" name="email" name="email" placeholder="Shkruani email-in tuaj">
        <input type="password" name="password" placeholder="Zgjedhni nje password">
        <input type="submit" name="lec_register" value="Regjistrohu">
    </form>
     <a href="index.php">Kthehuni tek faqja kryesore</a> 
    </section>

    <footer>
    <script src="js/lecturer.js"></script>
    </footer>
 
</body>
</html>