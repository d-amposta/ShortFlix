<?php

function get_title() {
	echo 'Shortflix';
}

function display_content() { ?>
	<div class="row">
		<div class="login">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				<div class="form-group">
					<label for="username">Username/Email</label>
					<input type="text" name="username" placeholder="Username/Email" class="form-control"></input>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="Password" class="form-control"></input>
				</div>
				<input type="submit" name="login" value="Log In" class="btn btn-success"></input>	
			</form>
		</div>
	</div>
<?php }; ?>
<?php require_once ('partials/home-index.php'); ?>