<?php

function get_title() {
	echo "Shortflix";
}

function display_content() { ?>
	<div class='container show_all_video'>
	<?php require("connection.php");
	$sql = "SELECT *
			FROM videos
			ORDER BY id DESC
			LIMIT 10";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			extract($row);
			$postID = $row['id']; ?>
			<div class="row result_container">
				<!-- box -->
				<div class="col-xs-12">
					<div class="row">
						<!-- thumbnail -->
						<div class="col-xs-12 col-sm-3">
							<div class="thumb_container">
							<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>" class="result_thumb"></a>
							</div>
						</div>
						<!-- info -->
						<div class="col-xs-12 col-sm-7">
							<a href="watch.php?v=<?php echo $row['id'] ?>"><p class="title_small"><?php echo $row['title']; ?></p></a>
							<p><?php echo $row['synopsis']; ?></p>
						</div>
					</div>	
				</div>
			</div>
		<?php }; //while ?>
		<div class="load-more" data-lastID="<?php echo $postID ?>">
			<p class="loading">Loading...</p>
		</div>
	<?php }; //if ?>
</div> <!-- container -->
<?php }; // display_content ?>
<?php require ("partials/home-index.php") ?>