<?php include 'shared/_session.php'; ?>
<?php mustBeLogged(); ?>
<?php include 'shared/_header.php'; ?>

<div class="container">

	<?php include 'shared/_topbar.php'; ?>

	<hr class="col-md-12">

	<ul class="list-inline">
		<li>
			<a href="movie_add_view.php" class="btn btn-sm btn-primary"> Add movie </a>
		</li>

		<li></li>
		<li></li>
		<li></li>
	</ul>

	

	<div class="row col-md-12">

		<h1> Movies </h1>

		<?php $movies = $mysqli->query("SELECT * FROM filmes ORDER BY data_lancamento"); ?>
			<table class="table table-condensed table-striped">
			
				<thead>
					<tr>
						<th> Thumb </th>
						<th> Movie </th>
						<th> Gender </th>
						<th> Release on </th>
						<th class="text-right"> Actions </th>
					</tr>
				</thead>
			
				<tbody>
					<?php while($row = $movies->fetch_array()): ?>
						<tr>
							<td class="col-md-1"> <img class="img-responsive" src="uploads/<?php echo $row['path']; ?>" /> </td>
							<td> <?php echo $row['titulo']; ?> </td>
							<td> <?php echo $row['genero']; ?> </td>
							<td> <?php echo $row['data_lancamento']; ?> </td>
							<td class="text-right"> 
								<a href="movie_edit_view.php?movie_id=<?php echo $row['id']; ?>" class="btn btn-xs btn-success"> 
									<i class="glyphicon glyphicon-pencil"></i>
									Edit 
								</a>
								
								<a href="movie_remove.php?movie_id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger" onClick="return confirm('Delete movie <?php echo $row['titulo'] . '?' ?>');"> 
									<i class="glyphicon glyphicon-trash"></i>
									Delete 
								</a> 

								<a href="movie_xml.php?movie_id=<?php echo $row['id']; ?>" class="btn btn-xs btn-default"> 
									<i class="glyphicon glyphicon-download-alt"></i>
									Xml 
								</a>

								<a href="movie_csv.php?movie_id=<?php echo $row['id']; ?>" class="btn btn-xs btn-default"> 
									<i class="glyphicon glyphicon-download-alt"></i>
									CSV 
								</a>

							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			
			</table>


	</div>

</div>

<?php include 'shared/_footer.php' ?>