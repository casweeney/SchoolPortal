<?php
	session_start();
	if(isset($_SESSION['control'])){
		
	}else{
		header("location:secured.php?msg= No Access");
	}
?>