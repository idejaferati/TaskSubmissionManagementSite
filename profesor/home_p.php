
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
</head>
<body id="home_page">
    <header id="header">
        <!--jscode-->
   </header>
    <nav class="menu-nav">
        <div class="menu" style="text-align: center;">
             <a href="../profesor/home_p.php"><span class="current-page">Home</span> </a>
             <a href="../profesor/lendet_p.php">Lendet</a>
             <a href="../profesor/vleresimet_p.php">Vleresimet</a>
             <a href="../profesor/dorezimet_p.php">Dorezimet</a>
             <a href="../profesor/faq_p.php">FAQ</a>
             <a href="../profesor/profile_p.php">Profili</a>
             
             
         </div>
       </nav>

       <section>
        <div class="main-background-div">
             <img src="../photo/uniphoto.jpg" alt="A child in school">
        </div>
        
   </section>
   <div>

   <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
       <p>Universiteti i Prishtinës "Hasan Prishtina" (UP) është universitet publik ne Prishtine, Kosove. Eshte universiteti me i madh dhe me i vjeter ne Kosove.</p>
   
<h3>Historiku</h3>  <p>Institucioni i parë i arsimit të lartë në Kosovë ishte Shkolla e Lartë Pedagogjike në Prishtinë (1958). Në fillim kishte këto grupe mësimore: Grupi i Gjuhës dhe i Letërsisë Shqipe, Grupi i Gjuhës dhe i Letërsisë Serbokroate, Grupi i Biologjisë, i Gjeografisë dhe i Kimisë, Grupi i BAT-it dhe i Fizikës, Grupi i Matematikës dhe i Fizikës. Në vitin e parë shkollor 1958/59 u regjistruan 93 studentë të rregullt dhe 55 me korrespondencë. Në vitin shkollor 1961/62 u hap paralelja e SHLP të Prishtinës në Prizren, ku u regjistruan 100 studentë, 48 prej të cilëve ishin shqiptarë. Në vitin 1962 SHLP e Prizrenit bëhet e pavarur. SHLP e Prishtinës themeloi edhe Qendrën për studime me korrespondencë në Novi Pazar, me 50 studentë.</p>
<h3>Fakultetet</h3> 
<ul>
    <li>Fakulteti i Edukimit</li>
    <li>Fakulteti Filozofik i UP-së</li>
<li>Fakulteti i Shkencave Matematike-Natyrore</li>
<li>Fakulteti i Filologjisë</li>
<li>Fakulteti Juridik</li>
<li>Fakulteti Ekonomik</li>
<li>Fakulteti i Ndërtimtarisë dhe Arkitekturës</li>
<li>Fakulteti i Inxhinierisë Elektrike dhe Kompjuterike</li>
<li>Fakulteti i Inxhinierisë Mekanike</li>
<li>Fakulteti i Mjekësisë</li>
</ul>

</div>

       <footer id="footer">
        <!--jscode-->
   </footer>


</body>
</html>