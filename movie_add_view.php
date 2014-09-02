<?php include 'shared/_session.php'; ?>
<?php mustBeLogged(); ?>
<?php include 'shared/_header.php'; ?>

<div class="container">

	<?php include 'shared/_topbar.php'; ?>

	<hr class="col-md-12">

	<div class="row col-md-12">

		<h1> Add a movie </h1>


		<br>
		<br>

		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							Type info
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						<form action="movie_add.php" class="form col-md-6" method="post" role="form" enctype="multipart/form-data">
							<div class="form-group col-md-8">
								<label for="titulo">Título</label>
								<input type="text" id="titulo" class="form-control" name="titulo" placeholder="Name" required="true" />
							</div>

							<div class="form-group col-md-8">
								<label for="genero">Gênero</label>
								<select class="form-control" id="genero" name="genero">
									<option>Ação</option>
									<option>Aventura</option>
									<option>Comédia</option>
									<option>Guerra</option>
									<option>Horror</option>
									<option>Policial</option>
									<option>Suspense</option>
									<option>Terror</option>
								</select>
							</div>

							<div class="form-group col-md-8">
								<label for="data_lancamento">Data de lançamento</label>
								<input type="date" id="data_lancamento" class="form-control" name="data_lancamento" placeholder="Name" required="true" />
							</div>

							<div class="form-group col-md-8">
								<label for="file">Poster</label>
								<input type="file" id="file" name="file" value="null" />
								<p class="help-block">You can upload an awesome poster!</p>
							</div>

							<div class="form-group col-md-8">
								<button type="submit" name="submit" class="btn btn-success">Save</button>
								<a href="movies.php" class="btn btn-danger"> Cancel </a>
							</div>

						</form>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
							Load XML
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						<form action="movie_add.php?xml=true" class="form col-md-12" method="post" role="form" enctype="multipart/form-data">

							<div class="form-group col-md-8">
								<label for="file"> XML </label>
								<input type="file" id="file" name="file" value="null" required="true" />
								<p class="help-block">Make it easier! Give us a XML file only!</p>
							</div>

							<div class="form-group col-md-8">
								<button type="submit" name="submitXml" class="btn btn-success">Upload</button>
								<a href="movies.php" class="btn btn-danger"> Cancel </a>
							</div>

						</form>
					</div>
				</div>
			</div>

		</div>

		

		

	</div>

</div>

<?php include 'shared/_footer.php' ?>