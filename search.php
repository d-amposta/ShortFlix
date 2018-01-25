<?php


	function get_title() {
		echo 'Shortflix';
	}

	function display_content() {

		require('connection.php');

		$get_query = $_GET['query'];

		/*get num of results from query*/
		$sql = "SELECT count(id)
					FROM videos
				WHERE title LIKE '%$get_query%' OR category = '$get_query'";

			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			$total_rec = $row["count(id)"];
		
?>
		<div class="container show_all_video">
			<!-- result statistics -->
			<p class="search_result_statistic"><em><?php echo $total_rec ?></em> results for <strong><?php echo $_GET['query'] ?></strong></p>

<?php

		/*get all videos from query*/
		$sql = "SELECT *
				FROM videos
				WHERE title LIKE '%$get_query%' OR category = '$get_query'
				ORDER BY id DESC
				LIMIT 10";

		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				extract($row);
				$postID = $row['id'];
?>
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
							<div class="col-xs-12 col-sm-7">
								<a href="watch.php?v=<?php echo $row['id'] ?>"><p class="title_small"><?php echo $row['title'] ?></p></a>
								<p><?php echo $row['synopsis'] ?></p>
							</div>
						</div>	 <!-- row -->
					</div> <!-- col -->
				</div> <!-- result_container -->

<?php		} //while ?>
			
			<!-- data for ajax -->
			<div class="load-more" data-lastID="<?php echo $postID ?>" data-query="<?php echo $_GET['query'] ?>">
				<p class="loading">Loading...</p>
			</div>

<?php	} //if ?>
	
	</div> <!-- show_all_video -->

<?php
	
	} //display_content

	require_once ('home-index.php');
?>




