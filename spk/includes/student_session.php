<?php
	session_start();
	if(isset($_SESSION['student'])){
		
	}else{
		header("location:login.php?msg= No Student Access");
	}
?>