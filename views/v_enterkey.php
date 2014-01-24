<div class="container" style="width: 60%;">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Accès à la bêta <?php echo BetaConfig::getValue('projectName'); ?></h3>
		</div>
		<div class='panel-body'>
			<?php
				if(BetaConfig::getValue('last_error')) {
					$err = BetaConfig::getValue('last_error');

					if($err != 'nope') {
						echo '<div class="alert alert-danger">'.$err.'</div>';
						$err = 'nope';
					}
				}

				if(BetaConfig::getValue('last_success')) {
					$err = BetaConfig::getValue('last_success');

					if($err != 'nope') {
						echo '<div class="alert alert-success">'.$err.'</div>';
						$err = 'nope';
					}
				}
			?>

			<form role="form" method='post' action=''>
				<div class="form-group">
					<label for="key">Clé d'accès</label>
					<input type="text" class="form-control" id="key" placeholder="Your access key" name='key'>
				</div>

				<input type="submit" class="btn btn-primary" value="Go !" name="submit">
			</form>
		</div>
	</div>
</div>