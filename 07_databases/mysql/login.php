<?php
	include "./includes/header.php";
?>
<div class="demo-layout-transparent mdl-layout mdl-js-layout">
	<header class="mdl-layout__header mdl-layout__header--transparent">
		<div class="mdl-layout__header-row">
			<!-- Title -->
			<span class="mdl-layout-title">Databases [".][",]</span>
			<!-- Add spacer, to align navigation to the right -->
			<div class="mdl-layout-spacer"></div>
			<!-- Navigation -->
            <?php require "./includes/navigation.php"; ?>
		</div>
	</header>
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title">Databases</span>
        <?php require "./includes/navigation.php"; ?>
	</div>
	<main class="mdl-layout__content">
		<div class="mdl-grid"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--8-col">
				<?php

                    /*
                     * please check the  README for more details on creating a
                     * local test database for this demo
                     * */
                    include "db.php";
                    include "functions.php";

                    if(isset($_POST['submit'])) {
                        $username = $_POST['name'];
                        $password = $_POST['password'];
                        $connection = mysqli_connect('localhost', 'root', 'root', 'loginapp');

                        if($connection) {
                            echo "<h6>Access Granted<h6/>";
                        } else {
                            die("Database connection failed");
                        }

                        $query = "INSERT INTO users(name, password)";
                        $query .= "VALUES ('$username', '$password')";
                        $result = mysqli_query($connection, $query);
                        if(!$result) {
                            die("Query FAILED" . mysqli_error($connection));
                        }
                    }
				?>
				<form action="login.php" method="post">
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" name="username">
						<label class="mdl-textfield__label" for="username">Username</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="password"  name="password">
						<label class="mdl-textfield__label" for="password">Password</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
					</div>
				</form>
			</div>
		</div>
	</main>
</div>

<?php include "./includes/footer.php"; ?>
