<?php 

	session_start();
	$_SESSION['vote'] = TRUE;

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Results</title>
 </head>
 <body>
 	<header>
		<h1>Survey</h1>
		<nav>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/assignments/">Assignments</a>
					<ul>
						<li><a href="/assignments/survey.php">Survey</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<main>


 	<?php 

 	echo $_POST['iceCream'];
 	echo $_POST['seasons'];
 	echo $_POST['building'];
 	echo $_POST['subject'];

 	if (isset($_SESSION['vote'])) {
 		echo "Thanks for taking the survey!";
 	}

 	 ?>
 	</main>
 </body>
 </html>