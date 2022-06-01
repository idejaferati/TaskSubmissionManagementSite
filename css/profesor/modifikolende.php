
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifiko Lenden</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
</head>
<body id="login-page">

    
    <section id="login">
        <h1>Modifiko lenden</h1>

        <form action="../dbconfig/modifikolendeSetUp.php" method="post">
            <?php
if(isset($_POST['lendaid'])){
    $id_l=$_POST['lendaid'];
}
            ?>
            <input type="hidden" name="id_l" value="$id_l">
            <input type="number" name="semestri" placeholder="Zgjedhni semestrin qe doni ta vendosni lenden">
            <input type="submit" name="modifikolende_btn" value="Modifiko">
           
        </form>
        <h5>Kthehu tek <a href="../profesor/lendet_p.php">lendet</a> </h5>
    </section>

    
    <footer>
      
    </footer>
</body>
</html>