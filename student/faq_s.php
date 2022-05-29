
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../richtext/richtext.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/header_footer.js"></script>
<link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/lendet_p.css" type="text/css" media="all">


<nav class="menu-nav" style="transform: translateY(-50px);">
        <div class="menu" style="text-align: center;">
        <a href="../student/home_s.php">Home</a>
             <a href="../student/lendet_s.php">Lende</a>
             <a href="../student/vleresimet_s.php">Vleresimet</a>
             <a href="../student/dorezimet_s.php">Dorezimet</a>
             <a href="../student/faq_s.php"><span class="current-page">FAQ</span> </a>
             <a href="../student/profile_s.php">Profili</a>
             
         </div>
       </nav>



<?php

	// connect with database
	$conn = new PDO("mysql:host=localhost:3306;dbname=menaxhimistudenteve", "root", "");

	// check if insert form is submitted
	if (isset($_POST["submit"]))
	{
		// create table if not already created
		$sql = "CREATE TABLE IF NOT EXISTS faqs (
			id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
			question TEXT NULL,
			answer TEXT NULL,
			created_at DATETIME DEFAULT CURRENT_TIMESTAMP
		)";
		$statement = $conn->prepare($sql);
		$statement->execute();

		// insert in faqs table
		$sql = "INSERT INTO faqs (question, answer) VALUES (?, ?)";
		$statement = $conn->prepare($sql);
		$statement->execute([
			$_POST["question"],
			$_POST["answer"]
		]);
	}

	// get all faqs from latest to oldest
	$sql = "SELECT * FROM faqs ORDER BY id DESC";
	$statement = $conn->prepare($sql);
	$statement->execute();
	$faqs = $statement->fetchAll();

?>

<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />

<!-- include jquer, bootstrap and rich text JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="richtext/jquery.richtext.js"></script>


<!-- layout for form to add FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<h1 class="text-center">FAQ</h1>

			<!-- for to add FAQ -->
			<form method="POST" action="faq_s.php">

				<!-- question -->
				<div class="form-group">
					<label>Enter Question</label>
					<input type="text" name="question" class="form-control" required />
				</div>

				<!-- answer -->
				<div class="form-group">
					<label>Enter Answer</label>
					<textarea name="answer" id="answer" class="form-control" resizable="off" placeholder="Optional" rows="5" ></textarea>
				</div>

				<!-- submit button -->
				<input type="submit" name="submit" style="margin-top: 15px; transform:translateX(75%); width:250px"  class="btn btn-info" value="Add FAQ" />
			</form>
		</div>
	</div>

	<!-- show all FAQs added -->
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<table class="table table-bordered">
				<!-- table heading -->
				<thead>
					<tr>
						<th>ID</th>
						<th>Question</th>
						<th>Answer</th>
					</tr>
				</thead>

				<!-- table body -->
				<tbody>
					<?php foreach ($faqs as $faq): ?>
						<tr>
							<td><?php echo $faq["id"]; ?></td>
							<td><?php echo $faq["question"]; ?></td>
							<td><?php echo $faq["answer"]; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


	
