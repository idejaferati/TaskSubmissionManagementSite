
<?php
include("../dbconfig/config.php");
session_start();
$commentNewCount=$_POST['vleresimetNewCount'];
<header id="header">
<!--jscode-->
</header>
<nav class="menu-nav">
<div class="menu" style="text-align: center;">
<a href="../profesor/home_p.php">Home</a>
     <a href="../profesor/lendet_p.php">Lendet</a>
     <a href="../profesor/vleresimet_p.php"><span class="current-page">Vleresimet</span></a>
     <a href="../profesor/dorezimet_p.php">Dorezimet</a>
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
$sql="SELECT name_s,surname_s,emri_t,date_d,content_d,grade_d
FROM tasks_done

INNER JOIN student ON tasks_done.id_s=student.id_s
INNER JOIN tasks ON tasks_done.id_t=tasks.id_t
WHERE profesorid_t=$profid AND grade_d IS NOT NULL LIMIT $commentNewCount";

$result=$conn->query($sql);

if(!$result){
 die("Invalid query: ".$conn->error);
}

while($row=$result->fetch_assoc()){
?>
<tr>
<td><?php echo $row["name_s"] ?></td>
<td><?php echo $row["surname_s"] ?></td>
<td><?php echo $row["emri_t"] ?></td>
<td><?php echo $row["date_d"]?></td>
<td><a href="../uploads/<?php echo $row["content_d"] ?>" target="_blank">Permbajtja</a></td>
<td><?php echo $row["grade_d"] ?></td>

</tr>
<?php
}
?>
<button>Shfaq me shume vleresime</button>
</tbody>
</table>
</div>
</div>
</div>
</div>
?>