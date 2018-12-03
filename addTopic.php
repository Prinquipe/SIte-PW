
<?php include "adminHeader.php"; ?>


<?php

	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	
	//$id=$_GET["id_topic"]; //numele variabilei din fisierul asta poate sa fie oricare
    
	/*$res=mysqli_query($conn, "SELECT * FROM topic where id_topic=$id");
	while($row=mysqli_fetch_array($res)){
		
		$name=$row["topic_name"];
		$des=$row["topic_description"];
        
    }*/
?>

<!-- Main -->
<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/pic11.jpg" alt="" />
					</div>
					<header>
						<h2>Add Topic</h2>
                        
                        
							<div class="table-wrapper">
								

                                 <?php 
                                    $res=mysqli_query($conn,"SELECT * FROM topic");
                                    /*$date = date('Y-m-d H:i:s');
									mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");*/
								?>

									<script type="text/javascript">
										function myFunction(){

										//alert("You button was pressed");
										window.location="admin.php#Topics";

										};

									</script>
									<script type="text/javascript">
										function validateForm()
										{
											var a=document.forms["Form"]["name"].value;
											var b=document.forms["Form"]["descriere"].value;
											if (a==null || a=="",b==null || b=="")
											{
												alert("Please Fill All Required Field");
												return false;
											}
										}
									</script>

								
									<form id="form1" name="Form" runat="server" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

                        
                                    <h3>Titlu:</h3>
                                    <input name="name" type="text" /> <br>



                                    <h3>Descriere:</h3>
                                    <textarea name="descriere" id='comment' ></textarea><br><br>

                                    
                                    <button type="submit" name="add" class="button special">Add</button> &nbsp; &nbsp;
                                    <button type="submit" name="renunta" class="button special" onclick="myFunction();">Renunta</button>
                                    </form>
                                    <br><br><br>
							</div>



                    </header>
                    
                    <?php
								$recordAdded = false;
								if(isset($_POST["add"])){
		
									mysqli_query($conn, "INSERT INTO topic VALUES('','$_POST[name]','$_POST[descriere]')");
									
									echo "1 record added";

									$recordAdded = true;
                                    ?>
                                    <script type="text/javascript">
                                    window.location="admin.php#Topics";
                                    </script>
                                    <?php
									
								}
							
								
								
					?>
							
								
				
				</div>
</section>



<?php include "footer.php"?>