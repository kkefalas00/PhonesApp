<html>

<?php
$conn=mysqli_connect("localhost","root","","myclients");


	
	$sql="select * from clients where id=$_GET[id]";
	
	
	$q=mysqli_query($conn,$sql);
	$r=mysqli_fetch_array($q);
	
	

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
		<input type=hidden name=idu value='<?php echo $r['id'] ?>'>
		
		<td><input type='text' name='fn' value='<?php echo $r['fullname'] ?>'></td>
		<td><input type='text' name='ph' value='<?php echo $r['phone'] ?>'></td>
		<td><input type='email' name='em' value='<?php echo $r['email'] ?>'></td>
		<td><input type='submit' value="Save" name='sb2'> <input type='submit' value="Delete" name='sb2'></td>
	</form>
	</tr>
	

</table>







</body>

</html>