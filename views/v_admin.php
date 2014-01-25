<div class='container' style="width: 60%;">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Beta keys</h3>
		</div>
		<div class='panel-body'>
			<button class="btn btn-primary" data-toggle="modal" data-target="#addKeyModal">Add key</button>
			<button class="btn btn-danger">Remove all keys</button>
		</div>
	</div>

	<div class="list-group">
		<?php
		$keys = BetaKey::getAllKeys();

		foreach ($keys as $key) {
			if($key->isAvailable()) {
				?>
				<a class="list-group-item">
					<?php echo $key->getKeyStr(); ?> - Available
					<button onclick="location.href='./?action=admin&key_to_del=<?php echo $key->getId() ?>';" class="btn btn-danger">Delete</button>
				</a>
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

<div class="modal fade" id="addKeyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add a new beta key</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="" role="">
					<label for="newKey">New key:</label>
					<input type="text" name="newKey" class="form-control">
					<br>
					<input type='submit' class='btn btn-primary' value="Add key" name="addKeySubmit">
				</form>
			</div>
		</div>
	</div>
</div>