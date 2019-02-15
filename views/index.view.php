<?php require 'partials/header.php' ?>

	<header>
		<h1>
			<a href="/">
				The Note App.
			</a>
		</h1>
		<span>A Simple Database Based Note App</span>
	</header>

	<div class="flex">
		<nav>
			<ul>
				<li>
					<a href="/create">+ Create new note</a>
				</li>

				<?php foreach ($notes as $note): ?>
				<li class="<?php echo (isset($_GET['id']) && $_GET['id'] == $note->id) ? 'active' : '' ?>">
					<a href="/?id=<?php echo $note->id ?>">
						<span class="title">
							<?php echo $note->title ?>
						</span>
						<span class="excerpt">
							<?php echo excerpt($note->content) ?>
						</span>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</nav>
		<main>
			<?php if (isset($the_note) && $the_note): ?>
			<h2><?php echo $the_note->title ?></h2>
			<div class="content">
				<?php echo nl2br($the_note->content) ?>
			</div>
			<div class="updated-at">
				Updated at: <?php echo $the_note->updated_at ?>
			</div>

			<a href="/edit?id=<?php echo $the_note->id ?>">Edit</a>
			<?php else: ?>
			Please select a note from the left
			<?php endif; ?>
		</main>
	</div>

<?php require 'partials/footer.php' ?>