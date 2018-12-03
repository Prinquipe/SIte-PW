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
									$result = mysqli_query($conn, "SELECT * FROM topic");
									
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        //AFISARE TOPIC
										echo "<header>";
											echo "<h3>";  echo $row["topic_name"]; echo "</h3>";
											echo "<p>"; echo $row["topic_description"]; echo "</p>"; 
										echo "</header>";	
									   
										$topid = $row["id_topic"];
										
											    
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
												//adauga rooms sub fiecare topic
												
												$result2 = mysqli_query($conn, "SELECT * FROM room");

												$contor2=1;
												while($row2 = mysqli_fetch_array($result2))
												{
													$roomtop = $row2["room_topic"];
													//$idroom = $row2["id_room"];

													if($topid == $roomtop)
													{
														echo "<tr>";
														echo "<td>"; echo $contor2; echo "</td>";
														//AICI O SA CREEZ CATE O PAGINA PENTRU FIECARE ROOM !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
															
															$path = "./rooms/";
															$room_name = $row2["id_room"];
															$name = $room_name;
															$end = ".php";
															$filename = $path.$name;
															$filename = $filename.$end;
															//echo $filename; 
															$fp=fopen($filename, 'w');
															

															//citeste model scrie in .php la topicuri
															$file1 = file_get_contents("examplehead.php");
															$path2 = $filename;
															$file2 = file_get_contents($path2);
															if ($file1 !== $file2){
																file_put_contents($path2, $file1);
															}

															//include 'scriefile.php'; //Aici includ fisierul unde o sa scriu in fiecare file.php pt fiecare room
															//SCRIE MIDDLE in file
															$file1 = file_get_contents("middle.php");
															$path2 = $filename;
															$file2 = file_get_contents($path2);
															if ($file1 !== $file2){
																file_put_contents($path2, $file1, FILE_APPEND);
															}

															//SCRIE FOOTER in file
															$file1 = file_get_contents("examplefooter.php");
															$path2 = $filename;
															$file2 = file_get_contents($path2);
															if ($file1 !== $file2){
																file_put_contents($path2, $file1, FILE_APPEND);
															}

															echo "<td>"; ?> <a href="<?php echo "$filename";?>"><?php echo $row2["room_subject"]; echo "</a></td>";

														//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
														//afisez DATA
														echo "<td>";  echo $row2["room_date"]; echo "</td>";

														//afisez USER
														echo "<td>";
														$id=$row2["room_creator"];
														$result5 = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
														$row5 = mysqli_fetch_array($result5);
														$uname = $row5["user_nam"];
														echo $uname;
														echo '</td>';

														
														echo "</tr>";
														$contor2=$contor2 + 1;
													}
													
													
												}
												?>

												</tbody>
										</table>
											
												
											<!-- ADAUG BUTON !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
											
											<a href="addRoom.php?id_topic=<?php echo $row["id_topic"]; ?>" class="button small">Adaugă Subiect</a>
											<br><br>
											<?php

										echo "<br><br>";
									}	
											?>
										
									

					


						<?php fclose($fp); ?>
					
				</div>
			</section>
			<section id="category">
		</section>
				
<?php include('includes/footer.php'); ?>