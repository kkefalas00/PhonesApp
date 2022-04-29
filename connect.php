<?php

	if(!$conn=@mysqli_connect("","","",""))
	{
		echo "error in database";
		die();
		
	}
	mysqli_query($conn,"set names 'utf8'");

?>