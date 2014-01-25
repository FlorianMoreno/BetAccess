		<div class="container" style="width: 60%;">
			<div class="panel panel-primary">
				<div class="panel-body">
				<?php
				if(AdminSession::isLogged()) {
					?>
					<a href='./?action=admin_logout'>Logout</a>
					<?php
				}
				else {
					?>
					<a href='./?action=admin_login'>Admin</a>
					<?php
				}
				?>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>