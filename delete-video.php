<?php
function get_title() {
	echo "Shortflix";
}

function display_content() {
	require('connection.php');

	$id=$_GET['v'];

	//get info
	$sql = "SELECT *
			FROM videos
			WHERE id= '$id'";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
		$title = $row['title'];
	  	$synopsis = $row['synopsis'];
	  	$url = $row['url'];
	  	$filmmaker = $row['filmmaker'];
	  	$category = $row['category']; ?>
		<div class='row edit-video'>
			<div class='col-md-9'>
				<p><?php echo $title ?></p>
				<p class='description'><?php echo $synopsis ?></p>
				<div>
					<p>Are you sure you want to delete this video?</p>
					<form method='POST' action=''>
						<input type='submit' name='deletevideo' value='Yes' class='btn btn-danger'>
						<a href="videos.php"><button type='button' name='no' value='No' class='btn'>No</button></a>
					</form>
				</div>
			</div>
		</div>
	<?php }; //while ?>
<?php  }; //display_content ?>
<?php require('partials/home-index.php'); ?>