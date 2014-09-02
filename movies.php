<?php include 'shared/_session.php'; ?>
<?php mustBeLogged(); ?>
<?php include 'shared/_header.php'; ?>

<script>
function showResult(str) {
	if (str.length==0) { 
		document.getElementById("livesearch").innerHTML="";
		document.getElementById("livesearch").style.border="0px";
		return;
	}

	if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else {  // code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	  	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  		document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
	  		document.getElementById("livesearch").style.border="1px solid #A5ACB2";
	  	}
	  }
	  xmlhttp.open("GET","movies-list.php?q="+str,true);
	  xmlhttp.send();
}


</script>

<div class="container">

	<?php include 'shared/_topbar.php'; ?>

	<hr class="col-md-12">

	<ul class="list-inline">
		<li>
			<a href="movie_add_view.php" class="btn btn-sm btn-primary"> Add movie </a>
		</li>
	</ul>

	

	<div class="row col-md-12">

		<h1> Movies </h1>

		<form class="form-inline col-md-12 text-right" name="ajax-demo" id="ajax-demo">  
			
			<div class="form-group">  
				<input type="text" id="movie" class="form-control" placeholder="Search movies" onkeyup="showResult(this.value)">  
			</div>
<!-- 
			<div class="form-group">  
					<button type="submit" class="btn btn-success">Submit</button>  
			</div> -->
		</form>

		<div class="col-md-12" id="livesearch">
		</div>

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