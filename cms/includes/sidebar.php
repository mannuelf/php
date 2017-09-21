<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
	<!-- Blog Search Well -->
	<div class="well">
		<h4>Blog Search</h4>
		<form action="search.php" method="post">
			<div class="input-group">
				<input name="search" type="text" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit" name="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		<!-- /.input-group -->
	</div>

	<!-- Blog Categories Well -->
	<div class="well">
		<?php
            $query = 'SELECT * FROM cms.categories';

            $select_all_categories = mysqli_query($dbConnection, $query);

            if (!$select_all_categories) {
                echo mysqli_error($select_all_categories);
            }
        ?>
		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-6">
				<ul class="list-unstyled">
					<?php
                        while ($row = mysqli_fetch_assoc($select_all_categories)) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            //send a parameter of the category id
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                    ?>
				</ul>
			</div>
			<!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<ul class="list-unstyled">
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
				</ul>
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>

	<!-- Side Widget Well -->
  	<?php include 'widget.php'; ?>

</div>
