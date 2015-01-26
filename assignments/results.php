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

 	echo $_POST['iceCream'] . '<br>';
 	echo $_POST['seasons'] . '<br>';
 	echo $_POST['building'] . '<br>';
 	echo $_POST['subject'] . '<br>';

 	if (isset($_SESSION['vote'])) {
 		echo "Thanks for taking the survey!";
 	}

 	 ?>
 	</main>
 </body>
 </html>