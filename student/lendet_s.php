
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
    <script src="../js/header_footer.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/lendet_p.css" type="text/css" media="all">
</head>
<body id="home_page">
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
<div class="container">
    <div class="row">
      
        <?php
        require '../dbconfig/config.php';
       $idstudent=$_SESSION['id'];

       
        $query="Select lendet.name_l,lendet.semestri_l
        from student 
        Join lendet 
        on (student.semestri_s = lendet.semestri_l)WHERE student.id_s=$idstudent";
        $query_run=mysqli_query($conn,$query);
        $check_lendet=mysqli_num_rows($query_run)>0;

        if($check_lendet){
            while($row=mysqli_fetch_array($query_run))
            {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="../photo/uni-logo.jpg" class="card-img-top" alt="foto" height=250px><br><br>
                                 <h4 class="card-title"><?php echo $row['name_l'] ?></h4>
                                 <h3 class="card-title"><?php echo 'Semestri:'.$row['semestri_l'] ?></h3>
                                 <button id="btn"><a href ="dorezodetyren_s.php">Shfaq detyrat</a></button>
                                 <p class="card-text"><a href=detyratlist.php>Klikoni ketu per te pare listen e detyrave</a></p> 

                        </div>
                    </div>
                </div>
                <?php

             
            }

        }
        else{
            echo "Nuk u gjend asnje lende";
        }
        ?>
         
     
     </div>
</div>
    <button id="btn"><a href="shtolende.php">Shto lende</a></button>

       <footer id="footer">
        <!--jscode-->
   </footer>


</body>
</html>