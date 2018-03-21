<?php
require ('connection.php');
			
$id = $_POST['id'];
$title = mysqli_real_escape_string($conn, $_POST['title']);
$synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
$url = $_POST['url'];
$filmmaker = mysqli_real_escape_string($conn, $_POST['filmmaker']);
$category = $_POST['category'];

$sql = "UPDATE videos
		SET title = '$title', synopsis = '$synopsis', url = '$url', filmmaker = '$filmmaker', category = '$category'
		WHERE id='$id'";

mysqli_query($conn, $sql);

$sql = "SELECT * FROM videos WHERE id= '$id'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
	$title = $row['title'];
  	$synopsis = $row['synopsis'];
  	$url = $row['url'];
  	$filmmaker = $row['filmmaker'];
  	$category = $row['category']; ?>
	<p>Preview</p>
	<p class="title"><?php echo $row['title'] ?></p>
	<p><?php echo $row['synopsis'] ?></p>
	<div class="embed-responsive embed-responsive-16by9">
		<?php embed_video($row['url']) ?>
	</div>
	<p>By: <?php echo $row['filmmaker'] ?></p>
	<p>Category: <?php echo $row['category'] ?></p>
<?php }; ?>