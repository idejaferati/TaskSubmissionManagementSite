<?php 

session_start();
session_destroy();

header("Location: ../php/index.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Home Page</title>
</head>
<body>
		<nav class="menu-nav">
          <div class="menu">
			<ul>
              <li><a href="index.php">Log in</a></li>
              <li><a href="register.php">Register</a></li>
              <li>
                <a href="home.php">
                    <span class="current-page">Home</span>
                </a>
              </li>
              <li><a href="courses.php">Courses</a></li>
              <li><a href="assignments.php">Assignments</a></li>
              <li><a href="grades.php">Grades</a></li>
            </ul>
           </div>
         </nav>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Log in</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button type="submit" class="login_btn">Log in</button>
			</div>
			<div class="input-group">
				<button type="button" class="register_btn"><a href="register.php">Register</a></button>
			</div>
		</form>
	</div>
</body>
</html>