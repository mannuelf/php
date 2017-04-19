<?php include "db.php"; ?>
<?php include "functions.php"; ?>
<?php include "./includes/header.php"; ?>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
	<header class="mdl-layout__header mdl-layout__header--transparent">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title">READ USERS [".][",]</span>
			<div class="mdl-layout-spacer"></div>
            <?php require "./includes/navigation.php"; ?>
		</div>
	</header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">READ USERS</span>
        <?php require "./includes/navigation.php"; ?>
    </div>	<main class="mdl-layout__content">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--8-col">
				<pre>
					<?php
						readRows();
					?>
				</pre>
			</div>
		</div>
	</main>
</div>

<?php include "./includes/footer.php"; ?>
