
	<div class="side-nav">
		<div class="side_nav_option">
			<a href="index.php">Home</a>
		</div>
		<div class="side_nav_option">
			<a href="videos.php">See All Videos</a>
		</div>
		<p>Category:</p>

<?php
	
	require('connection.php');

	$sql = "SELECT *
			FROM videos
			GROUP BY category";

	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0){

		while($row=mysqli_fetch_assoc($result)){
			extract($row);

			echo '<div class="category">
			<a href="search.php?query='.$row['category'].'">'.$row['category'].'</a></div>';
			}
		}
	 			
	
?>
</div>
<?php require("partials/footer.php"); ?>