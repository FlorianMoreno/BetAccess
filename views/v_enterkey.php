<div class="container" style="width: 60%;">
	<div class="panel panel-default panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Accès à la bêta <?php echo Config::getValue('projectName'); ?></h3>
		</div>
		<div class='panel-body'>
			<form id="keyForm" role="form" method="post" action="controllers/c_enterkey.php">
				<div class="form-group">
					<label for="key">Clé d'accès</label>
					<input type="text" class="form-control" id="key" placeholder="Your access key">

					<br>
					<input type="submit" class="btn btn-primary" value="Go !" name="submit">
				</div>
			</form>
		</div>
	</div>
</div>