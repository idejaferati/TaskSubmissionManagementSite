
<?php
session_start();
include("../dbconfig/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <script src="../js/header_footer.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/home.css" type="text/css" media="all">

</head>
<body id="home_page">
    <header id="header">
        <!--jscode-->
   </header>
    <nav class="menu-nav">
        <div class="menu">
        <a href="../student/home_s.php">Home </a>
             <a href="../student/lendet_s.php">Lendet</a>
             <a href="../student/detyrat_s.php">Detyrat</a>
             <a href="../student/vleresimet_s.php">Vleresimet</a>
             <a href="../student/dorezodetyren_s.php"><span class="current-page">Dorezo detyren</span></a>
             <a href="../student/faq_s.php">FAQ</a>
             <a href="../student/profile_s.php">Profili</a>
             
         </div>
       </nav>
       <?php
session_start();
?>


<section id="login">
        <h1>Dorezo detyren</h1>

        <form name="dorezo" action="../dbconfig/dorezodetyren.php" method="post">
        <input type="text" name="lenda" placeholder="Shkruaj emrin e lendes qe deshironi te dorezoni detyren">
            <input type="text" name="detyra" placeholder="Shkruaj emrin e detyres qe deshironi te dorezoni">
            <input type="number" name="semestri" placeholder="Zgjedh semestrin">
            <p style="color:white; margin-left:40px;">Bashkangjit detyren :</p>
           <input type="file" name="Filename"> 
            <input type="submit" name="dorezodetyren" value="Dorezo">
      
        </form>

    </section>

</br>
</body>
</html>
       <footer id="footer">
        <!--jscode-->
   </footer>


</body>
</html>