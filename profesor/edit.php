<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../css/home.css" type="text/css" media="all">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../richtext/richtext.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<nav class="menu-nav">
        <div class="menu" style="text-align: center;">
        <a href="../profesor/home_p.php">Home</a>
             <a href="../profesor/lendet_p.php">Lende</a>
             <a href="../profesor/vleresimet_p.php">Vleresimet</a>
             <a href="../profesor/dorezimet_p.php">Dorezimet</a>
             <a href="../profesor/faq_p.php"><span class="current-page">FAQ</span> </a>
             <a href="../profesor/profile_p.php">Profili</a>
             
         </div>
       </nav>


<?php

	// connect with database
	$conn = new PDO("mysql:host=localhost:4000;dbname=menaxhimistudenteve", "root", "");

	// check if FAQ exists
	$sql = "SELECT * FROM faqs WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([
		$_REQUEST["id"]
	]);
	$faq = $statement->fetch();

	if (!$faq)
	{
		die("FAQ not found");
	}

	// check if edit form is submitted
	if (isset($_POST["submit"]))
	{
		// update the FAQ in database
		$sql = "UPDATE faqs SET question = ?, answer = ? WHERE id = ?";
		$statement = $conn->prepare($sql);
		$statement->execute([
			$_POST["question"],
			$_POST["answer"],
			$_POST["id"]
		]);

		// redirect back to previous page
		header("Location: " . "../profesor/faq_p.php");
	}

?>
<!-- include JS -->

<!-- layout for form to edit FAQ -->
<div class="container" style="margin-top: 0px; margin-bottom: 50px;">
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<h1 style="margin-top: 100px" class="text-center">Edit FAQ</h1>

			<!-- form to edit FAQ -->
			<form method="POST" action="edit.php">

				<!-- hidden ID field of FAQ -->
				<input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />

				<!-- question, auto-populate -->
				<div class="form-group">
					<label>Enter Question</label>
					<input type="text" name="question" class="form-control" value="<?php echo $faq['question']; ?>" required />
				</div>

				<!-- answer, auto-populate -->
				<div class="form-group">
					<label>Enter Answer</label>
					<textarea name="answer" id="answer" rows="5" class="form-control" required><?php echo $faq['answer']; ?></textarea>
				</div>

				<!-- submit button -->
				<input type="submit" name="submit" style="margin-top: 15px; transform:translateX(75%); width:250px" class="btn btn-warning" value="Edit FAQ" />
			</form>
		</div>
	</div>
</div>

<script>
	// initialize rich text library
	window.addEventListener("load", function () {
		$("#answer").richText();
	});
</script>