<!doctype html>
<html>
<head>
	<title>The Note App.</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>
				<a href="index.php">
					The Note App.
				</a>
			</h1>
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
						<a href="index.php?id=<?php echo $note['id'] ?>">
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
				<?php if (isset($the_note) && !is_null($the_note)): ?>
				<h2><?php echo $the_note['title'] ?></h2>
				<div class="content">
					<?php echo nl2br($the_note['content']) ?>
				</div>

				<a href="edit.php?id=<?php echo $the_note['id'] ?>">Edit</a>
				<?php else: ?>
				Please select a note from the left
				<?php endif; ?>
			</main>
		</div>

		<footer>
			&copy; <?= date('Y') ?>
		</footer>
	</div>
</body>
</html>