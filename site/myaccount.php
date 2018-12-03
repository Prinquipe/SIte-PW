<?php

    include ('includes/chooseHeader.php');
	$conn=mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "forum");
	

?>

<!-- Main -->
<section id="main">
				<div class="inner">
					
					<header>
						<h2>Contul meu</h2>
					</header>   
					<br>

					<!-- TABEL POSTARI!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
							<h3>Postarile mele</h3>
							<div class="table-wrapper">
								<table>

                                 <?php 
                                    $res=mysqli_query($conn,"SELECT * FROM user");
                                    /*$date = date('Y-m-d H:i:s');
                                    mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");*/
								?>
									<thead>
										<tr>
                                            <th>#</th>
											<th>TITLU</th>
											<th>DATA</th>
                                            <th>DESCRIERE</th>
                                            <th>EDITEAZA</th>
                                            <th>STERGE</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
											$iduser = $_SESSION["id_user"];
                                            $count = 1;
                                            $result = mysqli_query($conn, "SELECT * FROM post WHERE post_creator='$iduser'");
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                
                                               // $idpost = $row["id_post"];
                                                


                                                    echo "<tr>";
												    echo "<td>"; echo $count; echo "</td>";
												    echo "<td>"; echo $row["post_title"]; echo "</td>";
                                                    echo "<td>"; echo $row["post_date"]; echo "</td>";
                                                    echo "<td>"; echo $row["post_content"]; echo "</td>";

                
												    
                                                    echo "<td>"; ?> <a href="./editpost.php?id_post=<?php echo $row["id_post"]; ?>"> <img src="./images/edit-sign.png" height="30" width="30"> </a> <?php echo "</td>";
												    echo "<td>"; ?> <a href="./deletepost.php?id_post=<?php echo $row["id_post"]; ?>"> <img src="./images/delete.png" height="30" width="60"> </a> <?php echo "</td>";
												    echo "</tr>";
												    $count=$count + 1;
                                            }


											

                                                	
											
										?>
									</tbody>
								</table>
							</div>



					<!-- TABEL ROOOOOMS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
					<br><br>
					<h3>Camerele mele</h3>
							<div class="table-wrapper">
								<table>

                                 <?php 
                                    $res=mysqli_query($conn,"SELECT * FROM user");
                                    /*$date = date('Y-m-d H:i:s');
                                    mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");*/
								?>
									<thead>
										<tr>
                                            <th>#</th>
											<th>SUBIECT</th>
											<th>DATA</th>
                                            <th>TOPIC</th>
                                            <th>EDITEAZA</th>
                                            <th>STERGE</th>
										</tr>
									</thead>
									<tbody>

                                    <?php
											$iduser = $_SESSION["id_user"];
                                            $count = 1;
                                            $result = mysqli_query($conn, "SELECT * FROM room WHERE room_creator='$iduser'");
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                
                                               // $idpost = $row["id_post"];
                                                


                                                    echo "<tr>";
												    echo "<td>"; echo $count; echo "</td>";
												    echo "<td>"; echo $row["room_subject"]; echo "</td>";
													echo "<td>"; echo $row["room_date"]; echo "</td>";
													

													//echo "<td>"; echo $row["room_topic"]; echo "</td>";
													//AFISEZ TOPIC din tabelul topic
													echo "<td>";
													$idtop=$row["room_topic"];
													$result1 = mysqli_query($conn, "SELECT * FROM topic WHERE id_topic='$idtop'");
													$row1 = mysqli_fetch_array($result1);
													$topic_name = $row1["topic_name"];
													echo $topic_name;
													echo '</td>';
                
												    
                                                    echo "<td>"; ?> <a href="./editroom.php?id_room=<?php echo $row["id_room"]; ?>"> <img src="./images/edit-sign.png" height="30" width="30"> </a> <?php echo "</td>";
												    echo "<td>"; ?> <a href="./deleteroom.php?id_room=<?php echo $row["id_room"]; ?>"> <img src="./images/delete.png" height="30" width="60"> </a> <?php echo "</td>";
												    echo "</tr>";
												    $count=$count + 1;
                                            }


											

                                                	
											
										?>
									</tbody>
								</table>
							</div>


					<!-- END TABLES-->						
					
				</div>
			</section>

<?php include('includes/footer.php')?>