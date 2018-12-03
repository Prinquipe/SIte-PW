<?php

    include ('includes/chooseHeader.php');
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
						<h1>Dă drumul la plângeri</h1>
					</header>
					<!--<h2>Topic</h2>-->
					<?php
									/*$res=mysqli_query($conn,"SELECT * FROM topic");
									$idtop = $_SESSION["id_topic"];*/
                                   
                                	$result = mysqli_query($conn, "SELECT * FROM topic");
                                    while($row = mysqli_fetch_array($result))
                                    {
                                                
                                    // $idpost = $row["id_post"];
										
									   //aici creez fisier pt topic

									   	$path = "./topics/";
										$topicname = $row["id_topic"];
										//echo $topicname;
										//echo $row["topic_name"];
										$name = $topicname;
										$end = ".php";
										$filename = $path.$name;
										$filename = $filename.$end;
										//echo $filename;
										$fp=fopen($filename, 'w');
										fwrite($fp, 'data to be written');

										//citeste model scrie in .php la topicuri
										$file1 = file_get_contents("examplehead.php");
										$path2 = $filename;
										$file2 = file_get_contents($path2);
										if ($file1 !== $file2){
											file_put_contents($path2, $file1);
										}
										

										        
                                        //AFISARE TOPIC
										echo "<header>";
											echo "<h3>"; ?> <a href="<?php echo "$filename";?>"><?php echo $row["topic_name"]; echo "</a></h3>";
											echo "<p>"; echo $row["topic_description"]; echo "</p>"; 
										echo "</header>";	
                                        //echo "<p>"; echo $row["topic_description"]; echo "</p><br><br>";
											    
                                       echo "<br>"; 
										?>

										<table>
										<thead>
											<tr>
												<th>#</th>
												<th>SUBIECT</th>
												<th>DATA</th>
												
												<th>CREATOR</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//adauga rooms in fiecare fisier id.php
												$result2 = mysqli_query($conn, "SELECT * FROM room");

												$contor=1;
												while($row2 = mysqli_fetch_array($result2))
												{
													echo "<tr>";
													echo "<td>"; echo $contor; echo "</td>";
													echo "<td>"; echo $row2["room_subject"]; echo "</td>";
													echo "<td>"; echo $row2["room_date"]; echo "</td>";
													/*echo "<td>"; echo $row["room_topic"]; echo "</td>";*/
													/*echo "<td>"; echo $row["room_creator"]; echo "</td>";*/

													


													echo "<td>";
													$id=$row2["room_creator"];
													$result5 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
													$row5 = mysqli_fetch_array($result5);
													$uname = $row5["user_nam"];
													echo $uname;
													echo '</td>';

													
													echo "</tr>";
													$contor=$contor + 1;
												}




												fclose($fp);
												}	
											?>
										</tbody>
										</table>
									

					


						
					
				</div>
			</section>
			<section id="category">
		</section>
				
<?php include('includes/footer.php'); ?>