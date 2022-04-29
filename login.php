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

	
	if(isset($_POST["usr"]))
	{
			$sql="select * from pelates where username='$_POST[usr]' and password='".md5($_POST['pwd'])."'";
			$q=mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($q)>0)
			{
					$r=mysqli_fetch_array($q);
					$_SESSION['id']=$r['id'];
			}
			else
			{
					echo "
<div class=\"alert alert-danger\">
  <strong>Error!</strong> Username or Password not exists. <a href='index.php'>Return</a>
</div>
";
					$_SESSION['id']="";
					die();
			}
			
			
			
	}
	
	
	
if(@$_SESSION['id']!="")
{	
$sql="select * from pelates where id=$_SESSION[id]";

			$q=mysqli_query($conn,$sql);
			$r=mysqli_fetch_array($q);
			

	include "menu.php";
?>
<div class="container">
	<?php
	
			echo "
				<h2>You are the user : $r[onoma]</h2>
				Your Username: $r[username]
			";
	
	?>

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
