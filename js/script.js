$(document).ready(function() {

	var screenWidth = $(window).width();
	if(screenWidth > 768){
	$(".login_btn").on("click", function(){
		$("#login-container").toggle();
	});
	};

	//if viewed on mobile devices change login pop up to link
	
	if(screenWidth <= 768){
		$(".login_popup").html("<a href='login.php'>Log In</a>")
	};

	$(".search_button").on("click", function() {
		$(".search-container").slideToggle();
	})

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

	$(document).on("click", ".load-more", function() {
		$(this).html("<img src='assets/loading-icon.gif'>")
		var lastID = $(this).attr("data-lastID");
		var query = $(this).attr("data-query");
		var category = $(this).attr("data-category");
		var scrollTop = $(document).scrollTop();
		var windowHeight = $(window).height();
		var bodyHeight = $(document).height() - windowHeight;
		var scrollPercentage = (scrollTop/bodyHeight);

		if (lastID != 0) {
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