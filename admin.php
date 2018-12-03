<?php
	
	session_start();
	
?>
<?php include "adminHeader.php"; ?>
<?php
    $conn=mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "forum"); 
        
        
        
?>

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/pic11.jpg" alt="" />
					</div>
					<header>
						<h1>Admin Page</h1>
						
						<div class="6u 12u$(xsmall)">

						<h4></h4>
									<ul class="alt">
										<li><a href="#Utilizatori"> Utilizatori</a></li>
										<li><a href="#Topics">Topics</a></li>
										<li><a href="#Rooms">Rooms</a></li>
										<li><a href="#Postari">Postari</a></li>
									</ul>
						</div>

                        <!--UTILIZATORI!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
						<a name="Utilizatori"> <hr> </a>
						<br>
						<h4>Utilizatori</h4>
                        
							<div class="table-wrapper">
								<table>

                                 <?php 
									$res=mysqli_query($conn,"SELECT * FROM user");
								?>
									<thead>
										<tr>
											<th>#</th>
											<th>USERNAME</th>
											<th>EMAIL</th>
											<th>STERGE</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
											
											$contor=1;
											while($row=mysqli_fetch_array($res)){
                                                
                                                if($row['type'] == 'User')
                                                {
                                                    echo "<tr>";
												    echo "<td>"; echo $contor; echo "</td>";
												    echo "<td>"; echo $row["user_nam"]; echo "</td>";
												    echo "<td>"; echo $row["user_email"]; echo "</td>";
                                                    
												    
												    echo "<td>"; ?> <a href="./deleteuser.php?id_user=<?php echo $row["id_user"]; ?>"> <img src="./images/delete-sign.png" height="30" width="60"> </a> <?php echo "</td>";
												    echo "</tr>";
												    $contor=$contor + 1;

                                                }	
											}
										?>
									</tbody>
								</table>
							</div>

							<!--TOPICS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
							<a name="Topics"><hr></a>
							<br>
							<h4>Topics</h4>
                        
						<div class="table-wrapper">
							<table>

							 <?php 
								$res=mysqli_query($conn,"SELECT * FROM topic");
							?>
								<thead>
									<tr>
										<th>#</th>
										<th>NAME</th>
										<th>DESCRIPTION</th>
										<th>EDIT</th>
										<th>STERGE</th>
									</tr>
								</thead>
								<tbody>
								<?php
										
										$contor=1;
										while($row=mysqli_fetch_array($res))
										{
												echo "<tr>";
												echo "<td>"; echo $contor; echo "</td>";
												echo "<td>"; echo $row["topic_name"]; echo "</td>";
												echo "<td>"; echo $row["topic_description"]; echo "</td>";
												
												echo "<td>"; ?> <a href="./edittopic.php?id_topic=<?php echo $row["id_topic"]; ?>"> <img src="./images/edit-sign.png" height="30" width="30"> </a> <?php echo "</td>";
												echo "<td>"; ?> <a href="./deletetopic.php?id_topic=<?php echo $row["id_topic"]; ?>"> <img src="./images/delete-sign.png" height="30" width="60"> </a> <?php echo "</td>";
												echo "</tr>";
												$contor=$contor + 1;

												
										}
									?>
								</tbody>
							</table>

							<a href="addTopic.php" class="button special">Add New Topic</a>
						</div>
						
						<!--ROOMS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
						<a name="Rooms"><hr></a>
							<br>
							<h4>Rooms</h4>
                        
						<div class="table-wrapper">
							<table>

							 <?php 
								$res=mysqli_query($conn,"SELECT * FROM room");
							?>
								<thead>
									<tr>
										<th>#</th>
										<th>SUBIECT</th>
										<th>DATA</th>
										<th>TOPIC</th>
										<th>CREATOR</th>
										<th>STERGE</th>
									</tr>
								</thead>
								<tbody>
								<?php
										
										$contor=1;
										while($row=mysqli_fetch_array($res))
										{
												echo "<tr>";
												echo "<td>"; echo $contor; echo "</td>";
												echo "<td>"; echo $row["room_subject"]; echo "</td>";
												echo "<td>"; echo $row["room_date"]; echo "</td>";
												/*echo "<td>"; echo $row["room_topic"]; echo "</td>";*/
												/*echo "<td>"; echo $row["room_creator"]; echo "</td>";*/

												echo "<td>";
												$id1=$row["room_topic"];
												$result6 = mysqli_query($conn, "SELECT * FROM topic WHERE id_topic='$id1'");
												$row1 = mysqli_fetch_array($result6);
												$topic = $row1["topic_name"];
												echo $topic;
												echo '</td>';


												echo "<td>";
												$id=$row["room_creator"];
												$result5 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
												$row5 = mysqli_fetch_array($result5);
												$uname = $row5["user_nam"];
												echo $uname;
												echo '</td>';

												echo "<td>"; ?> <a href="./deleteroom.php?id_room=<?php echo $row["id_room"]; ?>"> <img src="./images/delete-sign.png" height="30" width="60"> </a> <?php echo "</td>";
												echo "</tr>";
												$contor=$contor + 1;

												
										}
									?>
								</tbody>
							</table>

							
						</div>


						<!--POSTARI!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
						<a name="Postari"><hr></a>
						<br>
						<h4>Postari</h4> 
                        
						<div class="table-wrapper">
							<table>

							 <?php 
								$res=mysqli_query($conn,"SELECT * FROM post");
							?>
								<thead>
									<tr>
										<th>#</th>
										<th>TITLU</th>
										<th>DATA</th>
										<th>CREATOR</th>
										<th>ROOM</th>
										<th>STERGE</th>
									</tr>
								</thead>
								<tbody>
								<?php
										
										$contor=1;
										while($row=mysqli_fetch_array($res))
										{
												echo "<tr>";
												echo "<td>"; echo $contor; echo "</td>";
												echo "<td>"; echo $row["post_title"]; echo "</td>";
												echo "<td>"; echo $row["post_date"]; echo "</td>";
												echo "<td>"; //echo $row["post_creator"]; echo "</td>";
												$id=$row["post_creator"];
												$result5 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
												$row5 = mysqli_fetch_array($result5);
												$uname = $row5["user_nam"];
												echo $uname;
												echo '</td>';

												/*echo "<td>"; echo $row["post_room"]; echo "</td>";
												*/
												echo "<td>";
												$id=$row["post_room"];
												$result5 = mysqli_query($conn, "SELECT * FROM room WHERE id_room='$id'");
												$row5 = mysqli_fetch_array($result5);
												$uname = $row5["room_subject"];
												echo $uname;
												echo '</td>';

												
												echo "<td>"; ?> <a href="./deletepost.php?id_post=<?php echo $row["id_post"]; ?>"> <img src="./images/delete-sign.png" height="30" width="60"> </a> <?php echo "</td>";
												echo "</tr>";
												$contor=$contor + 1;

												
										}
									?>
								</tbody>
							</table>
						</div>




					</header>
				</div>
			</section>

<?php include "footer.php"?>