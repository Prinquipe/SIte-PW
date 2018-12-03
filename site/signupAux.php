<?php
	if(isset($_POST['submit2'])){
		
		$link=mysqli_connect("localhost", "root", "");
	    mysqli_select_db($link, "forum");
		
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		
		if(empty($username) || empty($password) || empty($cpassword) || empty($email)){
			
			header("Location: ./signin.php?signup=empty");
			exit();
		}
		/*else{*/
			
			/*if(!preg_match("/^[a-zA-Z]*$", $username)){
				
				header("Location: ./signin.php?signup=invalid");
				exit();
			}*/
			else{
				
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					
					header("Location: ./signin.php?signup=invalidEmail");
					exit();
				}
				else{
					if($password != $cpassword){
						echo '<script>alert("Passwords do not match")</script>';
						echo '<script>window.location="signin.php"</script>';
						exit();
					}
					else{
						$sql = "SELECT * FROM user WHERE user_nam='$username'";
						$result = mysqli_query($link, $sql);
						$resultCheck = mysqli_num_rows($result);
						
						if($resultCheck > 0){
							
							header("Location: ./signin.php?signup=usernameTaken");
							exit();
						}
						else{
							
							//Hashing password
							
							$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
							
							//Insert the user into the database
							
							$sql = "INSERT INTO user (user_nam, user_password, user_email) VALUES('$username', '$hashedPwd', '$email');";
							mysqli_query($link, $sql);
							header("Location: ./LogIn.php?signup=succes");
							exit();
						}

					}
					
						
				}

				
				
			/*}*/
		}
	}
	else{
		
		header("Loaction: ./signup.php");
		exit();
	}

?>