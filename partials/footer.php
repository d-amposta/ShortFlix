<footer>
	<div class="row">
		<div class="col-xs-12">
			<h5>ShortFlix</h5>
			<nav>
				<a href="">Home</a>
				<p>Categories</p>
				<?php require("connection.php");
				$sql = "SELECT category
						FROM videos
						GROUP BY category";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){ ?>
					<a href="search.php?query=<?php echo $row['category'] ?>"><?php echo $row['category'] ?></a>
				<?php }; ?>
			</nav>
			<p class="disclaimer">Disclaimer: All videos belong to their respective owners</p>
		</div>
	</div>
</footer>