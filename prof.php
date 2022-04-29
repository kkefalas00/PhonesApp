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

if(isset($_POST['fn2']))
	{
		if($_POST['pwd2']!="")
		{
			$sql="update pelates set onoma='$_POST[fn2]',
								username='$_POST[usr2]',
								password='".md5($_POST['pwd2'])."'
								where id=$_SESSION[id]";
		}
		else
		{
			$sql="update pelates set onoma='$_POST[fn2]',
								username='$_POST[usr2]'
								where id=$_SESSION[id]";
		}
			mysqli_query($conn,$sql);
			
			echo "<div class=\"alert alert-success\">
						<strong>Saved!</strong> Your data saved</div>";
				
			
		
	}


$sql="select * from pelates where id=$_SESSION[id]";

			$q=mysqli_query($conn,$sql);
			$r=mysqli_fetch_array($q);
	include "menu.php";
?>
<div class="container">
	
				<form action="prof.php" method=post>
				  <div class="form-group">
					<label >Fullname:</label>
					<input type="text" class="form-control" name="fn2" value='<?php echo $r['onoma']; ?>'>
				  </div>
				  <div class="form-group">
					<label >Username:</label>
					<input type="text" class="form-control" name="usr2" value='<?php echo $r['username']; ?>'>
				  </div>
				  
				   <div class="form-group">
					<label >Password:</label>
					<input type="password" class="form-control" name="pwd2" >
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
