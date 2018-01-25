<?php
	session_start();
     require('script.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php get_title(); ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
		<!-- <link rel="stylesheet" type="text/css" href="partials/style.css"> -->

		<style type="text/css">
			body {
				font-family: 'Muli', sans-serif;
				color: rgb(39,56,62);
				height: 100%;
			}

			main {
				position: relative;
				top: 56px;
			}

			.navbar{
				background: rgb(39,56,62);
				box-shadow: 0 1.5px 4px 0 rgba(0,0,0,0.2);
				z-index: 999;
			}

			.navbar-collapse {
    			transition: 0.3s;
			}

			.navbar-brand {
				/*transform: translateX(-50%);
				left: 50%;
				position: absolute;*/
				color: rgb(255,255,255);
				font-size: 20px;
				font-weight: bold;
				transition: 0.3s;
				text-shadow: 1px 1px 1.5px rgb(192,187,165);
			}

			.navbar-brand:hover {
				color: rgb(255,255,255);
			}

			.navbar-left{
				display: none;
			}

			.navbar-nav>li>a,
			.navbar-nav>li>.navbar-text {
				color: rgb(255,255,255);
			}

			.navbar-form .input-group>.form-control {
				width: 350px;
			}

			.login {
				cursor: pointer;
			}

			#login-container{
				width: 20%;
				position: absolute;
				top: 56px;
				right: 10px;
				z-index: 999;
				background: rgb(255,255,255);
				display: none;
				padding: 10px;
				border-radius: 5px;
				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			}

			.container {
				width: 100%;
				padding: 0 20px;
			}
	

			.left-side {
				background: rgb(233,234,235);
				color: rgb(255,255,255);
				padding: 20px 0;
				height: 100%;
				position: fixed;
				left: 0;
				top: 50px;
				width: 16.67%;
				overflow-y: auto;
			}

			.side_nav_option>a {
				font-weight: bold;
				color: rgb(39,56,62);
			}

			.category,
			.side-nav p,
			.side_nav_option {
				color: rgb(39,56,62);
				padding: 5px 20px;
				transition: 0.3s;
			}


			.category>a {
				color: rgb(39,56,62);
				left: 20%;
				position: relative;
				font-weight: bold;
			}

			.category>a:hover,
			.side_nav_option>a:hover {
				text-decoration: none;
			}

			.category>a>p {
				margin: 0;
			}

			.watch_container {
				margin: 20px auto;
				width: 90%;
			}

			.title {
				font-size: 18px;
				font-weight: bold;
			}

			.mobile_options,
			.nav > .mobile_options {
				display: none;
			}

			iframe {
				display: block;
				margin: auto;
				padding-bottom: 10px;
			}

			.suggestions_container {
				width: 80%;
				position: relative;
				left: 50%;
				transform: translateX(-50%);
			}

			.suggestions_container h2 {
				font-size: 1.6rem;
				font-weight: bold;
				margin-top: 24px;
			}

			.thumb_container{
				display: block;
			}

			.thumb_container a>img {
				display: block;
				max-width: 100%;
				height: auto;
			}

			.thumbnail_container {
				margin-top: 24px;
				padding-left: 15px;
			}

			.thumbnail_content {
				display: inline-block;
				margin-right: 10px;
			}

			.video_thumb {
				width: 160px;
			}

			.thumb_title {
				font: 1.17em;
				margin: 8px 0;
				padding-right: 24px;
				color: rgb(39,56,62);
				font-weight: bold;
			}

			.result_container {
				margin-top: 16px;
			}

			.result_thumb {
				width: 246px;
			}

			.search_result_statistic {
				margin-top: 20px;
			}

			.title_small {
				font: 1.17em;
				font-weight: bold;
				color: black
			}

			.pagination_container{
				
			}

			.pagination {
				position: relative;
				left: 50%;
				transform: translateX(-50%);
			}

			.dropdown_options{
				position: absolute;
				top: 0;
				right: 0;
				cursor: pointer;
			}

			.video_options {
				width: 90px;
				position: absolute;
				top: 25px;
				right: 0;
				z-index: 999;
				background: rgb(255,255,255);
				display: none;
				padding: 10px;
				border-radius: 5px;
				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			}

			.video_options a {
				color: rgb(39,56,62);
			}

			.video_options a:hover{
				text-decoration: none;
			}

			.form{
				margin: 20px 0 0 20px;
			}

			footer {
				position: absolute;
				bottom: 0;
				padding-bottom: 20px;
			}

			footer p {
				font-size: 10px;
			}

			.load-more {
				display: none;
				text-align: center;
				width: 100%;
				padding: 10px 0
			}

		@media screen and (max-width: 768px){
			body {
				background: rgb(233,234,235);
			}

			.left-side,
			.navbar-right> .desktop_options {
				display: none;
			}

			.navbar-left {
				display: block;
			}

			.navbar-form .input-group>.form-control {
				width: 100%;
			}

			.navbar-text {
				margin-left: 25px;
			}

			.navbar {
				margin: 0;
			}

			#login-container {
				width: 90%;
				margin: auto;
				position: absolute;
				top: 100px;
			}

			.dropdown-menu {
				background: rgb(233,234,235);
			}

			.mobile_options,
			.nav > .mobile_options {
				display: inline-block;
			}

			.dropdown-menu>li>a {
				color: rgb(255,255,255);
			}

			.watch_container {
				width: 100%;
			}

			.watch_container .title,
			.thumb_title {
				font-size: 1em;
			}

			.watch_container p {
				font-size: 0.9em;
			}
			
			.login {
				width: 90%;
				margin: 15px auto 0;
			}

			.form {
				margin: 20px 0 0 0;
			}

			.icon-bar {
				background: rgb(233,234,235);
			}
		}

		</style>

