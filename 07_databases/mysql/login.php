

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<!-- Uses a transparent header that draws on top of the layout's background -->
	<style>
		body {
			color: white;
			background: url('moon-landing-60582_1280.jpg') center / cover;
		}
		.textfield__label, .demo-layout-transparent .mdl-layout__header,
		.demo-layout-transparent .mdl-layout__drawer-button {
			/* This background is dark, so we set text to white. Use 87% black instead if
               your background is light. */
			color: white;
		}
	</style>
</head>
<body>
<div class="demo-layout-transparent mdl-layout mdl-js-layout">
	<header class="mdl-layout__header mdl-layout__header--transparent">
		<div class="mdl-layout__header-row">
			<!-- Title -->
			<span class="mdl-layout-title">Databases [".][",]</span>
			<!-- Add spacer, to align navigation to the right -->
			<div class="mdl-layout-spacer"></div>
			<!-- Navigation -->
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
			</nav>
		</div>
	</header>
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title">Title</span>
		<nav class="mdl-navigation">
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
			<a class="mdl-navigation__link" href="">Link</a>
		</nav>
	</div>
	<main class="mdl-layout__content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--8-col">
				<?php
				if(isset($_POST['submit'])) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					echo $username;
					echo $password;
				}
				?>
				<form action="login.php" method="post">
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" name="username">
						<label class="mdl-textfield__label" for="name">Name</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="password"  name="password">
						<label class="mdl-textfield__label" for="name">Password</label>
					</div>
					<input type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
				</form>
			</div>
		</div>
	</main>
</div>

</body>
</html>
