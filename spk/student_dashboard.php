<?php
	ob_start();
?>
<?php
	require_once("includes/student_session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	date_default_timezone_set('Africa/Lagos');
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
	$oge = time();
	$time = date('H:i:s', $oge);
	$year = date('Y');
?>
<?php
	//////////////////// GET STUDENTS DATA FROM DATABASE AND DISPLAY IT ON DASHBOARD IF LOGIN IS SUCCESSFUL USING SESSION FROM LOGIN PAGE ////////////////
	$query = " SELECT * FROM `students` WHERE id = '{$_SESSION['student']}' ";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$student_id = $result['id'];
			$student_gender = ucfirst($result['gender']);
			$student_firstname = ucfirst($result['firstname']);
			$student_lastname = ucfirst($result['lastname']);
			$student_othername = ucfirst($result['othername']);
			$student_dob = $result['dob'];
			$student_mob = $result['mob'];
			$student_yob = $result['yob'];
			$student_contact_phone = $result['contact_phone'];
			$student_address = ucwords($result['address']);
			$student_state = ucwords($result['state']);
			$student_nationality = ucwords($result['nationality']);
			$student_class = $result['class'];
			$student_reg_number = $result['reg_number'];
			$student_sponsor_name = ucwords($result['sponsor_name']);
			$student_sponsor_phone = $result['sponsor_phone'];
			$student_sponsor_relationship = ucfirst($result['relationship']);
			$student_password = $result['gen_password'];
			$student_passport = "./".$result['passport'];
			$student_reg_date = $result['date_of_reg'];
			$student_reg_day = substr($student_reg_date, 0, 2);
			$student_reg_month = substr($student_reg_date, 3, 3);
			$student_reg_year = substr($student_reg_date, 7, 4);
			$current_year = date('Y');
			$student_age = $current_year - $student_yob;
		}
	}
