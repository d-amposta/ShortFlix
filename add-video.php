<?php
	
function get_title() {
	echo "Shortflix";
}

function display_content() { ?>
<div class="row form">
	<div class="col-xs-12 col-md-4">
		<p>Add Video</p>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" name="title" class="form-control"></input>
			</div>
			<div class="form-group">	
				<label for="synopsis">Synopsis:</label>
				<textarea name="synopsis" rows="5" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="url">URL:</label>
				<input type="text" name="url" class="form-control"</input>
			</div>
			<div class="form-group">
				<label for="filmmaker">Director: </label>
				<input type="text" name="filmmaker" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">Category: </label>
				<select name="category" class="form-control">
					<option value="Action">Action</option>
					<option value="Adventure">Adventure</option>
					<option value="Comedy">Comedy</option>
					<option value="Documentary">Documentary</option>
					<option value="Drama">Drama</option>
					<option value="Fantasy">Fantasy</option>
					<option value="Horror">Horror</option>
					<option value="Romance">Romance</option>
					<option value="Sci-Fi">Sci-Fi</option>
				</select>
			</div>
				<input type="submit" name="submit_video" value="Add Video" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
<?php	} //display_content	?>
<?php require_once('partials/home-index.php'); ?>

