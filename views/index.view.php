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

					<?php foreach ($notes as $note): ?>
					<li>
						<a href="edit.php?id=<?php echo $note['id'] ?>">
							<span class="title">
								<?php echo $note['title'] ?>
							</span>
							<span class="excerpt">
								<?php echo excerpt($note['content']) ?>
							</span>
						</a>
					</li>
					<?php endforeach; ?>
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