<?php
require '../dbconfig/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="FIEK">
<meta hhtp-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Detyrat</title>
<!-- Latest compiled and minified CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="../js/header_footer.js"></script>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
</head>
<body>
<header id="header">
        <!--jscode-->
   </header>

    <nav class="menu-nav">
        <div class="menu">
             <a href="../student/home_s.php">Home </a>
             <a href="../student/lendet_s.php"><span class="current-page">Lendet</span></a>
             <a href="../student/detyrat_s.php">Detyrat</a>
             <a href="../student/vleresimet_s.php">Vleresimet</a>
             <a href="../student/dorezodetyren_s.php">Dorezo detyren</a>
             <a href="../student/faq_s.php">FAQ</a>
             <a href="../student/profile_s.php">Profili</a>
             
         </div>
       </nav>
       <br>
       <br>
<br>
<h3 class="text-center text-light bg-secondary">Detyrat e mia</h3>
<div class"container-fluid">
    <div class="row">
       
        <div class="col-lg-9">
            <h5 class="text-center" id="textChange">Te gjitha detyrat</h5>
            <hr>

        <div class="text-center">
        <img src="../photo/loader.gif" id="loader" widht="200" style="display:none;">
        </div>
        <h3>Semestri 1</h3>
        <div class="row" id="result">
            
            <?php
            $id=$_SESSION['id'];
            $sql="Select lendet.name_l, tasks.emri_t, tasks_done.grade_d, tasks.pershkrimi_t, lendet.semestri_l from lendet
            INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
            INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
            INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
             AND tasks_done.id_s=$id AND semestri_l=1";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../photo/uni_logo.png" class="card-img-top">
                        
                        <div class="card-body">
                        <h6 class="text-light bg-secondary text-center rounded p-1"><?=$row['name_l']; ?></h6> 
                            <h4 class="card-title text-danger">Semestri: <?= number_format($row['semestri_l']);?></h4>
                            <p>
                                Detyra: <?=$row['emri_t'];?><br>
                                Nota: <?=$row['grade_d'];?><br>
                                Pershkrimi: <?=$row['pershkrimi_t'];?><br>               
                            </p>
                            <a href="#" class="btn btn-danger  btn-block">Me shume</a>

                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <h3>Semestri 2</h3>
        <div class="row" id="result">
            
            <?php
            $sql="Select lendet.name_l, tasks.emri_t, tasks_done.grade_d, tasks.pershkrimi_t, lendet.semestri_l from lendet
            INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
            INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
            INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
             AND tasks_done.id_s=$id AND semestri_l=2";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../photo/uni_logo.png" class="card-img-top">
                        
                        <div class="card-body">
                        <h6 class="text-light bg-secondary text-center rounded p-1"><?=$row['name_l']; ?></h6> 
                            <h4 class="card-title text-danger">Semestri: <?= number_format($row['semestri_l']);?></h4>
                            <p>
                                Detyra: <?=$row['emri_t'];?><br>
                                Nota: <?=$row['grade_d'];?><br>
                                Pershkrimi: <?=$row['pershkrimi_t'];?><br>               
                            </p>
                            <a href="#" class="btn btn-danger  btn-block">Me shume</a>

                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <h3>Semestri 3</h3>
        <div class="row" id="result">
            
            <?php
            $id=$_SESSION['id'];
            $sql="Select lendet.name_l, tasks.emri_t, tasks_done.grade_d, tasks.pershkrimi_t, lendet.semestri_l from lendet
            INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
            INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
            INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
             AND tasks_done.id_s=$id AND semestri_l=3";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../photo/uni_logo.png" class="card-img-top">
                        
                        <div class="card-body">
                        <h6 class="text-light bg-secondary text-center rounded p-1"><?=$row['name_l']; ?></h6> 
                            <h4 class="card-title text-danger">Semestri: <?= number_format($row['semestri_l']);?></h4>
                            <p>
                                Detyra: <?=$row['emri_t'];?><br>
                                Nota: <?=$row['grade_d'];?><br>
                                Pershkrimi: <?=$row['pershkrimi_t'];?><br>               
                            </p>
                            <a href="#" class="btn btn-danger  btn-block">Me shume</a>

                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>  
        <h3>Semestri 4</h3>
        <div class="row" id="result">
            
            <?php
            $id=$_SESSION['id'];
            $sql="Select lendet.name_l, tasks.emri_t, tasks_done.grade_d, tasks.pershkrimi_t, lendet.semestri_l from lendet
            INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
            INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
            INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
             AND tasks_done.id_s=$id AND semestri_l=4";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../photo/uni_logo.png" class="card-img-top">
                        
                        <div class="card-body">
                        <h6 class="text-light bg-secondary text-center rounded p-1"><?=$row['name_l']; ?></h6> 
                            <h4 class="card-title text-danger">Semestri: <?= number_format($row['semestri_l']);?></h4>
                            <p>
                                Detyra: <?=$row['emri_t'];?><br>
                                Nota: <?=$row['grade_d'];?><br>
                                Pershkrimi: <?=$row['pershkrimi_t'];?><br>               
                            </p>
                            <a href="#" class="btn btn-danger  btn-block">Me shume</a>

                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <h3>Semestri 5</h3>
        <div class="row" id="result">
            
            <?php

            $sql="Select lendet.name_l, tasks.emri_t, tasks_done.grade_d, tasks.pershkrimi_t, lendet.semestri_l from lendet
            INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
            INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
            INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
             AND tasks_done.id_s=$id AND semestri_l=5";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../photo/uni_logo.png" class="card-img-top">
                        
                        <div class="card-body">
                        <h6 class="text-light bg-secondary text-center rounded p-1"><?=$row['name_l']; ?></h6> 
                            <h4 class="card-title text-danger">Semestri: <?= number_format($row['semestri_l']);?></h4>
                            <p>
                                Detyra: <?=$row['emri_t'];?><br>
                                Nota: <?=$row['grade_d'];?><br>
                                Pershkrimi: <?=$row['pershkrimi_t'];?><br>               
                            </p>
                            <a href="#" class="btn btn-danger  btn-block">Me shume</a>

                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <h3>Semestri 6</h3>
        <div class="row" id="result">
            
            <?php
            $id=$_SESSION['id'];
            $sql="Select lendet.name_l, tasks.emri_t, tasks_done.grade_d, tasks.pershkrimi_t, lendet.semestri_l from lendet
            INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
            INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
            INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
             AND tasks_done.id_s=$id AND semestri_l=6";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../photo/uni_logo.png" class="card-img-top">
                        
                        <div class="card-body">
                        <h6 class="text-light bg-secondary text-center rounded p-1"><?=$row['name_l']; ?></h6> 
                            <h4 class="card-title text-danger">Semestri: <?= number_format($row['semestri_l']);?></h4>
                            <p>
                                Detyra: <?=$row['emri_t'];?><br>
                                Nota: <?=$row['grade_d'];?><br>
                                Pershkrimi: <?=$row['pershkrimi_t'];?><br>               
                            </p>
                            <a href="#" class="btn btn-danger  btn-block">Me shume</a>

                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
   </div>     
</div>

</body>
</html>
