
<?php include ('includes/chooseHeader.php'); ?>


<?php

	$conn=mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "forum");
    $topic = $_GET["id_topic"];
	
?>

<!-- Main -->
<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/pic11.jpg" alt="" />
					</div>
					<header>
						<h2>Adaugă Subiect</h2>
                        
                        
							<div class="table-wrapper">
								

                                 <?php 
                                    $res=mysqli_query($conn,"SELECT * FROM room");
                                   
								?>

									<script type="text/javascript">
										function myFunction(){

										//alert("You button was pressed");
										window.location="forum.php";

										};

									</script>
									<script type="text/javascript">
										function validateForm()
										{
											var a=document.forms["Form"]["subiect"].value;
											
											if (a==null || a=="")
											{
												alert("Please Fill All Required Field");
												return false;
											}
										}
									</script>

								
									<form id="form1" name="Form" runat="server" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">

                        
                                    <h3>Subiect</h3>
                                    <input name="subiect" type="text" /> <br>

                                    
                                    

                                    <!--<div class="12u$">
										<div class="select-wrapper">
											<select name="category" id="category">
                                                < ?php
                                                    $res=mysqli_query($conn,"SELECT * FROM topic");
                                                    while($row = mysqli_fetch_array($res))
                                                    {
                                                        ?><option value="< ?php$row["id_topic"]?>">< ?php echo $row["topic_name"]; ?></option> < ?php
                                                    }
                                                ?>
                                            </select>
										</div>
                                    </div>-->
                                   <br><br>

                                    <button type="submit" name="add" class="button special">Add</button> &nbsp; &nbsp;
                                    <button type="submit" name="renunta" class="button special" onclick="myFunction();">Renunta</button>
                                    </form>
                                    <br><br><br>
							</div>



                    </header>
                    
                    <?php
								$recordAdded = false;
								if(isset($_POST["add"])){
                                    if(!isset($_SESSION["id_user"])){
                                        echo '<script>window.location="LogIn.php"</script>';
                                        exit();
                                    }
                                    else{
                                        $creator = $_SESSION["id_user"];
                                        $date = date('Y-m-d H:i:s'); 
                                        
                                         

                                        mysqli_query($conn, "INSERT INTO room VALUES('', '$date', '$_POST[subiect]','$topic', '$creator')");
                                        
                                        echo "1 record added";

                                        $recordAdded = true;
                                        ?>
                                        <script type="text/javascript">
                                        window.location="forum.php";
                                        </script>
                                        <?php
                                    }
								}
							
								
								
					?>
							
								
				
				</div>
</section>



<?php include('includes/footer.php');?>