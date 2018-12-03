<?php
	session_start();
	if(isset($_SESSION['id_user'])){
		include "headerLogIn.php";
	}
	else{
		include "header.php";
	}
?>