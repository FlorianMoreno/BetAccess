<div class="container" style="width: 60%;">

	<?php
		if(BetaConfig::getValue('last_error')) {
			$err = BetaConfig::getValue('last_error');

			if($err != 'nope') {
				echo '<div class="alert alert-danger">'.$err.'</div>';
				$err = 'nope';
			}
		}
	?>

	<form method='post' role='form' action=''>
		<label for='root_pass'>Password:</label>
		<input type='password' class="form-control" name="root_pass">

		<input type='submit' class="form-control btn btn-success" name="submit_rootlog" value="Login">
	</form>
</div>

<br>