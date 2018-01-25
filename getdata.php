<?php

	//check if 
	if (isset($_POST['lastID']) && !empty($_POST['lastID'])){

	require("connection.php");
	require("script.php");
	
	$lastID = $_POST['lastID'];
	
	$showLimit = 10;
	
	if(isset($_POST['query'])){
		$get_query = $_POST['query'];
		$sql = "SELECT count(*) as num_rows
				FROM videos
				WHERE id < ". $lastID ."
				AND (title LIKE '%$get_query%' OR category = '$get_query')
				ORDER BY id DESC";
	}else {
		$sql = "SELECT count(*) as num_rows
				FROM videos
				WHERE id < ". $lastID. "
				ORDER BY id DESC";
	}
	

	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);
	$allNumRows = $row['num_rows'];

	
	if(isset($_POST['query'])){
		$sql = "SELECT *
				FROM videos
				WHERE id < ". $lastID ."
				AND (title LIKE '%$get_query%' OR category = '$get_query')
				ORDER BY id DESC
				LIMIT ". $showLimit;
	}else {
		$sql = "SELECT *
				FROM videos
				WHERE id < ". $lastID ."
				ORDER BY id DESC
				LIMIT ".$showLimit;
	}
	

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			$postID = $row['id'];
?>
		<div class="row result_container">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<div class="thumb_container">
						<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>" class="result_thumb"></a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-7">
						<a href="watch.php?v=<?php echo $row['id'] ?>"><p class="title_small"><?php echo $row['title']; ?></p></a>
						<p><?php echo $row['synopsis']; ?></p>
					</div>
				</div>	
			</div>
		</div>
<?php
		}
		if ($allNumRows > $showLimit){
?>
		<div class="load-more" data-lastID="<?php echo $postID ?>" <?php if(isset($_POST['query'])){?> data-query="<?php echo $_POST['query'] ?>" <?php } ?> >
			<p>Loading...</p>
		</div>
<?php
		}
	}	
}
?>