<?php
	require_once("includes/connection.php");
	require_once("includes/functions.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SPK - ACCESS CONROL</title>
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
							<?php
								if(isset($_POST['grant_control_access_btn'])){
									$control_access_txt = inject_checker($connection, strtolower($_POST['control_access_txt']));
									$access_location = $_POST['access_location'];
									
									if($access_location == $select){
										echo "<p class='text-danger'><b>Please Select the Location You Want to Access</b></p>";
									}
									elseif(empty($control_access_txt)){
										echo "<p class='text-danger'><b>Control Access Field can not be empty</b></p>";
									}else{
										if($access_location === "Generate Pin"){
											$query = " SELECT * FROM `access` WHERE `control_access` = '{$control_access_txt}' ";
											$run_query = mysqli_query($connection, $query);
											
											if(mysqli_num_rows($run_query) == 1){
												session_start();
												while($result = mysqli_fetch_assoc($run_query)){
													$user_access = $result['control_access'];
													$_SESSION['control'] = $user_access;
													
													header("Location: generator.php");
												}
											}else{
												echo "<p class='text-danger'><b>Login Failed!</b></p>";
											}
										}else{
											if($access_location === "Manage Control Access"){
												$query = " SELECT * FROM `access` WHERE `control_access` = '{$control_access_txt}' ";
												$run_query = mysqli_query($connection, $query);
												
												if(mysqli_num_rows($run_query) == 1){
													session_start();
													while($result = mysqli_fetch_assoc($run_query)){
														$user_access = $result['control_access'];
														$_SESSION['control'] = $user_access;
														
														header("Location: control.php");
													}
												}else{
													echo "<p class='text-danger'><b>Login Failed!</b></p>";
												}
											}
										}
									}
								}
							?>
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<h3 class='log-text'>Control Access Login</h3>
								</div>
								<div class='panel-body'>	
									<form method='POST' action=''>
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Access Location:</span>
											<select name='access_location' class='form-control'>
												<option selected><?php echo $select; ?></option>
												<option>Generate Pin</option>
												<option>Manage Control Access</option>
											</select>
										</div>
										<br />
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Control Access:</span>
											<input type='password' name='control_access_txt' placeholder='Enter Control Access' class='form-control' />
										</div>
										<br />
										<input type='submit' name='grant_control_access_btn' value='GRANT ACCESS' class='btn btn-success login_btn text-center' />
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
	</body>
</html>