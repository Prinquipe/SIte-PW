<?php

	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	
	$id=$_GET["id_topic"]; //numele variabilei din fisierul asta poate sa fie oricare
	

	$result = mysqli_query($conn, "SELECT * FROM room");
	while($row = mysqli_fetch_array($result))
	{
		$roomtopic= $row["room_topic"];

		if($id == $roomtopic)
		{
			$path = "./rooms/";
			$room_name = $id;
			$name = $room_name;
			$end = ".php";
			$filename = $path.$name;
			$filename = $filename.$end;

			unlink($filename);

			$idp = $row1["id_room"]; //id_
			//delete all the posts from the room
			$result1 = mysqli_query($conn, "SELECT * FROM post");
			while($row1 = mysqli_fetch_array($result1))
			{
				$postroom = $row1["post_room"];
				
				if($idp == $postroom)
				{
					mysqli_query($conn,"DELETE FROM post WHERE post_room=$idp");
				}
			}

					mysqli_query($conn,"DELETE FROM room WHERE roomtopic=$id");
		}
	}

	$res=mysqli_query($conn,"SELECT * FROM topic WHERE id_topic=$id");
	mysqli_query($conn,"DELETE FROM topic WHERE id_topic=$id");
	

	
?>

<script type="text/javascript">

	window.location="admin.php#Topics";

</script>