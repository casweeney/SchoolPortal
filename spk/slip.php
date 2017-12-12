<?php
	require_once("includes/staff_session.php");
	require_once("includes/connection.php");
?>
<?php
	$query = " SELECT * FROM students WHERE id = '{$_SESSION['admin']}' ";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$student_id = $result['id'];
			$student_reg_number = $result['reg_number'];
			$student_firstname = ucfirst($result['firstname']);
			$student_lastname = ucfirst($result['lastname']);
			$student_othername = ucfirst($result['othername']);
			$student_gender = ucfirst($result['gender']);
			$student_state = ucfirst($result['state']);
			$student_nationality = ucfirst($result['nationality']);
			$dob = $result['dob'];
			$mob = $result['mob'];
			$yob = $result['yob'];
			$student_phone = $result['contact_phone'];
			$student_address = ucwords($result['address']);
			$student_password = $result['gen_password'];
			$student_passport = "./".$result['passport'];
			$student_class = $result['class'];
			$sponsor_name = ucwords($result['sponsor_name']);
			$sponsor_phone = $result['sponsor_phone'];
			$sponsor_relationship = ucfirst($result['relationship']);
			$reg_date = $result['date_of_reg'];
			$reg_day = substr($reg_date, 0, 2);
			$reg_month = substr($reg_date, 3, 3);
			$reg_year = substr($reg_date, 7, 4);
			$student_age = $reg_year - $yob;
			
			
			$msg_reg_number = "{$student_reg_number} <br />";
			$msg_firstname = "{$student_firstname}";
			$msg_lastname = "{$student_lastname}";
			$msg_othername = "{$student_othername}";
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
<?php
	$query = " SELECT * FROM `administratives` ";
	$run_query = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$school_logo = $result['school_logo'];
			$school_name = $result['school_name'];
			$school_address = $result['school_motto'];
			$school_stamp = $result['school_stamp'];
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
        <link rel="shortcut icon" href="img/icon.png">
		<link rel="stylesheet" href="css/defined.css" />
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<br />
		<div class='container thumbnail'>
			<div class='row'>
				<div class='col-xs-3 col-sm-2 col-md-2 text-center'>
					<img class='img-rounded img-thumbnail img-responsive' src='<?php echo $school_logo; ?>' alt='logo'/>
				</div>
				
				<div class='col-xs-6 col-sm-8 col-md-8 text-center'>
					<h3><?php echo $school_name; ?></h3>
					<p class='text-danger'>
						<?php echo $school_address; ?>, <br/> Motto: best legacy is our motto, <br/> Telephone: 07036798652
					</p>
				</div>
				
				<div class='col-xs-3 col-sm-2 col-md-2 text-center text-responsive'> 
					<img class='img-rounded img-thumbnail img-responsive' src='<?php echo $student_passport; ?>' alt='logo'/>
				</div>
			</div>
			<hr />
			
			<div class='container row'>
				<div class='col-xs-12 col-md-6'>
					<legend>Bio-Data</legend>
					<p>First Name: <?php echo $msg_firstname; ?></p>
					<p>Last Name: <?php echo $msg_lastname; ?></p>
					<p>Other Name: <?php echo $msg_othername; ?></p>
					<p>Gender: <?php echo $msg_gender; ?></p>
					<p>State: <?php echo $msg_state; ?></p>
					<p>Nationality: <?php echo $msg_nationality; ?></p>
				</div>
				<div class='col-xs-12 col-md-6'>
					<legend>Birthday</legend>
					<p>Age: <?php echo $msg_student_age; ?></p>
					<p>Date: <?php echo $msg_dob; ?></p>
					<p>Month: <?php echo $msg_mob; ?></p>
					<p>Year: <?php echo $msg_yob; ?></p>
				</div>
			</div>
			<br />
			
			<div class='container row'>
				<div class='col-xs-12 col-md-6'>
					<legend>Contact</legend>
					<p>Nearest Phone: <?php echo $msg_phone; ?></p>
					<p>Home Address: <?php echo $msg_address; ?></p>
				</div>
				<div class='col-xs-12 col-md-6'>
					<legend>Academics</legend>
					<p>Registration No: <?php echo $msg_reg_number; ?></p>
					<p>Password: <?php echo $msg_password; ?></p>
					<p>Class: <?php echo $msg_class; ?></p>
				</div>
			</div>
			<br/>
			
			<div class='container row'>
				<div class='col-xs-12 col-md-6'>
					<legend>Sponsor:</legend>
					<p>Name: <?php echo $msg_sponsor_name; ?></p>
					<p>Phone: <?php echo $msg_sponsor_phone; ?></p>
					<p>Relationship: <?php echo $msg_sponsor_relationship; ?></p>
				</div>
				<div class='col-xs-12 col-md-6'>
					<legend>Registered</legend>
					<p>Date: <?php echo $msg_reg_day; ?></p>
					<p>Month: <?php echo $msg_reg_month; ?></p>
					<p>Year: <?php echo $msg_reg_year; ?></p>
				</div>
			</div>
			<hr/>
			
			<div class='container row'>
				<div class='col-xs-12 col-md-12 text-center'>
					<em>
						<strong>NOTE:</strong> Print this slip and keep it safe, you will require this for effective service of your school portal. 
						We are always ready to asisst in any way we can. 
						<br/>
						<span class='glyphicon glyphicon-phone'></span> 2347036798652</a>, 
						<span class='glyphicon glyphicon-envelope'></span> support@toxaswift.com. 
						<button type='button' class='btn btn-default' onclick="window.print()" value='print a div!'><span class='glyphicon glyphicon-print'></span></button>
						<a href='../student_management/'><span class='glyphicon glyphicon-remove'></span> Close Slip</a> 
					</em>
				</div>
			</div>
			
		</div>
	</body>
</html>
<?php
	unset($_SESSION['admin']);
	exit;
?>