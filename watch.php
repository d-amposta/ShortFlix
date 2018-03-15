<?php

function get_title() {
	require('connection.php');
	$id=$_GET['v'];
	$sql = "SELECT *
			FROM videos 
			WHERE id= '$id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$title = $row['title'];
		echo $title;
	}
}

function display_content() { ?>
	<div class="row">
		<div class="col-xs-12 col-md-10">
			<?php require('connection.php');
			$id=$_GET['v'];
			$sql = "SELECT *
					FROM videos
					WHERE id= '$id'";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){ ?>
				<div class="row watch_container">
					<!-- video -->
					<div class="col-xs-12 col-md-10 col-md-offset-1">
						<div class="embed-responsive embed-responsive-16by9">
							<?php embed_video($row['url']) ?>	
						</div>
					</div>
					<!-- info -->
					<div class="col-xs-12 col-md-10 col-md-offset-1">
						<p class="title"><?php echo $row['title'] ?></p>
						<p>Uploaded: <?php echo $row['date_uploaded'] ?></p>
						<p>By: <?php echo $row['filmmaker'] ?></p>
						<p><?php echo $row['synopsis'] ?></p>
						<!-- admin options -->
						<?php
						//only show if user is logged in as admin
						if(!empty($_SESSION['id']) && $_SESSION['role'] == 'admin'){
						?>
						<div class="dropdown_options">
							<span class="glyphicon glyphicon-menu-down"></span>
						</div>
						<div class="video_options">
							<a href="edit-video.php?v=<?php echo $row['id'] ?>"><p>Edit</p></a>
							<a href="delete-video.php?v=<?php echo $row['id'] ?>"><p>Delete</p></a>
						</div>
						<?php } //if ?>
					</div>	
				</div>
			<?php }; //while ?>	
		</div>
		<div class="col-xs-12 col-md-2">
			<p>Suggestions</p>
			<?php $current_video_id = $_GET['v'];
			//display other videos
			$sql = "SELECT *
					FROM videos
					WHERE id !=". $current_video_id ."
					ORDER BY RAND()
					LIMIT 5";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){ ?>
					<div class="thumbnail_content">
						<!-- thumbnail -->
						<div class="thumb_container">
							<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>" class="video_thumb"></a>
						</div>
						<!-- title -->
						<a href="watch.php?v=<?php echo $row['id'] ?>"><p class="thumb_title"><?php echo $row['title'] ?></p></a>
					</div>
				<?php }; //while ?>
			<?php }; //if ?>
		</div>
	</div>
<?php }; //display_content ?>
<?php require_once ('partials/home-index.php'); ?>