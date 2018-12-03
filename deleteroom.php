<?php

	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	
	$id=$_GET["id_room"]; //numele variabilei din fisierul asta poate sa fie oricare
	

	//delete the file
	$path = "./rooms/";
	$room_name = $id;
	$name = $room_name;
	$end = ".php";
	$filename = $path.$name;
	$filename = $filename.$end;

	unlink($filename);
	
	//delete all the posts from the room
	$result = mysqli_query($conn, "SELECT * FROM post");
	while($row = mysqli_fetch_array($result))
	{
		$postroom = $row["post_room"];

		if($id == $postroom)
		{
			mysqli_query($conn,"DELETE FROM post WHERE post_room=$id");
		}
	}


	$res=mysqli_query($conn,"SELECT * FROM room WHERE id_room=$id");
	
	mysqli_query($conn,"DELETE FROM room WHERE id_room=$id");
	

	
?>

<script type="text/javascript">

	window.location="admin.php#Rooms";

</script>