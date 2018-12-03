<?php

    include ('includes/chooseHeader.php');
	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	

?>

<!-- Main -->
            <section id="main">
				<div class="inner">
					
					
                    





                <?php
//Pune postarile

    //$result2 = mysqli_query($conn, "SELECT * FROM room");
    
    $name = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
    $rest = substr($name, 0, -4); // return 1

    $idroom = $rest;

    //$rest = substr("abcdef", -3, 1); // returns "d"

    $res=mysqli_query($conn,"SELECT * FROM post");

        $st=mysqli_query($conn,"SELECT * FROM room WHERE id_room='$idroom'");
        $r = mysqli_fetch_array($st);
         $roomname = $r["room_subject"];
        //echo $r["room_subject"];
        ?>

            <header>
				<h2><?php echo $roomname; ?></h2>
            </header>
            <?php
            

    while($row=mysqli_fetch_array($res))
	{
        $postroom = $row["post_room"];
        //echo "$idroom";
        
        if($idroom == $postroom)
        {
            //echo "$idroom";
            

            echo "<h4>"; echo $row["post_title"]; echo "</h4>";   
            $date = $row["post_date"];
            $date = substr($date, 0, 10);
            
            echo "<i>submitted "; echo $date; 
            echo " by "; echo "</i>";
            $id=$row["post_creator"];
            $result5 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
            $row5 = mysqli_fetch_array($result5);
            $uname = $row5["user_nam"];
            echo "<strong>"; echo $uname; echo "</strong>";
            
            ?>
            <blockquote>
                <?php
            echo $row["post_content"]; 
            ?>
            </blockquote>
            <hr>
            <?php                                
        }
                 
   											
	}


?>
    <script type="text/javascript">
		function myFunction(){

		//alert("You button was pressed");
		var currString = "<?php echo $name ?>";
        window.location=currString;

		};

    </script>
                                    
    <script type="text/javascript">
         function validateForm()
         {
           var a=document.forms["Form"]["name"].value;
           var a=document.forms["Form"]["descriere"].value;
                                                
           if (a==null || a=="" || b==null || b=="")
            {
                alert("Please Fill All Required Field");
                return false;
            }
        }
      </script>

<form id="form1" name="Form" runat="server" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">

        <br><br>                        
        <h4>Titlu:</h4>
        <input name= "name" type="text" /> <br>



        <h4>Post Content:</h4>
        <textarea name="descriere" id='comment' ></textarea><br />
        <!--<input name="descriere" type="textarea"  /> <br>-->


        <button type="submit" name="submitpost" class="button special">Add</button> &nbsp; &nbsp;
        <button type="submit" name="renunta" class="button special" onclick="myFunction();">Renunta</button>
</form>


<!--< ?php
							
		if(isset($_POST["renunta"])){
	?>
		<script type="text/javascript">
		    window.location="forum.php";
		</script>
	< ?php
		}
        else{ --> 
            <?php
                $recordAdded = false;
                if(isset($_POST["submitpost"]))
                {
                    if(!isset($_SESSION["id_user"])){
                        echo '<script>window.location="../LogIn.php"</script>';
                        exit();
                    }
                    else{
                        $creator = $_SESSION["id_user"];
                        $date = date('Y-m-d H:i:s'); 
                        
                        mysqli_query($conn, "INSERT INTO post VALUES('', '$_POST[name]', '$date', '$creator', '$idroom', '$_POST[descriere]')");
                        
                        echo "1 record added";

                        $recordAdded = true;

                        
                        ?>
                        <script type="text/javascript">
                            var currString = "<?php echo $name ?>";
                            window.location=currString;
                        </script>
                        <?php
                    }
                        
                }
			
							
							
							
		?>


</div>
            </section>
            
			<section id="category">
		    </section>
				
<?php include('../includes/footer.php'); ?>