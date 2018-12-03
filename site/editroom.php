<?php
    include ('includes/chooseHeader.php');

	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	
	$id=$_GET["id_room"]; //numele variabilei din fisierul asta poate sa fie oricare
    
	$res=mysqli_query($conn, "SELECT * FROM room where id_room=$id");
	while($row=mysqli_fetch_array($res)){
		
		$titlu=$row["room_subject"];
		$data=$row["room_date"];
    }
?>

<!-- Main -->
<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/pic11.jpg" alt="" />
					</div>
					<header>
						<h2>Editare Camera</h2>
                        
                            <script type="text/javascript">
								function myFunction(){
									window.location="myaccount.php";
								};

                            </script>
                            
							<div class="table-wrapper">
								<table>

                                 <?php 
                                    $res=mysqli_query($conn,"SELECT * FROM post");
                                    /*$date = date('Y-m-d H:i:s');
                                    mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");*/
								?>
									<form id="form1" name="form1" runat="server" action="" method="POST" enctype="multipart/form-data">

                        
                                    <h3>Titlu:</h3>
                                    <input name="titlu" type="text" value="<?php echo $titlu ?>" required /> <br>

									
                                    <button type="submit" name="submitedit" class="button special">Edit</button> &nbsp; &nbsp;
									<button type="submit" name="renunta" class="button special" onclick="myFunction();">Renunta</button>
                                    </form>
                                    <br><br> <br><br><br><br>
							</div>



                    </header>

                    
                    <?php
							
                                if(isset($_POST["submitedit"]))
                                {
									$date = date('Y-m-d H:i:s');
									//mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");
									
									mysqli_query($conn,"UPDATE room SET  room_subject='$_POST[titlu]' WHERE id_room=$id");
									mysqli_query($conn,"UPDATE room SET  post_date='$date' WHERE id_room=$id");

									echo "1 record updated";

						?>
							<script type="text/javascript">
										window.location="myaccount.php";
							</script>
						<?php 	
								}
								
						?>
				</div>
</section>

<?php //include('includes/footer.php')?>
