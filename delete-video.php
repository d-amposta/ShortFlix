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
			$sql = "SELECT *
					FROM videos
					WHERE id= '$id'";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				$title = $row['title'];
			  	$synopsis = $row['synopsis'];
			  	$url = $row['url'];
			  	$filmmaker = $row['filmmaker'];
			  	$category = $row['category']; ?>
				<div class="col-xs-12 col-md-6 col-md-offset-3 preview">
					<div class="user_options">
						<p>Are you sure you want to delete this video?</p>
						<form method='POST' action=''>
							<input type='submit' name='deletevideo' value='Yes' class='btn btn-danger'>
							<a href="watch.php?v=<?php echo $row['id'] ?>"><button type='button' name='no' value='No' class='btn'>No</button></a>
						</form>
					</div>
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
			<?php }; //while ?>		
		</div>
	</div>
	
<?php  }; //display_content ?>
<?php require('partials/home-index.php'); ?>