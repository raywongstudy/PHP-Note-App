<!doctype html>
<html>
<head>
	<title>The Note App.</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>Create a note</h1>
			<span>Write something.</span>
		</header>

		<div class="flex">
			<nav>
				<ul>
					<li>
						<a href="index.php">&laquo; Go Back</a>
					</li>
				</ul>
			</nav>
			<main>
				<form action="create.php" method="post">
					<div class="row">
						<label for="title">Title</label>
						<input type="text" id="title" name="title" placeholder="The Note Title">
					</div>
					<div class="row">
						<label for="content">Content</label>
						<textarea id="content" name="content" placeholder="Content"></textarea>
					</div>
					<div class="row">
						<button type="submit">Save</button>
					</div>
				</form>
			</main>
		</div>

		<footer>
			&copy; <?= date('Y') ?>
		</footer>
	</div>
</body>
</html>