<?php
	
	session_start();
	
	if(isset($_POST['submit1'])){
		
		$link=mysqli_connect("localhost", "root", "");
	    mysqli_select_db($link, "forum");
		

		
		$uid = mysqli_real_escape_string($link, $_POST['username']);
		$pwd = mysqli_real_escape_string($link, $_POST['password']);
		
		if(empty($uid) || empty($pwd)){
			
		    header("Location: ./LogIn.php?login=empty");
			exit();
		}
		else{
			
			$sql = "SELECT * FROM user WHERE user_nam='$uid'";
			$result = mysqli_query($link, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck < 1){
				
				header("Location: ./index.php?login=error");
				exit();
			}
			else{
				
				if($row = mysqli_fetch_assoc($result)){
					
					$hashedPwdCheck = password_verify($pwd, $row['user_password']);
					if($hashedPwdCheck == false){
						
						header("Location: ./index.php?login=error");
						exit();
					}
					elseif($hashedPwdCheck == true){
						
						$_SESSION['id_user'] = $row['id_user'];
						$_SESSION['user_nam'] = $row['user_nam'];
						$_SESSION['user_email'] = $row['user_email'];
						$_SESSION['type'] = $row['type'];
						if($row['type'] == 'Admin'){
							
							header("Location: ../admin.php");
							exit();
						}
						else{
							header("Location: ./index.php?login=success");
							exit();
						}
					}
				}
			}
		}
	}
	else{
		
		header("Location: ./index.php?login=error");
		exit();
	}

?>