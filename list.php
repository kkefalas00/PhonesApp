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
	if(isset($_GET['id']))
	{
		$sql="delete from katalogos where id=$_GET[id]";
		mysqli_query($conn,$sql);
	}
	
	if(isset($_POST['fn']))
	{
		$sql="insert into katalogos(id_pel,onoma,tilefono,perigrafi)
			values($_SESSION[id],'$_POST[fn]','$_POST[ph]','$_POST[ds]')";
			if(mysqli_query($conn,$sql))
			{
				echo "<div class=\"alert alert-success\">
						<strong>Saved!</strong> New Name inserted</div>";
				
			}
			else{
				echo "<div class=\"alert alert-danger\">
						<strong>Error Saved!</strong> New Name did not inserted</div>";
			}
		
	}
?>
<div class="container">
	
				<table class="table table-hover">
				<tr>
					<th>FullName</th>
					<th>Phone</th>
					<th>Description</th>
					<th>Actions</th>
				</tr>
				
				<?php
					$sql="select * from katalogos where id_pel=$_SESSION[id] order by onoma";
					$q=mysqli_query($conn,$sql);
					
					while($r=mysqli_fetch_array($q))
					{
						echo "
						<tr>
							<td>$r[onoma]</td>
							<td>$r[tilefono]</td>
							<td>$r[perigrafi]</td>
							<td><a href='list.php?id=$r[id]'><span class=\"glyphicon glyphicon-trash\"></span></a></td>
						</tr>
						
						";
						
					}
				
				
				?>
				
				</table>
				
				
				
				

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
