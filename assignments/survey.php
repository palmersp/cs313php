<!DOCTYPE html>
<head>
	<title>Survey</title>
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
		<form action="" method="post" id="surveyForm">

			<h2>What is your favorite flavor of ice cream?</h2>
			<input type="radio" name="iceCream" value="chocolate">
			<label for="chocolate">Chocolate</label><br>
			<input type="radio" name="iceCream" value="vanilla">
			<label for="vanilla">Vanilla</label><br>
			<input type="radio" name="iceCream" value="rockyRoad">
			<label for="rockyRoad">Rocky Road</label><br>
			<input type="radio" name="iceCream" value="strawberry">
			<label for="strawberry">Strawberry</label><br>


			<h2>What is your favorite season</h2>
			<input type="radio" name="seasons" value="spring">
			<label for="spring">Spring</label><br>
			<input type="radio" name="seasons" value="summer">
			<label for="summer">Summer</label><br>
			<input type="radio" name="seasons" value="fall">
			<label for="fall">fall</label><br>
			<input type="radio" name="seasons" value="winter">
			<label for="winter">Winter</label><br>

			<h2>What is your favorite building?</h2>
			<input type="radio" name="building" value="austin">
			<label for="austin">Austin</label><br>
			<input type="radio" name="building" value="mc">
			<label for="mc">Manwaring Center</label><br>
			<input type="radio" name="building" value="smith">
			<label for="smith">Smith</label><br>
			<input type="radio" name="building" value="austin">
			<label for="romney">Romney</label><br>

			<h2>Least favorite subject?</h2>
			<input type="radio" name="subject" value="math">
			<label for="math">Math</label><br>
			<input type="radio" name="subject" value="english">
			<label for="english">English</label><br>
			<input type="radio" name="subject" value="science">
			<label for="Science">Science</label><br>
			<input type="radio" name="subject" value="history">
			<label for="history">History</label><br>

			<input type="submit" name="action" value="survey"><br><br>

		</form>
	</main>
	<footer>

	</footer>

</body>
