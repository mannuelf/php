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

</head>
<body>
<div class="demo-layout-transparent mdl-layout mdl-js-layout">
	<header class="mdl-layout__header mdl-layout__header--transparent">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title">READ USERS [".][",]</span>
			<div class="mdl-layout-spacer"></div>
            <?php require './navigation.php'; ?>
		</div>
	</header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">READ USERS</span>
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
