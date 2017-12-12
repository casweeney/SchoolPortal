<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
?>
<?php
	$query = " SELECT * FROM students WHERE id = '{$_SESSION['student_id']}' ";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$student_id = $result['id'];
			$student_reg_number = $result['reg_number'];
			$student_firstname = $result['firstname'];
			$student_lastname = $result['lastname'];
			$student_othername = $result['othername'];
			$student_othername = $result['othername'];
			$student_gender = $result['gender'];
			$student_state = $result['state'];
			$student_nationality = $result['nationality'];
			$dob = $result['dob'];
			$mob = $result['mob'];
			$yob = $result['yob'];
			$student_phone = $result['contactphone'];
			$student_address = $result['address'];
			$student_password = $result['password'];
			$student_class = $result['studentclass'];
			$sponsor_name = $result['sponsorname'];
			$sponsor_phone = $result['sponsorphone'];
			$sponsor_relationship = $result['relationship'];
			$reg_date = $result['date_of_reg'];
			$reg_day = substr($reg_date, 0, 2);
			$reg_month = substr($reg_date, 3, 3);
			$reg_year = substr($reg_date, 7, 4);
			$student_age = $reg_year - $yob;
			
			
			$msg_reg_number = "{$student_reg_number} <br />";
			$msg_firstname = "{$student_firstname} <br />";
			$msg_lastname = "{$student_lastname} <br />";
			$msg_othername = "{$student_othername} <br />";
			$msg_gender = ucfirst($student_gender);
			$msg_state = "{$student_state} <br />";
			$msg_nationality = "{$student_nationality} <br />";
			$msg_dob = "{$dob} <br />";
			$msg_mob = "{$mob} <br />";
			$msg_yob = "{$yob} <br />";
			$msg_phone = "{$student_phone} <br />";
			$msg_address = "{$student_address} <br />";
			$msg_password = "{$student_password} <br />";
			$msg_class = "{$student_class} <br />";
			$msg_sponsor_name = "{$sponsor_name} <br />";
			$msg_sponsor_phone = "{$sponsor_phone} <br />";
			$msg_sponsor_relationship = "{$sponsor_relationship} <br />";
			$msg_reg_day = "{$reg_day} <br />";
			$msg_reg_month = "{$reg_month} <br />";
			$msg_reg_year = "{$reg_year} <br />";
			$msg_student_age = "{$student_age} <br />";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<head>
		<title><?php echo $msg_lastname; ?> - Print Slip</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="description" content="print registration slip" />
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="css/font-awesome.css" />
		<link rel="stylesheet" href="css/defined.css" />
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
	<br />
		<div class="container">
			<div class='row'>
				<div class='panel panel-primary'>
					<div class='panel-body'>
						<div class='col-md-2 thumbnail text-center'>
							<img src='img/c.jpg' class='img-responsive img-rounded' />
						</div>
						
						<div class='col-md-2'>
							<br />
							<h3>Casweeney Chisom Ojukwu</h3>
							<form>
								<input type='submit' name='upload_image_btn' value='Upload Image' class='btn btn-primary btn-xs text-center' />
							</form>
						</div>
						
						<div class='col-md-4'>
							<br />
							<br />
							<p><span style='font-weight: bold;'>Gender:</span> Male</p>
							<p><span style='font-weight: bold;'>State:</span> Anambra</p>
							<p><span style='font-weight: bold;'>LGA:</span> Aguata</p>
							<p><span style='font-weight: bold;'>Nationality:</span> Nigerian</p>
						</div>
						<div class='col-md-4'>
							<br />
							<br />
							<p><span style='font-weight: bold;'>Address:</span> 39 Border Road, Ikom</p>
							<p><span style='font-weight: bold;'>Phone:</span> 07036798652</p>
							<p><span style='font-weight: bold;'>Class:</span> SSS3</p>
							<form>
								<input type='submit' name='edit_profile_btn' value='Edit Profile' class='btn btn-primary btn-xs text-center' />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>