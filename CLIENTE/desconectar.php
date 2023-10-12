<!-- logged in user information -->
<?php  if (isset($_SESSION['Nombre'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['Nombre']; ?></strong></p>
			<p> <a href="index1.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
