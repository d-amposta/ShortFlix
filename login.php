<?php

function get_title() {
	echo 'Shortflix';
}

function display_content() { ?>
	<div class="row form">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4 login">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				<div class="form-group">
					<label for="username">Username/Email</label>
					<input type="text" name="username" class="form-control"></input>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control"></input>
				</div>
				<input type="submit" name="login" value="Log In" class="btn btn-success"></input>	
			</form>
		</div>
	</div>
<?php }; ?>
<?php require_once ('partials/home-index.php'); ?>