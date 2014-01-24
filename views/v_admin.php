<div class='container' style="width: 80%;">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Beta keys</h3>
		</div>
		<div class='panel-body'>
			<button class="btn btn-primary">Add key</button>
			<button class="btn btn-danger">Remove all keys</button>
		</div>
	</div>

	<div class="list-group">
		<?php
		$keys = BetaKey::getAllKeys();

		foreach ($keys as $key) {
			if($key->isAvailable()) {
				?>
				<a href="#" class="list-group-item"><?php echo $key->getKeyStr(); ?> - Available</a>
				<?php
			}
			else {
				?>
				<a href="#" class="list-group-item"><?php echo $key->getKeyStr(); ?> - Have been activated</a>
				<?php		
			}
		}

		?>
	</div>
</div>