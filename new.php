<?php
	session_start();
	
	include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/my.css">
</head>
<body>

<?php

	
if(@$_SESSION['id']!="")
{	


	include "menu.php";
?>
<div class="container">
	
				<form action="list.php" method=post>
				  <div class="form-group">
					<label >Fullname:</label>
					<input type="text" class="form-control" name="fn">
				  </div>
				  <div class="form-group">
					<label >Phone:</label>
					<input type="text" class="form-control" name="ph">
				  </div>
				  
				   <div class="form-group">
					<label >Description:</label>
					<textarea class="form-control" name="ds" rows=4 cols=10></textarea>
				  </div>
				 
				  <button type="submit" class="btn btn-default">Save</button>
				</form>
				
				
				

</div>

<?php
}
else
{
		echo "
<div class=\"alert alert-danger\">
  <strong>Error!</strong> You must login. <a href='index.php'>Go to login page</a>
</div>
";
}
?>
</body>
</html>
