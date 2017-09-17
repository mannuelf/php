<?php include 'includes/admin_header.php' ?>

<div id="wrapper" class="categories">
	<!-- Navigation -->
	<?php include 'includes/admin_navigation.php' ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Posts
						<small>- All the blog posts</small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-file"></i> Posts
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
				<?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case 'add_post':
                            include './includes/posts_add-post.php';
                            break;
                        case 'edit_post':
                            include './includes/posts_edit-posts.php';
                            break;
                        default:
                            include './includes/posts_view-all-posts.php';
                            break;
                    }
                ?>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	<?php include 'includes/admin_footer.php' ?>
