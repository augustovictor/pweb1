<?php echo "Hello, " . $_SESSION['login'] . ' - ' . $_SESSION['email']; ?>

<br />

<ul class="list-inline">
    <li>
    	<a href="index.php" class="btn btn-primary"> 
    		<i class="glyphicon glyphicon-home"></i>
    		Home 
    	</a>
    </li>
    
    <li>
    	<a href="movies.php" class="btn btn-primary"> 
    		<i class="glyphicon glyphicon-facetime-video"></i>
    		Movies 
    	</a>
    </li>
    
    <li>
    	<a href="logout.php" class="btn btn-danger"> Logout </a>
    </li>
    
    <li>
    </li>
</ul>
