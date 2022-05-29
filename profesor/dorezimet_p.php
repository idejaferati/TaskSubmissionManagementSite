<?php
include("../dbconfig/config.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dorezimet</title>
    <link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/lendet_p.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<header id="header">
        <!--jscode-->
   </header>
    <nav class="menu-nav">
        <div class="menu" style="text-align: center;">
        <a href="../profesor/home_p.php">Home</a>
             <a href="../profesor/lendet_p.php">Lendet</a>
             <a href="../profesor/vleresimet_p.php">Vleresimet</a>
             <a href="../profesor/dorezimet_p.php"><span class="current-page">Dorezimet</span></a>
             <a href="../profesor/faq_p.php">FAQ</a>
             <a href="../profesor/profile_p.php">Profili</a>
             
         </div>
       </nav>
<div class="container">
 <div class="row">
   <div class="col-sm-8">

    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>
     
         <th>Emri</th>
         <th>Mbiemri
         </th>
         <th>Emri i detyres</th>
         <th>Data e dorezimit</th>
         <th>Permbajtja</th>
         <th>Notimi</th>
    </thead>
    <tbody>

  <?php
  $profid=$_SESSION['id'];
     $sql="SELECT tasks_done.id_td,name_s,surname_s,emri_t,date_d,content_d,grade_d
     FROM tasks_done
     
     INNER JOIN student ON tasks_done.id_s=student.id_s
     INNER JOIN tasks ON tasks_done.id_t=tasks.id_t
     WHERE profesorid_t=$profid AND grade_d IS NULL";
    
     $result=$conn->query($sql);

     if(!$result){
         die("Invalid query: ".$conn->error);
     }

    while($row=$result->fetch_assoc()){
     
      $idtask=$row["id_td"];
      ?>
      <tr>

      <td><?php echo $row["name_s"] ?></td>
      <td><?php echo $row["surname_s"] ?></td>
      <td><?php echo $row["emri_t"]?></td>
      <td><?php echo $row["date_d"]?></td>
      <td><a href="../uploads/<?php echo $row["content_d"] ?>" target="_blank">Permbajtja</a></td>
      <td><form action="../dbconfig/notoSetUp.php" method="post" id="noto">
      <input type="number" name="notimi">
      <input type="hidden" name="taskid" value="<?php echo $idtask ?>">
      <input type="submit" name="shtolende_btn" value="Ruaj"></form></td>

     </tr>
     <?php
    }
    ?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>