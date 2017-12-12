<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SPK</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<meta name='description" content="student registration' />
		<link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
		<link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
        <link rel="shortcut icon" href="img/icon.png">
		<link rel='stylesheet' href='css/defined.css' />
		<script type='text/javascript' src='js/jquery-1.11.3.min.js'></script>
		<script src='js/bootstrap.js'></script>
	</head>
	<body>
		<br />
		<br />
		<br />
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-4'>
				
				</div>
				
				<div class='col-md-4'>
					<div class='row'>
						<div class='col-md-12' id='log' style='border: 2px solid #aaa; border-radius: 10px;'>
							<h3 class='log-text'>Staff Login</h3>
							<br />
							
							<form class='' id='login' method='POST' action=''>
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>EMAIL</span>
									<input type='text' placeholder='Enter Email Address' class='form-control' name='staff_email' />
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>PASSWORD</span>
									<input type='password' placeholder='Enter Password' class='form-control' name='staff_password' />
								</div>
								<br />
								<p id='btnsubmit'><input type='submit' id='submit' value='LOGIN' class='btn btn-large btn-success login_btn text-center' name='login_btn' /></p>
							</form>
						</div>
					</div>
				</div>
				
				<div class='col-md-4'>
				
				</div>
			</div>
		</div>
	</body>
</html>