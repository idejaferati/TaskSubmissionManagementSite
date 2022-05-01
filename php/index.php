<?php 

include '../php/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../php/welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: ../php/welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Login Form</title>
</head>
<body>
		<nav class="menu-nav">
          <div class="menu">
			<ul>
              <li>
			   <a href="index.php">
                    <span class="current-page">Log in</span>
               </a>
			  </li>
              <li><a href="register.php">Register</a></li>
              <li><a href="home.php">Home</a></li>
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
				<button type="submit" class="login_btn">Login</button>
			</div>
			<div class="input-group">
				<button type="button" class="register_btn"><a href="register.php">Register</a></button>
			</div>
		</form>
	</div>
</body>
</html>