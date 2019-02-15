<!doctype html>
<html>
<head>
	<title>The Note App.</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>The Note App.</h1>
			<span>A Simple PHP File Based Note App</span>
		</header>

		<div class="flex">
			<nav>
				<ul>
					<li>
						<a href="create.php">+ Create new note</a>
					</li>
				</ul>
			</nav>
			<main>
				Contents Here
			</main>
		</div>

		<footer>
			&copy; <?= date('Y') ?>
		</footer>
	</div>
</body>
</html>