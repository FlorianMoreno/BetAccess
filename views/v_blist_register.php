<div class="container" style="width: 60%;">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Rejoindre <?php echo BetaConfig::getValue("projectName"); ?></h2>
			<p>Enregistrer la clé <?php echo $key; ?></p>
			<a class="btn btn-danger" href='./?action=register&delKey'>Enregistrer une autre clé</a>
		</div>
		<div class="panel-body">
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

			<div class="alert alert-warning">
				Vore nom d'utilisateur apparaît dans notre liste de pseudos protégés.
				<br>
				Si vous êtes bien le propriétaire de ce nom, veuillez nous contacter et nous nous enverrons un code de validation, que vous entrerez dans ce formulaire
			</div>

			<form method='post' action='' role='form'>
				<div class="form-group">
					<label for="username">Nom d'utilisateur</label>
					<input type="text" name="username" class="form-control">
				</div>

				<div class="form-group">
					<label for="usernameCode">Code de validation utilisateur</label>
					<input type="text" name="usernameCode" class="form-control">
				</div>

				<div class="form-group">
					<label for="mail">Adresse mail</label>
					<input type="email" name="mail" class="form-control">
				</div>

				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input type="password" name="password" class="form-control">
				</div>

				<div class="form-group">
					<label for="passwordConfirm">Confirmation du mot de passe</label>
					<input type="password" name="passwordConfirm" class="form-control">
				</div>

				<input type="submit" name="blistRegisterSubmit" value="Valider" class="btn btn-lg btn-primary">
			</form>
		</div>
	</div>
</div>