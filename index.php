<?php
function get_title() {
	echo 'ShortFlix';
}

function display_content() { ?>
	<div class="row">
		<?php require("connection.php");
		$sql = "SELECT *
				FROM videos
				ORDER BY RAND()
				LIMIT 1";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);

		?>
		<div class="featured_short_container" style="background: url(<?php get_featured_thumbnail($row['url']) ?>) no-repeat center/cover">
			<div class="featured_short_about">
				<div class="featured_content">
					<div class="featured_title">
						<a href="watch.php?v=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
					</div>
					<div class="featured_synopsis">
						<p><?php echo $row['synopsis'] ?></p>	
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="select_box">
			<div class="select_header">
				<p>Suggested</p>	
			</div>
			<div class="select_content">
				<div class="row thumbnail_container">
					<?php 
					//display other videos
					$sql = "SELECT *
							FROM videos
							ORDER BY RAND()
							LIMIT 8";

					$result = mysqli_query($conn,$sql);

					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){ ?>
							<div class="col-xs-12 col-sm-3">
								<div class="thumbnail_content">
									<!-- thumbnail -->
									<div class="thumb_container">
										<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>"></a>
									</div>
									<!-- title -->
									<div class="thumb_title_container">
										<a href="watch.php?v=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>	
									</div>
								</div>	
							</div>
						<?php } /*while*/ ?>
					<?php } /*if*/ ?>
				</div>	
			</div>
		</div>
	</div>
	<div class="section_border"></div>
	<div class="row">
		<div class="select_box">
			<div class="select_header">
				<p>Recently Added</p>	
			</div>
			<div class="select_content">
				<div class="row thumbnail_container">
					<?php
					//display other videos
					$sql = "SELECT *
							FROM videos
							ORDER BY id DESC
							LIMIT 4";

					$result = mysqli_query($conn,$sql);

					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){ ?>
							<div class="col-xs-12 col-sm-3">
								<div class="thumbnail_content">
									<!-- thumbnail -->
									<div class="thumb_container">
										<a href="watch.php?v=<?php echo $row['id'] ?>"><img src="<?php get_thumbnail($row['url']) ?>"></a>
									</div>
									<!-- title -->
									<div class="thumb_title_container">
										<a href="watch.php?v=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
									</div>
								</div>	
							</div>
						<?php } /*while*/ ?>
					<?php } /*if*/ ?>
				</div>	
			</div>
		</div>
	</div>
	<div class="section_border"></div>
	<?php $sql = "SELECT category
				  FROM videos
				  GROUP BY category
				  ORDER BY RAND()";

  	$result = mysqli_query($conn,$sql);
  	$section_count = 0;
  	while($row = mysqli_fetch_assoc($result)){
	  	$get_category = $row['category']; ?>
	  	<div class="row">
			<div class="select_box">
				<div class="select_header">
					<p><?php echo $get_category ?></p>
					<a href="search.php?query=<?php echo $get_category ?>">See All</a>
				</div>
				<div class="select_content">
					<div class="row thumbnail_container">
						<?php
						//display other videos
						$category_sql = "SELECT *
								FROM videos
								WHERE category = '$get_category'
								ORDER BY RAND()
								LIMIT 4";

						$category_result = mysqli_query($conn,$category_sql);

						if(mysqli_num_rows($category_result)>0){
							while($category_row=mysqli_fetch_assoc($category_result)){ ?>
								<div class="col-xs-12 col-sm-3">
									<div class="thumbnail_content">
										<!-- thumbnail -->
										<div class="thumb_container">
											<a href="watch.php?v=<?php echo $category_row['id'] ?>"><img src="<?php get_thumbnail($category_row['url']) ?>"></a>
										</div>
										<!-- title -->
										<div class="thumb_title_container">
											<a href="watch.php?v=<?php echo $category_row['id'] ?>"><?php echo $category_row['title'] ?></a>
										</div>
									</div>	
								</div>
							<?php } /*while*/ ?>
						<?php } /*if*/ ?>
					</div>	
				</div>
			</div>
		</div>
		<!-- display border except the last one -->
		<?php $section_count += 1; 
		if ($section_count < mysqli_num_rows($result)){?>
		<div class="section_border"></div>
		<?php } ?>	
 	<?php }; //while ?>
<?php } //display_content ?>	
<?php require_once ('partials/home-index.php'); ?>