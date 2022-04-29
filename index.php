<html>

<?php
$conn=mysqli_connect("localhost","root","","myclients");

if(isset($_POST['sb']))
{
	
	$sql="insert into clients set
		fullname='$_POST[fn]',
		phone='$_POST[ph]',
		email='$_POST[em]'";
	
	
	mysqli_query($conn,$sql);
	
	
}

if(isset($_POST['sb2']))
{
	
	if($_POST['sb2']=="Save")
	{
		$sql="update clients set
		fullname='$_POST[fn]',
		phone='$_POST[ph]',
		email='$_POST[em]'
		where id=$_POST[idu]";
	
	
		mysqli_query($conn,$sql);
		
	}
	
	if($_POST['sb2']=="Delete")
	{
		$sql="delete from clients
		where id=$_POST[idu]";
	
	
		mysqli_query($conn,$sql);
		
	}
	
	
	
	
}


?>


<body>
<h1> My Clients</h1>
<table>
	<tr>
		<th>Fullname</th>
		<th>Phone</th>
		<th>email</th>
		<th>Actions</th>
	</tr>
	
	<tr>
	<form action='index.php' method=post>
		<td><input type='text' name='fn'></td>
		<td><input type='text' name='ph'></td>
		<td><input type='email' name='em'></td>
		<td><input type='submit' value="Save" name='sb'></td>
	</form>
	</tr>
	
<?php
	$sql1="select * from clients";
	$q=mysqli_query($conn,$sql1);
		
	while($r=mysqli_fetch_array($q))
	{
		echo "<tr>
				<td>$r[fullname]</td>
				<td>$r[phone]</td>
				<td>$r[email]</td>
			<td><a href='edit.php?id=$r[id]'>EDIT</a></td>
			</tr>";
		
	}
	
	
	
	?>
	
	

</table>







</body>

</html>