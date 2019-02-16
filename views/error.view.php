<?php require 'partials/header.php' ?>

	<header>
		<h1>Something went wrong.</h1>
		<span><?php echo $e->getMessage() ?></span>
	</header>

	<main>
		<a href="/">
			Go back to homepage
		</a>
	</main>

<?php require 'partials/footer.php' ?>