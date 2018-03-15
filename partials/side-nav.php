<div class="side-nav">
	<div class="side_nav_option">
		<a href="index.php">Home</a>
	</div>
	<div class="side_nav_option">
		<a href="videos.php">See All Videos</a>
	</div>
	<p>Category:</p>
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
<?php require("partials/footer.php"); ?>