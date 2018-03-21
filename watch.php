<?php

function get_title() {
	require('connection.php');
	$id=$_GET['v'];
	$sql = "SELECT *
			FROM videos 
			WHERE id= '$id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$title = $row['title'];
		echo $title;
	}
}

function display_content() { ?>
	<div class="row">
		<div class="col-xs-12 col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<?php require('connection.php');
					$id=$_GET['v'];
					$sql = "SELECT *
							FROM videos
							WHERE id= '$id'";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){ ?>
						<div class="row watch_container">
							<!-- video -->
							<div class="col-xs-12">
								<div class="embed-responsive embed-responsive-16by9">
									<?php embed_video($row['url']) ?>
								</div>
							</div>
							<!-- info -->
							<div class="col-xs-12">
								<div class="title_container">
									<p class="title"><?php echo $row['title'] ?></p>	
								</div>
								<div class="about_header">
									<p><span class="glyphicon glyphicon-info-sign"></span>About</p>
								</div>
								<div class="about_content">
									<p>By: <?php echo $row['filmmaker'] ?></p>
									<p><?php echo $row['synopsis'] ?></p>	
								</div>
								
								<!-- admin options -->
								<?php
								//only show if user is logged in as admin
								if(!empty($_SESSION['id']) && $_SESSION['role'] == 'admin'){
								?>
								<div class="dropdown_options">
									<span class="glyphicon glyphicon-menu-down"></span>
								</div>
								<div class="video_options">
									<a href="edit-video.php?v=<?php echo $row['id'] ?>"><p>Edit</p></a>
									<a href="delete-video.php?v=<?php echo $row['id'] ?>"><p>Delete</p></a>
								</div>
								<?php } //if ?>
							</div>	
						</div>
					<?php }; //while ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="quick_select_box">
						<div class="select_header">
							<p>Suggested</p>	
						</div>
						<div class="select_content">
							<div class="row thumbnail_container">
								<?php $current_video_id = $_GET['v'];
								//display other videos
								$sql = "SELECT *
										FROM videos
										WHERE id !=". $current_video_id ."
										ORDER BY RAND()
										LIMIT 8";
								$result = mysqli_query($conn,$sql);
								if(mysqli_num_rows($result)>0){
									while($row=mysqli_fetch_assoc($result)){ ?>
										<div class="col-xs-12 col-sm-3">
											<div class="row thumbnail_content">
												<!-- thumbnail -->
												<div class="col-xs-7 col-sm-12">
													<div class="thumb_container">
														<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>"></a>
													</div>	
												</div>
												<!-- title -->
												<div class="col-xs-5 col-sm-12">
													<div class="thumb_title_container">
														<a href="watch.php?v=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>	
													</div>	
												</div>
											</div>	
										</div>
									<?php } /*while*/ ?>
								<?php } /*if*/ ?>
							</div>	
						</div>	
					</div>
				</div>	
			</div>
		</div>
	</div>
<?php }; //display_content ?>
<?php require_once ('partials/home-index.php'); ?>