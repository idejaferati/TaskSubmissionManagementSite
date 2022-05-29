<nav class="menu-nav" style="transform: translateY(-50px);">
        <div class="menu" style="text-align: center;">
        <a href="../profesor/home_p.php">Home</a>
             <a href="../profesor/lendet_p.php">Lende</a>
             <a href="../profesor/vleresimet_p.php">Vleresimet</a>
             <a href="../profesor/dorezimet_p.php">Dorezimet</a>
             <a href="../profesor/faq_p.php"><span class="current-page">FAQ</span> </a>
             <a href="../profesor/profile_p.php">Profili</a>
             
         </div>
 </nav>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../richtext/richtext.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/header_footer.js"></script>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/lendet_p.css" type="text/css" media="all">


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
<!-- layout for form to add FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
	<div class="row" style="margin-top: -20px;">
		<div class="offset-md-3 col-md-6">
			<h1 class="text-center">FAQ</h1>

			<!-- for to add FAQ -->
			<form method="POST" action="faq_p.php">

				<!-- question -->
				<div class="form-group">
					<label>Enter Question</label>
					<input type="text" name="question" class="form-control" required />
				</div>

				<!-- answer -->
				<div class="form-group">
					<label>Enter Answer</label>
					<textarea name="answer" id="answer" class="form-control" required></textarea>
				</div>

				<!-- submit button -->
				<input type="submit" name="submit" class="btn btn-info" style="margin-top: 15px; transform:translateX(75%); width:250px" value="Add FAQ" />
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
						<th>Actions</th>
					</tr>
				</thead>

				<!-- table body -->
				<tbody>
					<?php foreach ($faqs as $faq): ?>
						<tr>
							<td><?php echo $faq["id"]; ?></td>
							<td><?php echo $faq["question"]; ?></td>
							<td><?php echo $faq["answer"]; ?></td>
							<td>
								<!-- edit button -->
								<a style=" margin-bottom:10px; " href="edit.php?id=<?php echo $faq['id']; ?>" class="btn btn-warning btn-sm">
									Answer/Edit
								</a>

								<!-- delete form -->
								<form method="POST" action="delete.php" onsubmit="return confirm('Are you sure you want to delete this FAQ ?');">
									<input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
									<input type="submit" value="Delete" class="btn btn-danger btn-sm" />
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	// initialize rich text library
	window.addEventListener("load", function () {
		$("#answer").richText();
	});
</script>