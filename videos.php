<?php

function get_title() {
	echo "Shortflix";
}

function display_content() { ?>
	<?php require("connection.php");
	/*get num of results from query*/
	$sql = "SELECT count(id) as num_rows
			FROM videos";

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$total_rec = $row["num_rows"]; ?>
	<div class='container show_all_video'>
		<div class="result_statistic">
			<p><?php echo $total_rec ?> results</p>
		</div>
		<div class="result_section_border"></div>
	<?php 	
	$showLimit = 10;
	$sql = "SELECT *
	FROM videos
	ORDER BY id DESC
	LIMIT ". $showLimit;
	$result = mysqli_query($conn,$sql);
	$result_count = 0;

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
							<div class="result_title">
								<a href="watch.php?v=<?php echo $row['id'] ?>"><?php echo $row['title']; ?></a>	
							</div>
							<div class="result_synopsis">
								<p><?php echo $row['synopsis']; ?></p>	
							</div>
						</div>
					</div>	
				</div>
			</div>
			<?php $result_count += 1; 
			if($result_count < mysqli_num_rows($result)){ ?>
				<div class="result_section_border"></div>
			<?php }; ?>
		<?php }; //while ?>
		<?php if($total_rec > $showLimit) { ?>
			<div class="load-more" data-lastID="<?php echo $postID ?>">
				<p class="loading">Load More</p>
			</div>
		<?php }; ?>
	<?php }; //if ?>
</div> <!-- container -->
<?php }; // display_content ?>
<?php require ("partials/home-index.php") ?>