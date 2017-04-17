<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>READ</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<!-- Uses a transparent header that draws on top of the layout's background -->
	<style>
		body {
			color: white;
			background: url('moon-landing-60582_1280.jpg') center / cover;
		}
		.demo-layout-transparent .mdl-layout__header,
		.demo-layout-transparent .mdl-layout__drawer-button {
			/* This background is dark, so we set text to white. Use 87% black instead if
               your background is light. */
			color: white;
		}
		.mdl-textfield__label {
			color: rgba(255, 255, 255, 0.7);
		}
		.mdl-textfield__input {
			border: none;
			border-bottom: 1px solid rgba(255,255,255, 0.8);
		}
        pre {
            color: greenyellow;
            font-family: Hack, Arial;
            font-weight: 800;
            text-shadow: 1px 2px 2px #000;
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
            <?php require './navigation.php'; ?>
		</div>
	</header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Databases</span>
        <?php require './navigation.php'; ?>
    </div>	<main class="mdl-layout__content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--8-col">
				<?php include "db.php";
					$query = "SELECT * FROM users";

					// take two parameters, connection and query
					$result = mysqli_query($connection, $query);
					if(!$result) {
						die('Query FAILED' . mysqli_error($connection));
					}

					while($row = mysqli_fetch_assoc($result)) {
						?>
						<pre>
							<?php
								print_r($row);
							?>
						</pre>
						<?php
					}
				?>
			</div>
		</div>
	</main>
</div>

</body>
</html>
