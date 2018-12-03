<?php

	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	
	$id=$_GET["id_post"]; //numele variabilei din fisierul asta poate sa fie oricare
	
	$res=mysqli_query($conn,"SELECT * FROM post WHERE id_post=$id");
	
	mysqli_query($conn,"DELETE FROM post WHERE id_post=$id");
	

	
?>

<script type="text/javascript">

	window.location="myaccount.php";

</script>