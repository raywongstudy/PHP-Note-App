<?php require 'partials/header.php' ?>

	<header>
		<h1>Edit note</h1>
		<span><?php echo $the_note->title ?></span>
	</header>

	<div class="flex">
		<nav>
			<ul>
				<li>
					<a href="/">&laquo; Go Back</a>
				</li>
			</ul>
		</nav>
		<main>
			<form action="/edit" method="post">
				<div class="row">
					<label for="title">Title</label>
					<input type="text" id="title" placeholder="The Note Title" name="title" value="<?php echo $the_note->title ?>">
				</div>
				<div class="row">
					<label for="content">Content</label>
					<textarea id="content" placeholder="Content" name="content"><?php echo $the_note->content ?></textarea>
				</div>
				<div class="row col">
					<div class="col-50">
						<input type="hidden" name="id" value="<?php echo $the_note->id ?>">
						<button type="submit" name="action" value="update">Update</button>
					</div>
					<div class="col-50 text-right">
						<button type="submit" class="danger" name="action" value="delete" onclick="return confirm('Are you sure want to delete this?')">Delete</button>
					</div>
				</div>
			</form>
		</main>
	</div>

<?php require 'partials/footer.php' ?>