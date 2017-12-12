<?php
	require_once("includes/staff_session.php");
	require_once("includes/connection.php");
?>
<?php
	if(isset($_POST['back_to_dashboard_btn'])){
		header("Location:staff_dashboard.php");
	}
	if(isset($_POST['back_to_login_btn'])){
		header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<head>
		<title>Print Registration Slip</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="description" content="print registration slip" />
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="css/font-awesome.css" />
        <link rel="shortcut icon" href="img/icon.png">
		<link rel="stylesheet" href="css/defined.css" />
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<br />
		<div class='container'>
			<div class='row'>
				<div class='col-md-2'>
				
				</div>
				
				<div class='col-md-8'>
					<div class='panel panel-success'>
						<div class='panel-heading'>
							<h3>Registration Successfull ...</h3>
						</div>
						<div class='panel-body'>
							<form method='POST' action=''>
								<div class=''>
									<input type='submit' name='back_to_dashboard_btn' value='Back To Dashboard' class='btn btn-success' />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type='submit' name='back_to_login_btn' value='Login' class='btn btn-success' />
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<div class='col-md-2'>
				
				</div>
			</div>
		</div>
	</body>
</html>