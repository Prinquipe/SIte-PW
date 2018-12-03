<?php
//Pune postarile
    $res=mysqli_query($conn,"SELECT * FROM post");

    while($row=mysqli_fetch_array($res))
	{
        $postroom = $row["post_room"];
        if($idroom == $postroom)
        echo "<h4>"; echo $row["post_title"]; echo "</h4>";  echo "<br>"; 
        echo "<p>submitted "; echo $row["post_date"]; 
        echo "by";
        $id=$row["post_creator"];
		$result5 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
        $row5 = mysqli_fetch_array($result5);
		$uname = $row5["user_nam"];
		echo $uname;
        echo "</p>"; echo "<br>"; 
        ?>
        <blockquote>
            <?php
         echo $row["post_content"]; 
           ?>
        </blockquote>
           <?php                                         
   											
	}


?>



<?php
//SCRIE FOOTER in file
$file1 = file_get_contents("examplefooter.php");
$path2 = $filename;
$file2 = file_get_contents($path2);
if ($file1 !== $file2){
    file_put_contents($path2, $file1, FILE_APPEND);
}


?>