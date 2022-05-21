
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login dashboard</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
</head>
<body id="login-page">

    <section id="login">
        <h1>Shto lende</h1>

        <form action="../dbconfig/shtolendeSetUp.php" method="post">
            <input type="text" name="lenda" placeholder="Shkruaj emrin e lendes">
            <input type="number" name="semestri" placeholder="Zgjedhni semestrin e lendes">
            <input type="submit" name="shtolende_btn" value="Shto">
        </form>
        <h5>Kthehu tek <a href="../profesor/lendet_p.php">lendet</a> </h5>
    </section>

    
    <footer>
      
    </footer>
</body>
</html>