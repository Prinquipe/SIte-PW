<?php

	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	
	$id=$_GET["id_user"]; //numele variabilei din fisierul asta poate sa fie oricare
	
	$res=mysqli_query($conn,"SELECT * FROM user WHERE id_user=$id");
	
	mysqli_query($conn,"DELETE FROM user WHERE id_user=$id");
	

	
?>

<script type="text/javascript">

	window.location="admin.php#Utilizatori";

</script>