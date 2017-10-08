<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><strong>[".][",]</strong></a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
					global $dbConnection;

					$query = "SELECT * FROM cms.categories";
					$select_all_categories = mysqli_query($dbConnection, $query);

					if(! $select_all_categories) {
						echo mysqli_error($select_all_categories);
					}

					while($row = mysqli_fetch_assoc($select_all_categories)) {
						$cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];
						echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
					}
				?>
				<li><a href='./admin/'>Admin</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>
