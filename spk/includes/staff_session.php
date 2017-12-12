<?php
	session_start();
	if(isset($_SESSION['admin'])){
		
	}else{
		header("location:login.php?msg= No Admin Access");
	}
?>