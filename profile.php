<?php
function get_title() {
	echo 'Shortflix';
}

function display_content() {
	if(!empty($_SESSION['id'])){ ?>
		<div class="row form">
			<div class="col-xs-12 col-md-4 col-md-offset-4">
				<p>Change password</p>
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					<div class="form-group">
						<label for="current_password">Current Password</label>
						<input type="password" name="current_password" class="form-control">
					</div>
					<div class="form-group">
						<label for="new_password">New Password</label>
						<input type="password" name="new_password" class="form-control">
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm New Password</label>
						<input type="password" name="confirm_password" class="form-control">
					</div>
					<input type="submit" name="change_password" class="btn btn-success">
				</form>
			</div>
		</div>
	<?php } else {
		header('location:login.php');
	};
}; ?>
<?php require_once('partials/home-index.php'); ?>