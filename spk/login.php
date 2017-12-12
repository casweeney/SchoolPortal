<?php
	require_once("includes/connection.php");
	require_once("includes/functions.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
	$year = date('Y');
?>
<?php
	if(isset($_POST['login_btn'])){
		$login_id = inject_checker($connection, $_POST['login_id']);
		$login_password = inject_checker($connection, $_POST['login_password']);
		
		if(empty($login_id)){
			$error[] = "Email OR Reg no is Required";
		}
		if(empty($login_password)){
			$error[] = "Password is Required";
		}
		if(empty($error)){
			$query = " SELECT * FROM `users` WHERE `email` = '{$login_id}' AND `password` = '{$login_password}' ";
			$run_query = mysqli_query($connection, $query);
			if(mysqli_num_rows($run_query) == 1){
				session_start();
				
				while($result = mysqli_fetch_assoc($run_query)){
					$user_id = $result['id'];
					$_SESSION['admin'] = $user_id;
					
					header("Location:staff_dashboard.php");
				}
			}

			$query = " SELECT * FROM `students` WHERE `reg_number` = '{$login_id}' AND `gen_password` = '{$login_password}' ";
			$run_query = mysqli_query($connection, $query);
			if(mysqli_num_rows($run_query) == 1){
				session_start();
				
				while($result = mysqli_fetch_assoc($run_query)){
					$student_id = $result['id'];
					$_SESSION['student'] = $student_id;
					
					header("Location:student_dashboard.php");
				}
			}			
			else{
				$msg = "Login Failed";
			}
		}
	}
?>
<?php
	if(isset($_POST['to_home_btn'])){
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SPK - LOGIN</title>
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
		<div class='container-fliud'>
			<header class='row' id='header'>
				<div class='col-md-2'>
				
				</div>
				
				<div class='col-md-8 text-center'>
					<h1 style='color: #fff;'>School Portal Kit</h1>
				</div>
				
				<div class='col-md-2'>
				
				</div>
			</header>
			<br />
			<br />
			<div class='row'>
				<div class='col-md-3'>
				
				</div>
				
				<div class='col-md-6'>
					<div class='row'>
						<div class='col-md-12' id='log'>
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<h3 class='log-text'>Student / Staff Login</h3>
									<p>
										<?php
											if(isset($msg)){
												echo $msg;
											}
										?>
									</p>
								</div>
								<div class='panel-body'>	
									<form method='POST' action=''>
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Reg No. / Email</span>
											<input type='text' name='login_id' placeholder='Enter Reg No OR Email Address' class='form-control' />
										</div>
										<br />
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Password</span>
											<input type='password' name='login_password' placeholder='Enter Password' class='form-control' />
										</div>
										<br />
										<p id='btnsubmit'><input type='submit' name='login_btn' id='submit' value='LOGIN' class='btn btn-large btn-success login_btn text-center' />
										<input type='submit' name='to_home_btn' id='submit' value='BACK TO HOMEPAGE' class='btn btn-large btn-success login_btn text-center' /></p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class='col-md-3'>
				
				</div>
			</div>
		</div>
		
		<footer>
			<div class='container'>
				<p class='text-center' style='color: #666;'>Copyright &#169; <?php echo $year ?> // Product of <a href='http://www.toxaswift.com'>Toxaswift Inc.</a> // <span class='glyphicon glyphicon-envelope'></span> info@toxaswift.com</p>
			</div>
		</footer>
	</body>
</html>