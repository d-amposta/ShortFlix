<?php

function get_title() {
	echo 'Shortflix';
}

function display_content() {

	require('connection.php');

	$get_query = $_GET['query'];

	/*get num of results from query*/
	$sql = "SELECT count(id) as num_rows
			FROM videos
			WHERE title LIKE '%$get_query%' OR category = '$get_query'";

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$total_rec = $row["num_rows"]; ?>
	<div class="container show_all_video">
		<!-- result statistics -->
		<div class="result_statistic">
			<p><?php echo $total_rec ?> results for <?php echo $_GET['query'] ?></p>	
		</div>
		<div class="result_section_border"></div>
		<?php 
		$showLimit = 10;
		/*get all videos from query*/
		$sql = "SELECT *
				FROM videos
				WHERE title LIKE '%$get_query%' OR category = '$get_query'
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
					<div class="col-sm-12">
						<div class="row">
							<!-- thumbnail -->
							<div class="col-xs-12 col-sm-3">
								<div class="thumb_container">
								<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>" class="result_thumb"></a>
								</div>
							</div>
							<!-- info -->
							<div class="col-xs-12 col-sm-9 col-md-7">
								<div class="result_title">
									<a href="watch.php?v=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>	
								</div>
								<div class="result_synopsis">
									<p><?php echo $row['synopsis'] ?></p>	
								</div>
							</div>
						</div>	 <!-- row -->
					</div> <!-- col -->
				</div> <!-- result_container -->
				<?php $result_count += 1; 
				if($result_count < mysqli_num_rows($result)){ ?>
					<div class="result_section_border"></div>
				<?php }; ?>
				<?php }; //while ?>
			<!-- data for ajax -->
			<?php if($total_rec > $showLimit){ ?>
				<div class="load-more" data-lastID="<?php echo $postID ?>" data-query="<?php echo $_GET['query'] ?>">
					<p class="loading">Load More</p>
				</div>
			<?php }; ?>
		<?php }; //if ?>
	</div> <!-- show_all_video -->
<?php }; //display_content ?>
<?php require_once ('partials/home-index.php'); ?>




