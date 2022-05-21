
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
        <a href="../profesor/home_p.php">Home</a>
             <a href="../profesor/lendet_p.php"><span class="current-page">Lendet</span> </a>
             <a href="../profesor/vleresimet_p.php">Vleresimet</a>
             <a href="../profesor/dorezimet_p.php">Dorezimet</a>
             <a href="../profesor/faq.php">FAQ</a>
             <a href="../profesor/profile.php">Profili</a>
             
         </div>
       </nav>
<div class="container">
    <div class="row">
      
        <?php
        require '../dbconfig/config.php';
       $idquery=$_SESSION['id'];

        $query="SELECT * FROM lendet WHERE profesorid_l=$idquery";
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
                                 <button id="btn"><a href ="modifikolende.php">Modifiko Lenden</a></button>
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