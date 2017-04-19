<?php include "db.php"; ?>
<?php include "functions.php"; ?>
<?php include "./includes/header.php"; ?>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
	<header class="mdl-layout__header mdl-layout__header--transparent">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title">UPDATE USERS [".][",]</span>
			<div class="mdl-layout-spacer"></div>
            <?php require "./includes/navigation.php"; ?>
		</div>
	</header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">UPDATE USERS</span>
        <?php require "./includes/navigation.php"; ?>
    </div>
	<main class="mdl-layout__content">
		<div class="mdl-grid"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--8-col">
				<?php
					updateUser();
				?>
				<form action="login_update.php" method="post">
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" name="username">
						<label class="mdl-textfield__label" for="username">Username</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="password"  name="password">
						<label class="mdl-textfield__label" for="password">Password</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<select name="id" id="">
							<?php
                                showAllData()
							?>
						</select>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input value="UPDATE" type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
					</div>
				</form>

			</div>
		</div>
	</main>
</div>

<?php include "./includes/footer.php"; ?>
