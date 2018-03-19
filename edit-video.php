<?php
function get_title() {
	echo "Shortflix";
}

function display_content() { ?>
	<div class="row">
		<div class="col-xs-12 col-md-10 col-md-offset-1">
			<?php require('connection.php');
			$id=$_GET['v'];
			//get info
			$sql = "SELECT * FROM videos WHERE id= '$id'";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				$title = $row['title'];
			  	$synopsis = $row['synopsis'];
			  	$url = $row['url'];
			  	$filmmaker = $row['filmmaker'];
			  	$category = $row['category']; ?>
				<div class='row form'>
					<div class='col-xs-12 col-md-5'>
						<div class="page_nav_container">
							<a href="watch.php?v=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>	
						</div>
						<form method='POST' action=''>
							<div class='form-group'>
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<label for="title">Title:</label>
								<input type='text' name='title' class='form-control' value='<?php echo $title ?>'></input>
							</div>
							<div class="form-group">
								<label for="synopsis">Synopsis:</label>
								<textarea name='synopsis' rows='5' class='form-control'><?php echo $synopsis ?></textarea>
							</div>
							<div class="form-group">	
								<label for="url">URL:</label>
								<input type='text' name='url' class='form-control' value='<?php echo $url ?>'></input>
							</div>
							<div class="form-group">
								<label for="filmmaker">Director: </label>
								<input type='text' name='filmmaker' class='form-control' value='<?php echo $filmmaker?>'>
							</div>
							<div class="form-group">
								<label for="category">Category: </label>
								<select name='category' class='form-control' value='<?php echo $category ?>'>
									<option value='Action' <?php if($row['category'] == 'Action') echo 'selected'; ?> >Action</option>
									<option value='Adventure' <?php if($row['category'] == 'Adventure') echo 'selected'; ?> >Adventure</option>
									<option value='Comedy' <?php if($row['category'] == 'Comedy') echo 'selected'; ?> >Comedy</option>
									<option value='Documentary' <?php if($row['category'] == 'Documentary') echo 'selected'; ?> >Documentary</option>
									<option value='Drama' <?php if($row['category'] == 'Drama') echo 'selected'; ?> >Drama</option>
									<option value='Fantasy' <?php if($row['category'] == 'Fantasy') echo 'selected'; ?> >Fantasy</option>
									<option value='Horror' <?php if($row['category'] == 'Horror') echo 'selected'; ?> >Horror</option>
									<option value='Romance' <?php if($row['category'] == 'Romance') echo 'selected'; ?> >Romance</option>
									<option value='Sci-Fi' <?php if($row['category'] == 'Sci-Fi') echo 'selected'; ?> >Sci-Fi</option>
								</select>
							</div>
							<button type='submit' id='edit_video' class='btn btn-success'>Save</input>
						</form>
					</div> <!-- col -->
					<div class="col-xs-12 col-md-7 preview">
						<p>Preview</p>
						<div class="row watch_container">
							<!-- video -->
							<div class="col-xs-12">
								<div class="embed-responsive embed-responsive-16by9">
									<?php embed_video($row['url']) ?>
								</div>
							</div>
							<!-- info -->
							<div class="col-xs-12">
								<div class="title_container">
									<p class="title"><?php echo $row['title'] ?></p>	
								</div>
								<div class="about_header">
									<p><span class="glyphicon glyphicon-info-sign"></span>About</p>
								</div>
								<div class="about_content">
									<p>Category: <?php echo $row['category'] ?></p>
									<p>By: <?php echo $row['filmmaker'] ?></p>
									<p><?php echo $row['synopsis'] ?></p>	
								</div>
							</div>	
						</div>
					</div> <!-- col -->
				</div> <!-- row -->
			<?php }; //while ?>
		</div>
	</div>
	
<?php }; //display_content ?>
<?php require('partials/home-index.php'); ?>