</head>
<body>


	<?php require_once('partials/nav.php'); ?>
		<div class='left-side'>
				<?php require("partials/side-nav.php"); ?>
		</div>
		<div class='container'>
	 		<div class='row'>
	 			<main>
					<div class='col-xs-12 col-md-10 col-md-offset-2'>
					<?php display_content(); ?>
					</div>
				</main>
	 		</div>
		</div>


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			 <script src="js/jquery.simplePagination.js"></script>
			 <script>
			 	$(document).ready(function() {

			 		var screenWidth = $(window).width();
			 		if(screenWidth > 768){
			 		$(".login").on("click", function(){
			 			$("#login-container").toggle();
			 		});
			 		};

			 		//if viewed on mobile devices change login pop up to link
			 		
			 		if(screenWidth <= 768){
			 			$(".login_popup").html("<a href='login.php'>Log In</a>")
			 		};

			 		$(".dropdown_options").on("click", function() {
			 			$(".video_options").toggle();
			 		});

			 		$("#edit_video").on("click", function() {
			 			var id = $("input[name=id]").val();
			 			var title = $("input[name=title]").val();
			 			var synopsis = $("textarea[name=synopsis]").val();
			 			var url = $("input[name=url]").val();
			 			var filmmaker = $("input[name=filmmaker]").val();
			 			var category = $("select[name=category] option:selected").val();

			 			$.ajax({
			 				method: "POST",
			 				url: "save-edit-video.php",
			 				data: {
			 						id:id,
			 						title:title,
			 						synopsis:synopsis,
			 						url:url,
			 						filmmaker:filmmaker,
			 						category:category},
			 				success: function(data) {
			 					$(".preview").html(data)
			 				},
			 				error: function() {
			 					$(".preview").html("error")
			 				}

			 			});
			 		});

			 		$(window).scroll(function() {
			 			var lastID = $(".load-more").attr("data-lastID");
			 			var query = $(".load-more").attr("data-query");
			 			var category = $(".load-more").attr("data-category");

			 			if ($(window).scrollTop() == $(document).height() - $(window).height()  && lastID != 0) {
			 				$.ajax({
			 					method: "POST",
			 					url: "getdata.php",
			 					data: {lastID:lastID,
			 							query:query,
			 							category:category},
			 					beforeSend:function(html){
			 						$(".load-more").show();
			 					},
			 					success: function(data) {
			 						$(".load-more").remove();
			 						$(".show_all_video").append(data);
			 					}
			 				});
			 			}
			 		});

			 		
			 	});
			 </script>


</body>
</html>