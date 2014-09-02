<?php include 'shared/_session.php'; ?>
<?php include 'shared/_header.php'; ?>

<div class="container">

	<?php 
		if(isUserLogged()) {
			include 'shared/_topbar.php';
		}
	?>

	<div class="row col-md-12">

		<h1> Welcome </h1>

		<?php if(!isUserLogged()): ?>

			<form action="login.php" class="form" method="post" role="form">
				<input type="text" name="login" placeholder="Login" required="true" />
				<input type="password" name="password" placeholder="Password" required="true" />
				<input type="submit" name="submit" value="Login" class="btn btn-sm btn-primary" />
			</form>

			<form action="user_add.php" class="form" method="post" role="form">

				<input type="text" name="name" placeholder="Name" required="true" />
				<input type="email" name="email" placeholder="Email" required="true" />
				<input type="text" name="login" placeholder="Login" required="true" />
				<input type="password" name="password" placeholder="Password" required="true" />
				<input type="submit" name="submit" value="Create" class="btn btn-sm btn-success" />

			</form>
		<?php endif; ?>

	</div>

</div>

<?php include 'shared/_footer.php' ?>