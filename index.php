<?php


	function get_title() {
		echo 'Shortflix';
	}

	function display_content() {

		//call db
		require("connection.php");

		//pick random video
		$sql = "SELECT *
				FROM videos
				ORDER BY RAND()
				LIMIT 1";

		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);

			$url = $row['url'];
			
		
?>
	<div class="row watch_container">
		<!-- video -->
		<div class="col-xs-12 col-md-7">
			<div class="embed-responsive embed-responsive-16by9">
				<?php embed_video($row['url']) ?>	
			</div>
		</div>
		<!-- info -->
		<div class="col-xs-12 col-md-5">
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

<?php 	} //if ?>
	<!-- suggestions -->
	<div class="row">
		<div class="suggestions_container">
			<h2>Recently Added</h2>
			<div class="row thumbnail_container">
<?php
			$current_video = $row['id'];

			//display other videos
			$sql = "SELECT *
					FROM videos
					WHERE id !=". $current_video ."
					ORDER BY RAND()
					LIMIT 5";

			$result = mysqli_query($conn,$sql);

				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){		
?>
				<div class="thumbnail_content">
					<!-- thumbnail -->
					<div class="thumb_container">
						<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>" class="video_thumb"></a>
					</div>
					<!-- title -->
					<a href="watch.php?v=<?php echo $row['id'] ?>"><p class="thumb_title"><?php echo $row['title'] ?></p></a>
				</div>
					<?php }
				} ?>
			</div>
		</div>
	</div>
<?php		 
	} //display_content	
	require_once ('home-index.php');
?>




