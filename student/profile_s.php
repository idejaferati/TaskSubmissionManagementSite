
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/lendet_p.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/profile.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
             <a href="../student/dorezodetyren_s.php">Dorezo detyren</a>
             <a href="../student/faq_s.php">FAQ</a>
             <a href="../student/profile_s.php"><span class="current-page">Profili</span></a>
         </div>
       </nav>
       <?php

?>

<div id="center">
<div id="center-set">

<div id="contentbox">
<?php
$id=$_SESSION['id'];
$sql="SELECT * FROM student where id_s=$id";
$result=mysqli_query($conn,$sql);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>
<div id="signup">
<div id="signup-st">
<form action="" method="POST" id="signin" id="reg">
<div id="reg-head" class="headrg">Profili yt</div>
<table border="0" align="center" cellpadding="2" cellspacing="0">
<tr id="lg-1">
<td class="tl-1"> <div align="left" id="tb-name">Reg id:</div> </td>
<td class="tl-4"><?php echo $rows['id_s']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Username:</div></td>
<td class="tl-4"><?php echo $rows['username_s']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Emri Mbiemri:</div></td>
<td class="tl-4"><?php echo $rows['name_s']; ?> <?php echo $rows['surname_s']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Email:</div></td>
<td class="tl-4"><?php echo $rows['email_s']; ?></td>
</tr>
<tr id="lg-1">
<td class="tl-1"><div align="left" id="tb-name">Pozita:</div></td>
<td class="tl-4"><?php echo $rows['role']; ?></td>
</tr>
</table>
<div>
  <div id="buttonform">
    <button name="submit" type="submit" value="Save"  class="button"><a href="../dbconfig/logout.php">Dil</a></button>
    <button name="submit" type="submit" value="Cancel"  class="button"><a href="ndryshousername.php">Ndrysho username-in</a></button>
    <button name="submit" type="submit" value="Cancel"  class="button"><a href="ndryshopassword.php">Ndrysho fjalekalimin</a></button>
    <p id="saved"></p>
  </div>
</div>

</form>
</div>
</div>


<?php 
// close while loop 
}
?>

</br>
</body>
</html>
       <footer id="footer">
        <!--jscode-->
   </footer>


</body>
</html>