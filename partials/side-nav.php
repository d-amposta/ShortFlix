<div class="side-nav">
	<div class="side_nav_option">
		<a href="index.php">Home</a>
	</div>
	<div class="side_nav_option">
		<a href="videos.php">See All Videos</a>
	</div>
	<div class="category_container">
		<div class="category_header">
			<p>Categories</p>	
		</div>
		<div class="category_content">
			<?php require('connection.php');
			$sql = "SELECT *
					FROM videos
					GROUP BY category";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					extract($row); ?>
					<div class="category">
						<a href="search.php?query=<?php echo $row["category"]; ?>"><?php echo $row['category']; ?></a>
					</div>
				<?php }; ?>
			<?php }; ?>
		</div>
	</div>
</div>