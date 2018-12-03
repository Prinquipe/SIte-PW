<?php
	
	session_start();
	
?>
<?php include "adminHeader.php"; ?>
<?php
    $conn=mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "forum"); 
        
	$id=$_GET["id_topic"]; //numele variabilei din fisierul asta poate sa fie oricare
    
	$res=mysqli_query($conn, "SELECT * FROM topic where id_topic=$id");
	while($row=mysqli_fetch_array($res)){
		
		$name=$row["topic_name"];
		$des=$row["topic_description"];
        
    }
        
?>

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/pic11.jpg" alt="" />
					</div>
					<header>
						<h1>Editare Topic</h1>
						
						
                        <div class="table-wrapper">

                                 <?php 
                                    $res=mysqli_query($conn,"SELECT * FROM topic");
                                    /*$date = date('Y-m-d H:i:s');
                                    mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");*/
								?>
									<form id="form1" name="form1" runat="server" action="" method="POST" enctype="multipart/form-data">

                        
                                    <h3>Titlu:</h3>
                                    <input name="name" type="text"  value="<?php echo $name ?>"/> <br>



                                    <h3>Descriere:</h3>
                                    <textarea name="descriere" id='comment' ><?php echo $des ?></textarea><br />
                                    <!--<input name="descriere" type="textarea"  /> <br>-->

                                    
                                    <button type="submit" name="submitedit" class="button special">Edit</button> &nbsp; &nbsp;
                                    <button type="submit" name="renunta" class="button special">Renunta</button>
                                    </form>
									<br><br> <br><br><br><br>
							</div>

						<?php
							
							if(isset($_POST["renunta"])){
								?>
								<script type="text/javascript">
								window.location="admin.php#Topics";
								</script>
								<?php
							}
							else{
								if(isset($_POST["submitedit"]))
								{
									mysqli_query($conn,"UPDATE topic SET  topic_name='$_POST[name]', topic_description='$_POST[descriere]' WHERE id_topic=$id");
									
									echo "1 record updated";

										?>
										<script type="text/javascript">
													window.location="admin.php#Topics";
										</script>
									<?php 	
								}
							}
							
							
							
					?>

                    
               


					</header>
				</div>
			</section>

<?php include "footer.php"?>