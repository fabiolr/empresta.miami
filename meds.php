
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Empresta em Miami</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
 
    <script  src="empresta.js"></script>

  </head>

  <body>

<?php
session_start();
require_once 'medoo.php';
require_once 'database.php';
?>

<?php if (!isset($_SESSION['user'])):?>
	<script>Redirect("index.php?m=please_login");</script>
<?php endif;?>

<?php

// input data into table if present




if ($_POST) {

$meds_id = $database->insert("meds",[
	"active_ingredient" => $_POST['active_ingredient'],
	"name" => $_POST['name'],
	"med_types_id" => $_POST['type']

	]);
}


// query to display data

$meds = $database->select("meds",[
	"[><]med_types" => ["med_types_id" => "id"]
	],[
	"meds.id",
	"active_ingredient",
	"name",
	"type"
	],[
	"LIMIT" => 50	
	]);



?>
<div class="container">
  <div class="header clearfix">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">Empresta Miami</a>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          	<li><a href="dashboard.php">Dash</a></li>
            <li><a href="about.php">About</a></li>
            <li class="active"><a href="meds.php">Meds</a></li>
            <li><a href="mymeds.php">My Meds</a></li>
            <li><a href="symps.php">Symptons</a></li>
            <li><a href="friends.php">Friends</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="logout.php">Sign Out</a></li>


          </ul>
          <p class="navbar-text navbar-right"><a href="#" class="navbar-link"><?=$_SESSION["name"];?></a></p>

        </div><!--/.nav-collapse -->

      </div>
    </nav>
            <h3 class="text-muted">Empresta Miami</h3>
            	<br>
   </div>




<div class="table-responsive">

	<form action="meds.php" method="POST">

<div class="row">
        <div class="col-md-4">
        	<input type="text" name="active_ingredient" class="form-control" placeholder="Active Ingredient" aria-describedby="basic-addon1">
		</div>
        <div class="col-md-4">
			<input type="text" name="name" class="form-control" placeholder="Commercial Name" aria-describedby="basic-addon1">
        </div>
        <div class="col-md-4">
			<div class="input-group input-group-sm">
				<input type="text" name="type" class="form-control" placeholder="Type" aria-describedby="basic-addon1">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Add</button>
				</span> 
			</div>


        </div>
      </div>

	</form>


                  		
         				


</div>


            <table class="table table-striped">
              <thead>
                <tr>
					
                </tr>
                <tr>
                  <th>Active Ingredient</th>
                  <th>Name</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
              	<?php
              	foreach ($meds as $med) {
              		echo "<tr>";
              		echo "<td>".$med["name"]."</td>";
              		echo "<td>".$med["active_ingredient"]."</td>";
              		echo "<td>".$med["type"]."</td>";
					echo "</tr>";
              	}?>
              </tbody>
            </table>
          </div>



    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>