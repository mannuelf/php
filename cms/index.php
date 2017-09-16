<?php include 'database/db.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navigation.php' ?>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<h1 class="page-header">
				For the love of programming. <br>
				<small>Every day there is something new to learn.</small>
			</h1>
			<?php include 'includes/all-posts.php' ?>
			<!-- Pager -->
			<ul class="pager">
				<li class="previous">
					<a href="#">&larr; Older</a>
				</li>
				<li class="next">
					<a href="#">Newer &rarr;</a>
				</li>
			</ul>
		</div>
		<?php include 'includes/sidebar.php' ?>
	</div>
	<!-- /.row -->
	<?php include 'includes/footer.php' ?>