?>
<?php
	/////////////////// POST ACTION TO REGISTER STUDENT SUBJECTS IF REGISTER BUTTON IS CLICKED /////////////////
	if(isset($_POST['subject_register_btn'])){
		$student_id = inject_checker($connection, $_POST['student_id']);
		$student_name = inject_checker($connection, $_POST['student_name']);
		$student_class = inject_checker($connection, $_POST['student_class']);
		$student_subject = inject_checker($connection, $_POST['student_subject']);
		$current_term = inject_checker($connection, $_POST['current_term']);
		$current_session = inject_checker($connection, $_POST['current_session']);
		
		//////////////////////// ERROR CHECKING FOR EMPTY FIELDS ///////////////
		if(empty($student_id) || empty($student_name)){
			$error[] = "Error! Your Registration Number and Your Name are Required";
		}
		if($student_class == $select){
			$error[] = "Error! Please Select Your Class";
		}
		if($student_subject == $select){
			$error[] = "Error! Please Select Subject";
		}
		if($current_term == $select){
			$error[] = "Error! Please Select Current Term";
		}
		if(empty($error)){
			$query = " SELECT * FROM `subjects` WHERE `reg_number` = '{$student_id}' AND `class` = '{$student_class}' AND `subjects` = '{$student_subject}' AND `term` = '{$current_term}' AND `session` = '{$current_session}' ";
			$run_query = mysqli_query($connection, $query);
			if($run_query == true){
				if(mysqli_num_rows($run_query) == 1){
					$error[] = "Error: You cannot register one subject twice for the same term";
				}else{
					$query = " INSERT INTO `subjects`(`reg_number`, `name`, `class`, `subjects`, `term`, `session`, `registration_date`) 
								VALUES('$student_id', '$student_name', '$student_class', '$student_subject', '$current_term', '$current_session', '$date')";
					$run_query = mysqli_query($connection, $query);
					if($run_query == true){
						$msg_success = "<p class='text-success'><b>Registration Successful</b></p>";
					}else{
						$msg_failure = "<p class='text-danger'><b>Registration Failed!</b></p>";
					}
				}
			}else{
				$error[] = "Can not Register This Subject";
			}
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
		<title>
			<?php
				echo $student_lastname ." " .$student_othername;
			?>
		</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<meta name='description" content="student registration' />
		<link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
		<link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
		<link type='text/css' rel='stylesheet' href='css/blink.css' />
        <link rel="shortcut icon" href="img/icon.png">
		<link rel='stylesheet' href='css/defined.css' />
		<script type='text/javascript' src='js/jquery-1.11.3.min.js'></script>
		<script src='js/bootstrap.js'></script>
		<script src='js/blink.js'></script>
		<style type="text/css">

			@media print
			{
			.noprint {display:none;}
			}

			@media screen
			{
			...
			}

		</style>
		<script type="text/javascript">
		window.onload = initClock;
		 
		function initClock() {
		  var now = new Date();
		  var hr  = now.getHours();
		  var min = now.getMinutes();
		  var sec = now.getSeconds();
		  if (min < 10) min = "0" + min;  // insert a leading zero
		  if (sec < 10) sec = "0" + sec;
		  document.getElementById('clockDisplay').innerHTML
				= "Time is " + hr + ":" + min + ":" + sec;
		  setTimeout('initClock()', 500);
		}
		</script>
	</head>
	<body>
		<div class='container-fluid'>
			<header class='noprint'>
				<div class='row header'>
					<div class='col-md-3'>
						&nbsp;
						<h5>Today: <?php echo $date; ?></h5>
						<h4 class='blink'><span class='glyphicon glyphicon-cog'></span> Choose Action Below</h4>
					</div>
					
					<div class='col-md-6'>
						<?php
							////////////// QUERY TO SHOW SCHOOL NAME /////////////////
							$query = " SELECT * FROM `administratives` ";
							$run_query = mysqli_query($connection, $query);
							
							if(mysqli_num_rows($run_query) > 0){
								while($result = mysqli_fetch_assoc($run_query)){
									$school_title = $result['school_name'];
									echo"<p class='text-center'><b><marquee>{$school_title}</marquee></b></p>";
								}
							}else{
								echo"<p class='text-center'><b><marquee>SPK POWERED BY TOXASWIFT</marquee></b></p>";
							}
						?>
						<h2 class='text-center'><span class='glyphicon glyphicon-education'></span> SCHOOL PORTAL KIT</h2>
						<h4 class='text-center'>Welcome
							<?php
								echo $student_firstname ." " .$student_lastname;
							?>
						</h4>
					</div>
					
					<div class='col-md-3 logout'>
						&nbsp;
						<h5 class='text-right'><span id='clockDisplay'></span></h5>
						<h4 class='text-right'><a href='student_dashboard.php?logout'><span class='glyphicon glyphicon-lock'></span> Logout</a></h4>
					</div>
				</div>
			</header>
			<section class='row'>
				<br />
				<div class='col-md-2 side_nav noprint'>
					<ul class="nav nav-pills nav-stacked">
						<li role="presentation" class="active"><a href="student_dashboard.php?view_profile"><span class='glyphicon glyphicon-user'></span> View Profile</a></li>
						<li role="presentation"><a href="student_dashboard.php?check_result"><span class='glyphicon glyphicon-education'></span> Check My Result</a></li>
						<li role="presentation"><a href="student_dashboard.php?print_slip"><span class='glyphicon glyphicon-print'></span> Print My Slip</a></li>
						<li role="presentation"><a href="student_dashboard.php?my_subjects"><span class='glyphicon glyphicon-th-list'></span> Specified Subjects</a></li>
						<li role="presentation"><a href="student_dashboard.php?register_subject"><span class='glyphicon glyphicon-th-list'></span> Register Subjects</a></li>
						<li role="presentation"><a href="student_dashboard.php?school_calendar"><span class='glyphicon glyphicon-calendar'></span> School Calendar</a></li>
						<li role="presentation"><a href="student_dashboard.php?class_members"><span class='glyphicon glyphicon-eye-open'></span> View Class Members</a></li>
						<li role="presentation"><a href="index.php"><span class='glyphicon glyphicon-home'></span> Back to Website</a></li>
						<li role="presentation"><a href="student_dashboard.php?logout"><span class='glyphicon glyphicon-lock'></span> Logout</a></li>
					</ul>
				</div>
				
				<div class='col-md-10'>
					<?php
						if(isset($_GET['view_profile'])){
							echo"
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class='col-md-2 thumbnail text-center'>
											<img src='{$student_passport}' class='img-responsive img-rounded' />
										</div>
										
										<div class='col-md-2'>
											<br />
											<h3>{$student_firstname} {$student_lastname} {$student_othername}</h3>
										</div>
										
										<div class='col-md-4'>
											<br />
											<br />
											<p><span style='font-weight: bold;'>Gender: </span>{$student_gender}</p>
											<p><span style='font-weight: bold;'>State:</span> {$student_state}</p>
											<p><span style='font-weight: bold;'>Nationality:</span> {$student_nationality}</p>
											<p><span style='font-weight: bold;'>Address:</span> {$student_address}</p>
											<p><span style='font-weight: bold;'>Phone:</span> {$student_contact_phone}</p>
										</div>
										<div class='col-md-4'>
											<br />
											<br />
											<p><span style='font-weight: bold;'>Class:</span> {$student_class}</p>
											<p><span style='font-weight: bold;'>Reg No:</span> {$student_reg_number}</p>
											<p><span style='font-weight: bold;'>Date of Birth:</span> {$student_dob} {$student_mob} {$student_yob}</p>
											<p><span style='font-weight: bold;'>Age:</span> {$student_age}</p>
										</div>
									</div>
									<div class='panel-body'>
										<div class='thumbnail jumbotron'>
											<h2>Howdy! {$student_lastname}</h2>
											<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.
											This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.
											This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
											<p><a class='btn btn-primary btn-xs' href='#' role='button'><span class='glyphicon glyphicon-search'></span> Learn more</a></p>
										</div>
									</div>
								</div>
							";
						}
						elseif(isset($_GET['check_result'])){
							echo"
							
								<div class='col-md-10' id='log'>
									<div class='panel panel-primary'>
										<div class='panel-heading'>
											<h3 class='log-text'>Please Fill the form to check result</h3>
										</div>
										<div class='panel-body'>
											<form method='POST' action='student_dashboard.php?check_result'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>REG NO</span>
													<input type='text' name='result_regno' value='{$student_reg_number}' placeholder='Enter Registration Number' class='form-control disabled' />
												</div>
												<br />
												
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>CLASS</span>
													<select class='form-control' name='result_class'>
														<option selected>{$select}</option>";
															$query = " SELECT * FROM `classes` ";
															$run_query = mysqli_query($connection, $query);
															if(mysqli_num_rows($run_query) > 0){
																while($result = mysqli_fetch_assoc($run_query)){
																	$publish_result_classes = $result['classes'];
																	echo"
																		<option>{$publish_result_classes}</option>
																	";
																}
															}
															echo"
													</select>
												</div>
												<br />
												
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>TERM</span>
													<select class='form-control' name='result_term'>
														<option selected> {$select} </option>";
															
															$term_array = array("First Term", "Second Term", "Third Term");
															foreach($term_array as $term){
																echo "<option>{$term}</option>";
															}
															echo"
													</select>
												</div>
												<br />
												
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Session</span>
													<select class='form-control' name='result_session'>
														<option selected> {$select} </option>";
															$query = " SELECT * FROM `sessions` ";
															$run_query = mysqli_query($connection, $query);
															if(mysqli_num_rows($run_query) > 0){
																while($result = mysqli_fetch_assoc($run_query)){
																	$all_sessions = $result['sessions'];
																	echo "<option>{$all_sessions}</option>";
																}
															}
															echo"
													</select>
												</div>
												<br />
												
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>PIN</span>
													<input type='text' name='result_pin' placeholder='Enter Card Pin' class='form-control' />
												</div>
												<br />
										
												<p id='btnsubmit'><input type='submit' name='check_result_btn' id='submit' value='Check Result' class='btn btn-large btn-success login_btn text-center' /></p>
											</form>
										</div>		
									</div>
							";
							////////////////////// POST ACTION TO CHECK STUDENTS RESULT IF THE CHECK RESULT BUTTON IS CLICKED //////////////////
							if(isset($_POST['check_result_btn'])){
								$result_regno = inject_checker($connection, $_POST['result_regno']);
								$result_class = inject_checker($connection, $_POST['result_class']);
								$result_term = inject_checker($connection, $_POST['result_term']);
								$result_session = inject_checker($connection, $_POST['result_session']);
								$result_pin = inject_checker($connection, $_POST['result_pin']);
								$used_pin_count = 1;
								
								//////////////// ERROR CHECKING FOR EMPTY FIELDS /////////////////
								if(empty($result_regno)){
									$error[] = "Error! Registration Number is Required";
								}
								if($result_class == $select){
									$error[] = "Error! Please Select Class to check Result";
								}
								if($result_term == $select){
									$error[] = "Error! Please Select the term for the Result";
								}
								if(empty($result_pin)){
									$error[] = "Error! Please Type in Card Pin to Access your Result";
								}
								if(empty($error)){
									if($result_term == ucwords("first term")){
										$query = " SELECT * FROM `pin1` WHERE `first_term_pin` = '{$result_pin}' ";
									}
									elseif($result_term == ucwords("second term")){
										$query = " SELECT * FROM `pin2` WHERE `second_term_pin` = '{$result_pin}' ";
									}
									elseif($result_term == ucwords("third term")){
										$query = " SELECT * FROM `pin3` WHERE `third_term_pin` = '{$result_pin}' ";
									}
									
									$run_query = mysqli_query($connection, $query);
									
									if(mysqli_num_rows($run_query) == 1){
										$query = " SELECT * FROM `used_pins` WHERE `used_pins` = '$result_pin' AND `user_class` = '{$result_class}' AND `used_term` = '{$result_term}' AND `used_session` = '{$result_session}' ";
										$run_query = mysqli_query($connection, $query);
										
										if(mysqli_num_rows($run_query) > 0){
											while($result = mysqli_fetch_assoc($run_query)){
												$first_used_reg_number = $result['user_reg_number'];
											}
											if($result_regno !== $first_used_reg_number){
												echo "<p class='text-danger'><b>This Pin Has Already Been Used by Another Student !!!</b></p>";
											}else{
												$query = " SELECT `used_count` FROM `used_pins` WHERE `used_pins` = '$result_pin' AND `user_reg_number` = '{$result_regno}' AND `user_class` = '{$result_class}' AND `used_term` = '{$result_term}' AND `used_session` = '{$result_session}' ";
												$run_query = mysqli_query($connection, $query);
												
												while($result = mysqli_fetch_assoc($run_query)){
													$pin_usage_count = $result['used_count'];
												}
												if($pin_usage_count == 5){
													echo "<p class='text-danger'><b>Your Have Exhausted Your Times Usage Validity !!!</b></p>";
												}else{
													$pin_usage_count++;
													$query = " UPDATE `used_pins` SET `used_count` = '{$pin_usage_count}' WHERE `used_pins` = '{$result_pin}' AND `user_class` = '{$result_class}' AND `used_term` = '{$result_term}' AND `used_session` = '{$result_session}' ";
													$run_query = mysqli_query($connection, $query);
													
													if($run_query == true){
														$query = " SELECT * FROM `results1` WHERE `reg_number` = '{$result_regno}' AND `class` = '{$result_class}' AND `term` = '{$result_term}' AND `session` = '{$result_session}' ";
														$run_query = mysqli_query($connection, $query);
														
														if($run_query == true){
															if(mysqli_num_rows($run_query) > 0){
																while($result = mysqli_fetch_assoc($run_query)){
																	$result_id = $result['id'];
																	$_SESSION['student'] = $result_id;
																	header("Location: result.php");
																}
															}else{
																echo "<p class='text-danger'><b>No Result Records Found !!!</b></p>";
															}
														}else{
															echo "<p class='text-danger'><b>Result Checking Failed !!!</b></p>";
														}
													}else{
														echo "<p class='text-danger'><b>Result Checking Encountered Error !!!</b></p>";
													}
												}
											}
										}else{
											$query = " SELECT * FROM `used_pins` WHERE `used_pins` = '$result_pin' AND `user_class` = '{$result_class}' AND `used_term` = '{$result_term}' AND `used_session` = '{$result_session}' ";
											$run_query = mysqli_query($connection, $query);
											
											if(mysqli_num_rows($run_query) < 1){
												$query = " SELECT * FROM `used_pins` WHERE `used_pins` = '$result_pin' AND `user_reg_number` = '{$result_regno}' AND `user_class` = '{$result_class}' AND `used_term` = '{$result_term}' AND `used_session` = '{$result_session}' ";
												$run_query = mysqli_query($connection, $query);
												
												$query = " INSERT INTO `used_pins`(`used_pins`, `user_reg_number`, `used_count`, `user_class`, `used_term`, `used_session`, `date_used`)
																VALUES('$result_pin', '$result_regno', '$used_pin_count', '$result_class', '$result_term', '$result_session', '$date')";
												$run_query = mysqli_query($connection, $query);
												
												if($run_query == true){
													$query = " DELETE FROM `unused_pins` WHERE `unused_pins` = '{$result_pin}' ";
													$run_query = mysqli_query($connection, $query);
													
													if($run_query == true){
														$query = " SELECT * FROM `results1` WHERE `reg_number` = '{$result_regno}' AND `class` = '{$result_class}' AND `term` = '{$result_term}' AND `session` = '{$result_session}' ";
														$run_query = mysqli_query($connection, $query);
														
														if($run_query == true){
															if(mysqli_num_rows($run_query) > 0){
																while($result = mysqli_fetch_assoc($run_query)){
																	$result_id = $result['id'];
																	$_SESSION['student'] = $result_id;
																	header("Location: result.php");
																}
															}else{
																echo "<p class='text-danger'><b>No Result Records Found !!!</b></p>";
															}
														}else{
															echo "<p class='text-danger'><b>Result Checking Failed !!!</b></p>";
														}
													}
												}else{
													echo "<p class='text-danger'><b>Result Checking Encountered Error !!!</b></p>";
												}
											}
										}
									}else{
										echo "<p class='text-danger'><b>Incorrect Pin !!!</b></p>";
									}
								}
							}
							foreach($error as $msg){
								echo "<p class='text-danger'><b>{$msg}</b></p><br />";
							}
						}
						elseif(isset($_GET['print_slip'])){
							echo"
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class='row'>
											<div class='col-xs-2 col-sm-2 col-md-2 text-center'>
												<img class='img-rounded img-thumbnail img-responsive' src='{$school_logo}' alt='logo'/>
											</div>
											
											<div class='col-xs-8 col-sm-8 col-md-8 text-center'>
												<h3>{$school_name}</h3>
												<p class='text-danger'>
												{$school_address}<br/> Telephone: 07036798652
												</p>
											</div>
											
											<div class='col-xs-2 col-sm-2 col-md-2 text-center text-responsive'> 
												<img src='{$student_passport}' class='img-rounded img-thumbnail img-responsive' alt='logo' />
											</div>
										</div>
										<hr />
										
										<div class='row'>
											<div class='col-xs-6 col-md-6'>
												<legend>Bio-Data</legend>
												<p>First Name:{$student_firstname}</p>
												<p>Last Name: {$student_lastname}</p>
												<p>Other Name: {$student_othername}</p>
												<p>Gender: {$student_gender}</p>
												<p>State: {$student_state}</p>
												<p>Nationality: {$student_nationality}</p>
											</div>
											<div class='col-xs-6 col-md-6'>
												<legend>Birthday</legend>
												<p>Age: {$student_age}</p>
												<p>Date: {$student_dob}</p>
												<p>Month: {$student_mob}</p>
												<p>Year: {$student_yob}</p>
											</div>
										</div>
										<br />
										
										<div class='row'>
											<div class='col-xs-6 col-md-6'>
												<legend>Contact</legend>
												<p>Nearest Phone: {$student_contact_phone}</p>
												<p>Home Address: {$student_address}</p>
											</div>
											<div class='col-xs-6 col-md-6'>
												<legend>Academics</legend>
												<p>Registration No: {$student_reg_number}</p>
												<p>Password: {$student_password}</p>
												<p>Class: {$student_class}</p>
											</div>
										</div>
										<br/>
										
										<div class='row'>
											<div class='col-xs-6 col-md-6'>
												<legend>Sponsor:</legend>
												<p>Name: {$student_sponsor_name}</p>
												<p>Phone: {$student_sponsor_phone}</p>
												<p>Relationship: {$student_sponsor_relationship}</p>
											</div>
											<div class='col-xs-6 col-md-6'>
												<legend>Registered</legend>
												<p>Date: {$student_reg_day}</p>
												<p>Month: {$student_reg_month}</p>
												<p>Year: {$student_reg_year}</p>
											</div>
											<hr/>
										</div>
										<br />
										
										<div class='row'>
											<div class='col-xs-12 col-md-12 text-center'>
												<em>
													<strong>NOTE:</strong> Print this slip and keep it safe, you will require this for effective service of your school portal. 
													We are always ready to asisst in any way we can. 
													<br/>
													<span class='glyphicon glyphicon-phone'></span> 2347036798652</a>, 
													<span class='glyphicon glyphicon-envelope'></span> support@toxaswift.com. 
													<button type='button' class='btn btn-default noprint' onclick='window.print()' value='print a div!'><span class='glyphicon glyphicon-print'></span></button>
													<a class='noprint' href='student_dashboard.php'><span class='glyphicon glyphicon-remove'></span> Close Slip</a> 
												</em>
											</div>
										</div>
										
									</div>
								</div>
							";
						}
						elseif(isset($_GET['my_subjects'])){
							echo"
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class='well'>";
											//////////////// ACTION TO DISPLAY SPECIFIED SUBJECT TO BE OFFERED BY JUNIOR CLASSES ////////////
											if($student_class === "JSS1" || $student_class === "JSS2" || $student_class === "JSS3"){
												$query = " SELECT * FROM `jss` ";
												$run_query = mysqli_query($connection, $query);
												if(mysqli_num_rows($run_query) > 0){
													$i = 0;
													echo"<h3>SPECIFIED SUBJECTS FOR JUNIOR STUDENTS</h3>
														<p class='text-danger'><b>NOTE: You Must Register Your Subjects From the Subjects Below in order to see your results!!!</b></p>
													";
													while($result = mysqli_fetch_assoc($run_query)){
														$i++;
														$jss_specified_subject = $result['jss_subjects'];
														echo  "<p><b>{$i}. {$jss_specified_subject}</b></p><br />";
													}
												}
											}
											
											//////////////// ACTION TO DISPLAY SPECIFIED SUBJECT TO BE OFFERED BY SENIOR CLASSES ////////////
											if($student_class === "SSS1" || $student_class === "SSS2" || $student_class === "SSS3"){
												$query = " SELECT * FROM `sss` ";
												$run_query = mysqli_query($connection, $query);
												if(mysqli_num_rows($run_query) > 0){
													$i = 0;
													echo"<h3>SPECIFIED SUBJECTS FOR SENIOR STUDENTS</h3>
															<p class='text-danger'><b>NOTE: You Must Register Your Subjects From the Subjects Below in order to see your results!!!</b></p>	
														";
													while($result = mysqli_fetch_assoc($run_query)){
														$i++;
														$sss_specified_subject = $result['sss_subjects'];
														echo "<p><b>{$i}. {$sss_specified_subject}</b></p><br />";
													}
												}
											}
										echo"
										</div>
									</div>
								</div>
							";
						}
						elseif(isset($_GET['register_subject'])){
							if(isset($msg_success)){
								echo $msg_success;
							}
							if(isset($msg_failure)){
								echo $msg_failure;
							}
							foreach($error as $msg){
								echo "<p class='text-danger'><b> {$msg}</b></p><br />";
							}
							echo"
								<div class='panel panel-primary'>
									<div class='panel-heading'>
										<h2>Register Subjects</h2>
									</div>
									
									<div class='panel-body'>
										<form method='POST' action=''>
											<div class='row'>
												<div class='col-md-4'>
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>Reg No:</span>
														<input type='text' value='{$student_reg_number}' name='student_id' placeholder='Type Your Registration Number' class='form-control' />
													</div>
												</div>
												
												<div class='col-md-4'>
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>Name:</span>
														<input type='text' value='{$student_firstname} {$student_lastname}' name='student_name' placeholder='Type Your Name' class='form-control' />
													</div>
												</div>
											</div>
											<br />
											<div class='row'>
												<div class='col-md-3'>
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>Student Class:</span>
														<select class='form-control' name='student_class'>
															<option selected >{$student_class}</option>
														</select>
													</div>
												</div>
												
												<div class='col-md-3'>
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>Subjects:</span>
														<select class='form-control' name='student_subject'>
															<option selected >{$select}</option>";
																if($student_class === "JSS1" || $student_class === "JSS2" || $student_class === "JSS3"){
																	$query = " SELECT * FROM `jss` ";
																	$run_query = mysqli_query($connection, $query);
																	if(mysqli_num_rows($run_query) > 0){
																		while($result = mysqli_fetch_assoc($run_query)){
																			$jss_subjects = $result['jss_subjects'];
																			echo "<option>{$jss_subjects}</option>";
																		}
																	}
																}
																elseif($student_class === "SSS1" || $student_class === "SSS2" || $student_class === "SSS3"){
																	$query = " SELECT * FROM `sss` ";
																	$run_query = mysqli_query($connection, $query);
																	if(mysqli_num_rows($run_query) > 0){
																		while($result = mysqli_fetch_assoc($run_query)){
																			$sss_subjects = $result['sss_subjects'];
																			echo "<option>{$sss_subjects}</option>";
																		}
																	}
																}
															echo"
														</select>
													</div>
												</div>
												
												<div class='col-md-3'>
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>Result Term:</span>
														<select class='form-control' name='current_term'>";
																///// POST ACTION TO DISPLAY CURRRENT TERM /////////////
																$query = " SELECT * FROM `current_season` ";
																$run_query = mysqli_query($connection, $query);
																if(mysqli_num_rows($run_query) == 1){
																	while($result = mysqli_fetch_assoc($run_query)){
																		$show_current_term = $result['current_term'];
																		echo"
																			<option>{$show_current_term}</option>
																		";
																	}
																}
															echo"
														</select>
													</div>
												</div>
												
												<div class='col-md-3'>
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>Current Session:</span>
														<select class='form-control' name='current_session'>";
																///////////// POST ACTION TO DISPLAY CURRENT SESSION //////////////
																$query = " SELECT * FROM `current_season` ";
																$run_query = mysqli_query($connection, $query);
																if(mysqli_num_rows($run_query) == 1){
																	while($result = mysqli_fetch_assoc($run_query)){
																		$show_current_session = $result['current_session'];
																		echo"
																			<option>{$show_current_session}</option>
																		";
																	}
																}
															echo"
														</select>
													</div>
												</div>
												<br />
												<br />
												
												
												<div class='col-md-3'>
													<p id='btnsubmit'><input type='submit' name='subject_register_btn' id='submit' value='REGISTER' class='btn btn-large btn-success login_btn text-center' /></p>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class='table-responsive'>
									<table class='table table-striped'>
										<caption class='text-warning'><b>THE TABLE BELOW CONTAINS YOUR ALREADY REGISTERED SUBJECTS (!!! PLEASE REGISTER SUBJECTS ONLY WHEN INSTRUCTED TO DO SO !!!)<b></caption>
										<thead>
											<tr class='info'>
												<th>S/N</th>
												<th>SUBJECTS</th>
												<th>REG NO</th>
												<th>CLASS</th>
												<th>TERM</th>
												<th>ACTION</th>
											</tr>
										<thead>
										<tbody>
											";
											///// QUERY TO DISPLAY ALREADY REGISTERED SUBJECTS OF A PARTICULAR STUDENT IN THE REGISTER SUBJECTS PAGE //////////////
												$query = " SELECT * FROM `subjects` WHERE `reg_number` ='{$student_reg_number}' AND `class` = '{$student_class}' ";
												$run_query = mysqli_query($connection, $query);
												
												if($run_query == true){
													if(mysqli_num_rows($run_query) > 0){
														
														$i = 0;
														while($result = mysqli_fetch_assoc($run_query)){
															$i++;
															$subject_id = $result['id'];
															$subject_reg_no = $result['reg_number'];
															$subject_name = $result['subjects'];
															$subject_class = $result['class'];
															$subject_term = $result['term'];
															
															echo"
																<tr>
																	<td>{$i}</td>
																	<td>{$subject_name}</td>
																	<td>{$subject_reg_no}</td>
																	<td>{$subject_class}</td>
																	<td>{$subject_term}</td>
																	<td>
																		<form method='POST' action>
																			<input type='hidden' name='hidden_id' value='$subject_id' />
																			<input type='submit' name='del_btn' value='Delete' class='btn btn-danger' />
																		</form>
																	</td>
																</tr>
															";
														}
													}else{
														echo "<p class='text-danger'><b>No Subject Registered Yet</b></p>";
													}
												}else{
													echo "<p class='text-danger'><b>No Records Found</b></p>";
												}
												
												if(isset($_POST['del_btn'])){
													$hidden_id = $_POST['hidden_id'];
													/////////////// POST ACTION TO FOR STUDENTS TO DELETE ANY OF THEIR REGISTERED COURSES /////////////
													$query = " DELETE FROM `subjects` WHERE `id` = '{$hidden_id}' AND `class` = '{$student_class}' ";
													$run_query = mysqli_query($connection, $query);
													
													if($run_query == true){
														echo "<p class='text-success'><b>Subject Deleted Successfully</b></p>";
													}else{
														echo "<p><b>Error! Could Not Delete Record</b></p>";
													}
												}
											echo"
										</tbody>
									</table>
								</div>
							";
						}
						elseif(isset($_GET['class_members'])){
							echo"
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<h3>Class Members</h3>
										<div class='row'>";
										//////////// POST ACTION TO DISPLAY CLASS MEMBERS ////////////////
											$query = " SELECT * FROM `students` WHERE `class` = '{$student_class}' LIMIT 6 ";
											$run_query = mysqli_query($connection, $query);
											
											if(mysqli_num_rows($run_query) > 0){
												while($result = mysqli_fetch_assoc($run_query)){
													$pix = $result['passport'];
													$firstname = ucfirst($result['firstname']);
													$lastname = ucfirst($result['lastname']);
													$othername = ucfirst($result['othername']);
													
													echo"
														<div class='col-md-2'>
															<div class='thumbnail'>
																<img src='{$pix}' class='img-responsive img-rounded' height='10px' />
																<h5 class='text-danger'><b>{$firstname} {$lastname} {$othername}</b></h5>
															</div>
														</div>
													";
												}
											}
											echo"
											
										</div>
									</div>
								</div>
							";
						}
						elseif(isset($_GET['logout'])){
							unset($_SESSION['student']);
							header("Location:login.php");
							exit;
						}
						else{
							echo"
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class='col-md-2 thumbnail text-center'>
											<img src='{$student_passport}' class='img-responsive img-rounded' />
										</div>
										
										<div class='col-md-2'>
											<br />
											<h3>{$student_firstname} {$student_lastname} {$student_othername}</h3>
										</div>
										
										<div class='col-md-4'>
											<br />
											<br />
											<p><span style='font-weight: bold;'>Gender: </span>{$student_gender}</p>
											<p><span style='font-weight: bold;'>State:</span> {$student_state}</p>
											<p><span style='font-weight: bold;'>Nationality:</span> {$student_nationality}</p>
											<p><span style='font-weight: bold;'>Address:</span> {$student_address}</p>
											<p><span style='font-weight: bold;'>Phone:</span> {$student_contact_phone}</p>
										</div>
										<div class='col-md-4'>
											<br />
											<br />
											<p><span style='font-weight: bold;'>Class:</span> {$student_class}</p>
											<p><span style='font-weight: bold;'>Reg No:</span> {$student_reg_number}</p>
											<p><span style='font-weight: bold;'>Date of Birth:</span> {$student_dob} {$student_mob} {$student_yob}</p>
											<p><span style='font-weight: bold;'>Age:</span> {$student_age}</p>
										</div>
									</div>
									<div class='panel-body'>
										<div class='thumbnail jumbotron'>
											<h2>Howdy! {$student_lastname}</h2>
											<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.
											This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.
											This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
											<p><a class='btn btn-primary btn-xs' href='#' role='button'><span class='glyphicon glyphicon-search'></span> Learn more</a></p>
										</div>
									</div>
								</div>
							";
						}
					?>
				</div>
			</section>
		</div>
		
		<footer>
			<div class='container'>
				<p class='text-center' style='color: #666;'>Copyright &#169; <?php echo $year ?> // Product of <a href='http://www.toxaswift.com'>Toxaswift Inc.</a> // <span class='glyphicon glyphicon-envelope'></span> info@toxaswift.com</p>
			</div>
		</footer>
	</body>
</html>