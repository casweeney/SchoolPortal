<?php
	ob_start();
	require_once("includes/staff_session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	//require_once("staff_dashboard_processor.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	date_default_timezone_set('Africa/Lagos');
	$date = date('d/M/Y');
	$select = "--select--";
	$oge = time();
	$time = date('H:i:s', $oge);
	$error = array();
	$year = date('Y');
?>
<?php
	//////////////////// GET USERS DATA FROM DATABASE AND DISPLAY IT ON DASHBOARD IF LOGIN IS SUCCESSFUL USING SESSION FROM LOGIN PAGE ////////////////
	$query = " SELECT * FROM `users` WHERE id = '{$_SESSION['admin']}' ";
	$run_query = mysqli_query($connection, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$user_id = $result['id'];
			$user_title = $result['title'];
			$user_fullname = ucwords($result['fullname']);
			$user_address = ucwords($result['address']);
			$user_phone = $result['phone'];
			$user_state = ucwords($result['state']);
			$user_lga = ucwords($result['lga']);
			$user_nationality = ucwords($result['nationality']);
			$user_email = $result['email'];
		
			if($user_title === "mr"){
				$gender = "Male";
			}
			elseif($user_title === "mrs"){
				$gender = "Female";
			}
			elseif($user_title === "miss"){
				$gender = "Female";
			}
			
			$msg_fullname = $user_fullname;
			$msg_title = $user_title;
		}
	}
?>
<?php
	///////////////////// POST ACTION TO PUBLISH STUDENTS RESULTS //////////////////
	if(isset($_POST['publish_result_btn'])){
		$publish_result_class = inject_checker($connection, $_POST['publish_result_class']);
		$publish_result_term = inject_checker($connection, $_POST['publish_result_term']);
		$publish_result_session = inject_checker($connection, $_POST['publish_result_session']);
		
		if($publish_result_class === "JSS1" || $publish_result_class === "JSS2" || $publish_result_class === "JSS3"){
			$query = " SELECT * FROM `jss_subject_number` ";
			$run_query = mysqli_query($connection, $query);
			
			if(mysqli_num_rows($run_query) == 1){
				while($result = mysqli_fetch_assoc($run_query)){
					$number_of_subjects = $result['number_of_subject'];
				}
			}
		}elseif($publish_result_class === "SSS1" || $publish_result_class === "SSS2" || $publish_result_class === "SSS3"){
			$query = " SELECT * FROM `sss_subject_number` ";
			$run_query = mysqli_query($connection, $query);
			
			if(mysqli_num_rows($run_query) == 1){
				while($result = mysqli_fetch_assoc($run_query)){
					$number_of_subjects = $result['number_of_subject'];
				}
			}
		}
		
		//////////// ERROR CHECKING FOR EMPTY FIELDS /////////////////////
		if($publish_result_class === $select){
			$error[] = "Error: Please Select Class to Publish Result";
		}
		if($publish_result_term === $select){
			$error[] = "Error: Please Select Term to Publish Result";
		}
		if(empty($error)){

			////QUERY TO SELECT STUDENTS IN A PARTICULAR CLASS FROM DATABASE WHERE ALL STUDENTS INFO ARE STORED USING //////////////////
			$query = " SELECT * FROM `students` WHERE `class` = '{$publish_result_class}' ";
			$run_query = mysqli_query($connection, $query);
			
			if(mysqli_num_rows($run_query) > 0){
				while($result = mysqli_fetch_assoc($run_query)){
					$get_subjects_total = 0;
					$reg_number = $result['reg_number'];
					
					/////////////// QUERY TO SELECT ALL STUDENTS IN A PARTICULAR CLASS IN A PARTICULAR TERM AND SESSION FROM THE RESULTS TABLE ////////////////
					$query1 = " SELECT * FROM `results1` WHERE `reg_number` = '{$reg_number}' AND `class` = '{$publish_result_class}' AND `term` = '{$publish_result_term}' AND `session` = '{$publish_result_session}' ";
					$run_query1 = mysqli_query($connection, $query1);
					
					if(mysqli_num_rows($run_query1) > 0){
						while($result = mysqli_fetch_assoc($run_query1)){
							$student_id = $result['id'];
							$student_reg_number = $result['reg_number'];
							$student_name = $result['name'];
							$student_class = $result['class'];
							$result_term_pub = $result['term'];
							$result_session_pub = $result['session'];
							$student_subjects_total = $result['subject_total'];
							$get_subjects_total += $student_subjects_total;
						}
						$student_subjects_average = $get_subjects_total / $number_of_subjects;
						
						$query_check = " SELECT * FROM `positions` WHERE  `class` = '{$publish_result_class}' AND `reg_number` = '{$student_reg_number}' AND `term` = '{$result_term_pub}' AND `session` = '{$result_session_pub}' ";
						$run_query_check = mysqli_query($connection, $query_check);
						
						/////////////// ERROR CHECKING TO AVOID RESULTS FROM BEING PUBLISHED TWICE //////////////
						if(mysqli_num_rows($run_query_check) > 0){
							$msg_insert_error = "Error: This Result has Already Been Published!";
						}else{
							$query2 = " INSERT INTO `positions`(`reg_number`, `name`, `class`, `term`, `session`, `students_sub_total`, `students_sub_average`, `upload_date`) 
										VALUES('$student_reg_number', '$student_name', '$student_class', '$result_term_pub', '$result_session_pub', '$get_subjects_total', '$student_subjects_average', '$date') ";
							$run_query2 = mysqli_query($connection, $query2);
							
							if($run_query2 == true){
								$i = 1;
								$query3 = " SELECT * FROM `positions` WHERE `class` = '{$student_class}' AND `term` = '{$result_term_pub}' AND `session` = '{$result_session_pub}' ORDER BY `students_sub_average` DESC ";
								$run_query3 = mysqli_query($connection, $query3);
								if(mysqli_num_rows($run_query3) > 0){
									while($result = mysqli_fetch_assoc($run_query3)){
										$student_reg_no = $result['reg_number'];
										$sub_avg = $result['students_sub_average'];
										$sub_avg_class = $result['class'];
										$sub_avg_term = $result['term'];
										$sub_avg_session = $result['session'];
										
										$query4 = " UPDATE `positions` SET `class_position` = '{$i}' WHERE `reg_number` = '{$student_reg_no}' AND `class` = '$sub_avg_class' AND `term` = '{$sub_avg_term}' AND `session` = '{$sub_avg_session}' ";
										$run_query4 = mysqli_query($connection, $query4);
										
										if($run_query4 == true){
											$msg_insert_success = "Result Publishing Successful";
										}else{
											$msg_insert_error = "Result Publishing Failed!";
										}
										$i++;
									}
								}else{
									$msg_insert_error = "No result records available for ranking!";
								}
							}else{
								$msg_insert_error = "Positions Failed to Publish";
							}
						}
					}else{
						$msg_insert_failed = "!!! The results of Some Students in {$publish_result_class} were not uploaded and can not be published. This is may be because they failed to register thier Subjects for {$publish_result_term} in {$publish_result_session} Session. ";
					}
				}
			}else{
				$msg_insert_error = "No Students Have been registered into {$publish_result_class}";
			}
		}
	}
?>
<?php
if(isset($_POST['profile_update_btn'])){
    $user_title1 = $_POST['user_title'];
    $user_fullname1 = inject_checker($connection, $_POST['user_fullname']);
    $user_address1 = inject_checker($connection, $_POST['user_address']);
    $user_phone1 = inject_checker($connection, $_POST['user_phone']);
    $user_state1 = $_POST['user_state'];
    $user_lga1 = inject_checker($connection, $_POST['user_lga']);
    $user_nationality1 = $_POST['user_nationality'];
    $user_email1 = inject_checker($connection, $_POST['user_email']);

    $query = " UPDATE `users` SET
                `title` = '{$user_title1}',
                `fullname` = '{$user_fullname1}',
                `address` = '{$user_address1}',
                `phone` = '{$user_phone1}',
                `state` = '{$user_state1}',
                `lga` = '{$user_lga1}',
                `nationality` = '{$user_nationality1}',
                `email` = '{$user_email1}' WHERE `email` = '{$user_email}' ";
    $run_query = mysqli_query($connection, $query);

    if($run_query == true){
        $update_msg = "Profile Updated";
    }else{
        $update_msg_error = "Profile Update Failed";
    }
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $user_fullname; ?></title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<meta name='description" content="student registration' />
		<link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
		<link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
		<link type='text/css' rel='stylesheet' href='css/blink.css' />
        <link rel="shortcut icon" href="img/icon.png">
		<link rel='stylesheet' href='css/defined.css' />
		<script type='text/javascript' src='js/jquery-1.11.3.min.js'></script>
		<script type='text/javascript' src='js/blink.js'></script>
		<script src='js/bootstrap.js'></script>
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
			<header>
				<div class='row header noprint'>
					<div class='col-md-3 col-sm-3 col-xs-3'>
						&nbsp;
						<h5>Today: <?php echo $date; ?></h5>
						<h4 class='blink'><span class='glyphicon glyphicon-cog'></span> Choose Action Below</h4>
					</div>
					
					<div class='col-md-6 col-sm-6 col-xs-6'>
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
								echo ucfirst($msg_title) ." " .$msg_fullname;
							?>
						</h4>
					</div>
					
					<div class='col-md-3 col-sm-3 col-xs-3 logout'>
						&nbsp;
						<h5 class='text-right'><span id='clockDisplay'></span></h5>
						<h4 class='text-right'><a href='staff_dashboard.php?logout'><span class='glyphicon glyphicon-lock'></span> Logout</a></h4>
					</div>
				</div>
			</header>
			<section class='row'>
				<br />
				<div class='col-md-2 col-sm-2 side_nav noprint'>
					<ul class="nav nav-pills nav-stacked">
						<li role="presentation" class="active"><a href="staff_dashboard.php?view_profile"><span class='glyphicon glyphicon-user'></span> View Profile</a></li>
						<li role="presentation"><a href="staff_dashboard.php?administratives"><span class='glyphicon glyphicon-tasks'></span> Administratives</a></li>
						<li role="presentation"><a href="staff_dashboard.php?register_new_student"><span class='glyphicon glyphicon-education'></span> Register New Student</a></li>
						<li role="presentation"><a href="staff_dashboard.php?students_reg_no"><span class='glyphicon glyphicon-eye-open'></span> My Students</a></li>
						<li role="presentation"><a href="staff_dashboard.php?print_student_slip"><span class='glyphicon glyphicon-print'></span> Print Student Slip</a></li>
						<li role="presentation"><a href="staff_dashboard.php?manage_subjects"><span class='glyphicon glyphicon-blackboard'></span> Manage Subjects</a></li>
						<li role="presentation"><a href="staff_dashboard.php?register_subjects"><span class='glyphicon glyphicon-open'></span> Register Subjects</a></li>
						<li role="presentation"><a href="staff_dashboard.php?upload"><span class='glyphicon glyphicon-cloud-upload'></span> Result Upload</a></li>
						<li role="presentation"><a href="staff_dashboard.php?publish_result"><span class='glyphicon glyphicon-new-window'></span> Publish Result</a></li>
						<li role="presentation"><a href="staff_dashboard.php?promote_students"><span class='glyphicon glyphicon-export'></span> Promote Students</a></li>
						<li role="presentation"><a href="staff_dashboard.php?check_result"><span class='glyphicon glyphicon-send'></span> Check Student Result</a></li>
						<li role="presentation"><a href="staff_dashboard.php?register_new_user"><span class='glyphicon glyphicon-log-in'></span> Register New User</a></li>
						<li role="presentation"><a href="index.php"><span class='glyphicon glyphicon-home'></span> Back to Website</a></li>
						<li role="presentation"><a href="staff_dashboard.php?logout"><span class='glyphicon glyphicon-lock'></span> Logout</a></li>
					</ul>
				</div>
				
				<div class='col-md-10 col-sm-10'>
                    <?php
                        if(isset($update_msg)){
                            echo "<p class='text-success'><b>{$update_msg}</b></p>";
                        }
                        if(isset($update_msg_error)){
                            echo "<p class='text-danger'><b>{$update_msg_error}</b></p>p>";
                        }
                    ?>
					<?php
						if(isset($_GET['view_profile'])){
							header("Location:staff_dashboard.php");
						}
						
						elseif(isset($_GET['administratives'])){
								if(isset($_POST['admin_upload_btn'])){
									$school_name = inject_checker($connection, strtoupper($_POST['school_name']));
									$school_motto = inject_checker($connection, ucwords($_POST['school_motto']));
									
									
									if(empty($school_name)){
										echo "<p class='text-danger'><b>Error: School Name Field Can not be empty!</b></p>";
									}
									elseif(empty($school_motto)){
										echo "<p class='text-danger'><b>Error: School Address Field Can not be empty!</b></p>";
									}else{
										////////////// ATION TO UPLOAD SCHOOL LOGO INTO DB FROM ADMINISTRATIVE PAGE ///////////
										$name = $_FILES['logo']['name'];
										$tmp_name = $_FILES['logo']['tmp_name'];
										
										if(isset($name)){
											if(!empty($name)){
											$location = 'admin/';
												if(move_uploaded_file($tmp_name, $location.$name)){
													$image_location = $location.$name;
												}else{
													$image_location = "admin/none.jpg";
												}

											}
										}
										
										////////////// ATION TO UPLOAD SCHOOL STAMP/SIGNATURE INTO DB FROM ADMINISTRATIVE PAGE ///////////
										$name1 = $_FILES['stamp']['name'];
										$tmp_name1 = $_FILES['stamp']['tmp_name'];
										
										if(isset($name1)){
											if(!empty($name1)){
											$location1 = 'admin/';
												if(move_uploaded_file($tmp_name1, $location1.$name1)){
													$image_location1 = $location.$name1;
												}else{
													$image_location1 = "admin/none.jpg";
												}

											}
										}
										
										$query = " INSERT INTO `administratives`(`school_name`, `school_motto`, `school_logo`, `school_stamp`, `upload_date`)
													VALUES('".mysql_real_escape_string($school_name)."', '".mysql_real_escape_string($school_motto)."', '{$image_location}', '{$image_location1}', '{$date}') ";
										$run_query = mysqli_query($connection, $query);
										if($run_query == true){
											echo "<p class='text-success'><b>Administratives Upload Successful</b></p>";
										}else{
											echo "<p class='text-danger'><b>Administratives Upload Failed</b></p>";
										}
									}
									
								}
								
								////////// POST ACTION TO ADD NEW SESSION INTO DATABASE ///////////////
								if(isset($_POST['add_session_btn'])){
									$add_session = inject_checker($connection, $_POST['add_session']);
									
									if(empty($add_session)){
										echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> You Need to Type the Session You want to Add</b></p>";
									}else{
										$query = " SELECT * FROM `sessions` WHERE `sessions` = '".mysql_real_escape_string($add_session)."' ";
										$run_query = mysqli_query($connection, $query);
										if(mysqli_num_rows($run_query) > 0){
											echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Sorry, {$add_session} Session has Already been added</b></p>";
										}else{
											$query = " INSERT INTO `sessions`(`sessions`, `date_added`) VALUES('".mysql_real_escape_string($add_session)."', '$date') ";
											$run_query = mysqli_query($connection, $query);
											if($run_query == true){
												echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> New Session Successfully Added</b></p>";
											}else{
												echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Fail to add new session</b></p>";
											}
										}
									}
								}
								
								///////////// POST ACTION TO SPECIFY CURRENT SESSION/////////
								if(isset($_POST['current_session_btn'])){
									$current_session = inject_checker($connection, $_POST['current_session']);
									
									if($current_session == $select){
										echo "<p class='text-danger'><b> Error: Please Select a session to Declare Current Session</b></p>";
									}else{
										$query = " UPDATE `current_season` SET `current_session` = '{$current_session}' ";
										$run_query = mysqli_query($connection, $query);
										if($run_query == true){
											echo " <p class='text-success'><b>Current Session Successfully Updated</b></p>";	
										}else{
											echo "<p class='text-danger'><b>Current Session Update Failed</b></p>";
										}
									}
								}
								
								///////////////// POST ACTION TO SPECIFY CURRENT TERM ////////////////
								if(isset($_POST['current_term_btn'])){
									$current_term = inject_checker($connection, $_POST['current_term']);
									
									if($current_term == $select){
										echo "<p class='text-danger'><b> Error: Please Select a session to Declare Current Term</b></p>";
									}else{
										$query = " UPDATE `current_season` SET 	`current_term` = '$current_term' ";
										$run_query = mysqli_query($connection, $query);
										
										if($run_query == true){
											echo " <p class='text-success'><b>Current Term Successfully Updated</b></p>";	
										}else{
											echo "<p class='text-danger'><b>Current Term Update Failed</b></p>";
										}
									}
								}
								
								if(isset($_POST['add_class_btn'])){
									//////// POST ACTION TO ADD A NEW CLASS INTO THE DATABASE //////////////
									$add_class = inject_checker($connection, strtoupper($_POST['add_class']));
									
									if(empty($add_class)){
										echo "<p class='text-danger'><b>Please Type the Class You Want to Add</b></p>";
									}else{
										$query = " SELECT * FROM `classes` WHERE `classes` = '{$add_class}' ";
										$run_query = mysqli_query($connection, $query);
										if(mysqli_num_rows($run_query) > 0){
											echo "<p class='text-danger'><b>Error: {$add_class} Class Already Exist</b></p>";
										}else{
											$query = " INSERT INTO `classes`(`classes`, `date_added`) VALUES('".mysql_real_escape_string($add_class)."', '$date') ";
											$run_query = mysqli_query($connection, $query);
											
											if($run_query == true){
												echo " <p class='text-success'><b>New Class Successfully Added</b></p>";
											}else{
												echo "<p class='text-danger'><b>Addition of New Class Failed</b></p>";
											}
										}
									}
								}
							echo"
								<div class='panel panel-primary'>
									<div class='panel-heading'>
										<h2>Manage Administrative Activities</h2>
									</div>
									<div class='panel-body'>
										<p class='text-info'><b><span class='glyphicon glyphicon-bullhorn'></span> This Section Must be filled Before Using The Portal !!!</b></>
										<p class='text-warning'><b>NOTE: Please Be Informed that Changes made in this section will affect the entire School Portal System. You are Therefore Advised to make changes when due and carefully ...</b></p>
										<form method='POST' enctype='multipart/form-data' action='staff_dashboard.php?administratives'>
											<legend>Administratives</legend>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>School Name:</span>
												<input type='text' name='school_name' placeholder='Type Your School Name ...' class='form-control' />
											</div>
											<br />
											
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>School Address:</span>
												<input type='text' name='school_motto' placeholder='Type Your School Address ...' class='form-control' />
											</div>
											<br />
											
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>School Logo:</span>
												<input type='file' name='logo' required class='form-control' aria-describedby='basic-addon2'>
											</div>
											<br />
											
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>School Stamp/Signature:</span>
												<input type='file' name='stamp' required class='form-control' aria-describedby='basic-addon2'>
											</div>
											<br />
											
											<input type='submit' name='admin_upload_btn' value='Upload' class='btn btn-warning' />
										</form>
										<br />
										
										<form method='POST' action='staff_dashboard.php?administratives'>
											<input type='submit' name='view_admin_upload_btn' value='View Uploaded Admin Info' class='btn btn-info' />
										</form>
										<br />";
										
										if(isset($_POST['view_admin_upload_btn'])){
											////////// POST ACTION TO VIEW ALL THE UPLOADED ADMINISTRATIVE INFORMATION ////////////
											$query = " SELECT * FROM `administratives` ";
											$run_query = mysqli_query($connection, $query);
											
											if(mysqli_num_rows($run_query) > 0){
												$i = 0;
												echo"
												<div class='table-responsive'>
													<table class='table table-striped'>
														<thead>
															<tr>
																<th>S/N</th>
																<th>SCHOOL NAME</th>
																<th>SCHOOL ADDRESS</th>
																<th>LOGO</th>
																<th>SCHOOL STAMP</th>
																<th>ACTION</th>
															</tr>
														</thead>
													";
												while($result = mysqli_fetch_assoc($run_query)){
													$i++;
													$administratives_id = $result['id'];
													$admin_name = $result['school_name'];
													$admin_motto = $result['school_motto'];
													$admin_logo = $result['school_logo'];
													$admin_stamp = $result['school_stamp'];
													//echo "<img src='$admin_logo' />";
													echo"
														<tbody>
															<tr>
																<td>{$i}</td>
																<td>{$admin_name}</td>
																<td>{$admin_motto}</td>
																<td><img class='img-responsive' src='{$admin_logo}' /></td>
																<td><img class='img-responsive' src='{$admin_stamp}' /></td>
																<td>
																	<form method='POST' action=''>
																		<input type='hidden' name='admin_id' value='{$administratives_id}' />
																		<input type='submit' name='delete_admin_btn' value='Delete' class='btn btn-xs btn-danger' />
																	</form>
																</td>
															</tr>
														</tbody>
													";
												}
												echo"</table>
												</div>";
											}
										}
										
										/////////////// POST ACTION TO DELETE ADMINISTRATIVE INFORMATION ///////////////////
										if(isset($_POST['delete_admin_btn'])){
											$admin_id = $_POST['admin_id'];
											
											$query = " DELETE FROM `administratives` WHERE `id` = {$admin_id} ";
											$run_query =mysqli_query($connection, $query);
											
											if($run_query == true){
												echo "<p class='text-success'><b>Admin Info Deleted Successfully</b></p>";
											}else{
												echo "<p><b>Error! Could Not Delete Record</b></p>";
											}
										}
										
										echo"
										<form method='POST' action='staff_dashboard.php?administratives'>
											<legend>Manage School Seasons</legend>
											<p class='text-info'><b><span class='glyphicon glyphicon-bullhorn'></span> Choose Current Session At the Beginning of Every New Academic Session !</b></p>";
											///////////// POST ACTION TO DISPLAY CURRENT SESSION //////////////
											$query = " SELECT * FROM `current_season` ";
											$run_query = mysqli_query($connection, $query);
											if(mysqli_num_rows($run_query) == 1){
												while($result = mysqli_fetch_assoc($run_query)){
													$show_current_session = $result['current_session'];
													echo"
														<div class='well'>
															<h4><b>Your Current Session is {$show_current_session}</b></h4>
														</div>
													";
												}
											}
											echo"
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Change Current Session:</span>
												<select class='form-control' name='current_session' style='width: 100%; float: left;'>
													<option selected>{$select}</option>";
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
											
											<input type='submit' name='current_session_btn' value='Specify Current Session' class='btn btn-info' />
										</form>
										<br />
										
										<form method='POST' action='staff_dashboard.php?administratives'>
										<p class='text-info'><b><span class='glyphicon glyphicon-bullhorn'></span> Choose Current Term At the Beginning of Every Term !</b></p>";
											///// POST ACTION TO DISPLAY CURRRENT TERM /////////////
											$query = " SELECT * FROM `current_season` ";
											$run_query = mysqli_query($connection, $query);
											if(mysqli_num_rows($run_query) == 1){
												while($result = mysqli_fetch_assoc($run_query)){
													$show_current_term = $result['current_term'];
													echo"
														<div class='well'>
															<h4><b>Your Current Term is {$show_current_term}</b></h4>
														</div>
													";
												}
											}
											echo"
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Change Current Term:</span>
												<select class='form-control' name='current_term' style='width: 100%; float: left;'>
													<option selected>{$select}</option>";
													
													$term_array = array("First Term", "Second Term", "Third Term");
													foreach($term_array as $term){
														echo "<option>{$term}</option><br>";
													}
										
													echo"
												</select>
											</div>
											<br />
											
											<input type='submit' name='current_term_btn' value='Specify Current Term' class='btn btn-info' />
										</form>
										<br />
										
										<form method='POST' action='staff_dashboard.php?administratives'>
											<legend>Session Management</legend>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Add New Session</span>
												<input type='text' name='add_session' class='form-control' placeholder='Type New Session e.g (2016/2017)' />
											</div>
											<br />
											
											<input type='submit' name='add_session_btn' value='Add Session' class='btn btn-warning' />
											<input type='submit' name='show_added_btn' value='Show Added Sessions' class='btn btn-info' />
										</form>
										<br />";
										
										if(isset($_POST['show_added_btn'])){
											///////////// POST ACTION TO SHOW ALL ADDED SESSIONS IF A BUTTON IS CLICKED /////
											$query = " SELECT * FROM `sessions` ";
											$run_query = mysqli_query($connection, $query);
											if(mysqli_num_rows($run_query) > 0){
												$i = 0;
												echo"
												<div class='table-responsive'>
													<table class='table table-striped'>
														<thead>
															<tr>
																<th>S/N</th>
																<th>Sessions</th>
																<th>Action</th>
															</tr>
														</thead>";
												while($result = mysqli_fetch_assoc($run_query)){
													$i++;
													$session_id = $result['id'];
													$show_all_sessions = $result['sessions'];
													echo"
														<tbody>
															<tr>
																<td>{$i}</td>
																<td>{$show_all_sessions}</td>
																<td>
																	<form method='POST' action=''>
																		<input type='hidden' name='hide_session_del' value='{$session_id}' />
																		<input type='submit' name='delete_session_btn' value='Delete' class='btn btn-xs btn-danger' />
																	</form>
																</td>
															</tr>
														</tbody>
													";
												}
												echo"</table>
												</div>";
											}
										}
										
										//////////// POST ACTION TO DELETE UPLOADED SESSIONS ////////////////
										if(isset($_POST['delete_session_btn'])){
											$hide_session_del = $_POST['hide_session_del'];
											
											$query = " DELETE FROM `sessions` WHERE `id` = '{$hide_session_del}' ";
											$run_query = mysqli_query($connection, $query);
											
											if($run_query == true){
												echo "<p class='text-success'><b>Session Deleted Successfully</b></p>";
											}else{
												echo "<p><b>Error! Could Not Delete Record</b></p>";
											}
										}
										
										echo"
										<form method='POST' action='staff_dashboard.php?administratives'>
											<legend>Class Management</legend>
											<p class='text-info'><b><span class='glyphicon glyphicon-bullhorn'></span> Add New Classes According to Your School Class Arrangement !</b></p>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Add New Class</span>
												<input type='text' name='add_class' class='form-control' placeholder='Type New Class e.g (JSS1A OR JSS2B OR SSS1 OR SSS3)' />
											</div>
											<br />
											
											<input type='submit' name='add_class_btn' value='Add Class' class='btn btn-warning' />
											<input type='submit' name='view_class_btn' value='View Classes' class='btn btn-info' />
										</form>";
										
										if(isset($_POST['view_class_btn'])){
											///////////// POST ACTION TO SHOW ALL ADDED CLASS IF THE BUTTON IS CLICKED ////////////
											$query = " SELECT * FROM `classes` ";
											$run_query = mysqli_query($connection, $query);
											if(mysqli_num_rows($run_query) > 0){
												$i = 0;
												echo"
												<div class='table-responsive'>
													<table class='table table-striped'>
														<thead>
															<tr>
																<th>S/N</th>
																<th>Classes</th>
																<th>Action</th>
															</tr>
														</thead>";
												while($result = mysqli_fetch_assoc($run_query)){
													$i++;
													$class_id = $result['id'];
													$all_class = $result['classes'];
													echo"
															<tbody>
																<tr>
																	<td>{$i}</td>
																	<td>$all_class</td>
																	<td>
																		<form method='POST' action=''>
																			<input type='hidden' name='hide_class_del' value='{$class_id}' />
																			<input type='submit' name='delete_class_btn' value='Delete' class='btn btn-xs btn-danger' />
																		</form>
																	</td>
																</tr>
															</tbody>
													";
												}
												echo"</table>
												</div>";
											}
										}
										echo"
									</div>
								</div>
							";
							
							///////////////// POST ACTION TO DELETE UPLOADED CLASSES ////////////
							if(isset($_POST['delete_class_btn'])){
								$hide_class_del = $_POST['hide_class_del'];
								
								$query = " DELETE FROM `classes` WHERE `id` = '{$hide_class_del}' ";
								$run_query = mysqli_query($connection, $query);
								
								if($run_query == true){
									echo "<p class='text-success'><b>Class Deleted Successfully</b></p>";
								}else{
									echo "<p><b>Error! Could Not Delete Record</b></p>";
								}
							}
						}
						elseif(isset($_GET['register_new_student'])){
							require_once("staff_dashboard_processor.php");
							
									foreach($error as $msg){
										echo "<h4 class='text-danger'>{$msg}</h4>";
									}
									
								echo"
								<div class='panel panel-primary'>
									<div class='panel-heading'>
										<h3 class='text-center'>Register New Student</h3>
									</div>
									<div class='panel-body'>
										<form method='POST' enctype='multipart/form-data' action='staff_dashboard.php?register_new_student'>
											<p class='text-warning noprint'><b><u>Please Note that Registration is Unique to a particular Session, Make Sure that your Current Session has been Declared to avoid clashing of Students Registration Number. To Declare Current Session, Click on the Administratives Tab !!!</u></b></p>
											<legend>Students Bio-Data</legend>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Gender:</span>
												<select class='form-control' name='reg_student_gender'>
													<option selected >"; echo $select; echo "</option>
													<option value='male'>Male</option>
													<option value='female'>Female</option>
												</select>
											</div>
											<br />
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>First Name:</span>
												<input type='text' name='reg_student_firstname' required class='form-control' placeholder='Enter first name (surname)' aria-describedby='basic-addon2'>
											</div>
											<br />
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Last Name:</span>
												<input type='text' name='reg_student_lastname' required class='form-control' placeholder='Enter last name' aria-describedby='basic-addon2'>
											</div>
											<br/>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Other Name:</span>
												<input type='text' name='reg_student_othername' class='form-control' placeholder='Enter other name (optional)' aria-describedby='basic-addon2'>
											</div>
											<br/>
											<div class='row'>
												<div class='col-md-4 col-sm-4 col-xs-12'>
													<br />
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>D O B:</span>
														<select class='form-control' name='reg_student_dob' style='width: 100%; float: left;'>
															<option selected>"; echo $select; echo "</option>";
															for($dob = 1; $dob <= 31; $dob++){
																echo "<option>{$dob}</option>";
															}
												
															echo"
														</select>
													</div>
												</div>
												<div class='col-md-4 col-sm-4 col-xs-12'>
													<br />
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>MONTH:</span>
														<select class='form-control' name='reg_student_mob' style='width: 100%; float: left;'>
															<option selected>"; echo $select;  echo "</option>";
											
																$month_array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
													
																foreach($month_array as $month){
																	echo "<option>{$month}</option><br>";
																}
																echo"
														</select>
													</div>
												</div>
												<div class='col-md-4 col-sm-4 col-xs-12'>
												<br />
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>YEAR:</span>
													<select class='form-control' name='reg_student_yob' style='width: 100%; float: left;'>
														<option selected>"; echo $select; echo"</option>";
											
															for($year = 2016; $year >= 1960; $year--){
															echo"
														<option>{$year}</option>";
															}
											
														echo"
													</select>
												</div>
												</div>
											</div>
										<br />
										<legend>Contact</legend>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Contact Phone:</span>
												<input type='phone' name='reg_student_phone' required class='form-control' placeholder='Enter nearest phone number to you' aria-describedby='basic-addon2'>
											</div>
											<br />
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Home Address:</span>
												<textarea rows='3' name='reg_student_address' required class='form-control' placeholder='...' aria-describedby='basic-addon2'></textarea>
											</div>
											<br/>
									
										<legend>Place Of Origin</legend>
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>State:</span>
											<select class='form-control' name='reg_student_state'>
												<option selected >"; echo $select; echo "</option>";
												
												$state_array = array("Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT Abuja");
											
												foreach($state_array as $state){
													echo "<option>{$state}</option><br>";
												}
								
												echo"
											</select>
										</div>
										<br />
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Nationality:</span>
											<select class='form-control' name='reg_student_nationality'>
												<option selected >"; echo $select; echo "</option>
												<option>Nigerian</option>
												<option>Non-nigerian</option>
											</select>
										</div>
										<br />
										<legend>Sponsor</legend>
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Name:</span>
											<input type='text' name='reg_sponsor_name' required class='form-control' placeholder='Enter sponsors name' aria-describedby='basic-addon2'>
										</div>
										<br />
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Phone:</span>
											<input type='phone' name='reg_sponsor_phone' required class='form-control' placeholder='Enter sponsors phone number' aria-describedby='basic-addon2'>
										</div>
										<br />
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Relationship:</span>
											<select class='form-control' name='reg_sponsor_relationship'>
												<option selected >";  echo $select; echo "</option>
												<option>Self</option>
												<option>Parent</option>
												<option>Sibling</option>
												<option>Guardian</option>
												<option>Others</option>
											</select>
										</div>
										<br />
								
									<legend>Academics</legend>
									<div class='input-group'>
										<span class='input-group-addon' id='basic-addon2'>Targeted Class:</span>
										<select class='form-control' name='reg_student_tc'>
											<option selected >{$select}</option>";
											$query = " SELECT * FROM `classes` ";
											$run_query = mysqli_query($connection, $query);
											if(mysqli_num_rows($run_query) > 0){
												while($result = mysqli_fetch_assoc($run_query)){
													$target_classes = $result['classes'];
													echo"
														<option>{$target_classes}</option>
													";
												}
											}
											
											echo"
										</select>
									</div>
									
									<legend>Multimedia</legend>
									<div class='input-group'>
										<span class='input-group-addon' id='basic-addon2'>Passport:</span>
										<input type='file' name='file' required class='form-control' aria-describedby='basic-addon2'>
									</div>
									<br />
									
									<div class='text-center'>
										<input type='submit' name='student_reg_btn' value='REGISTER NEW STUDENT' class='btn btn-primary' />
									</div>
								</form>
								<button type='button' class='btn btn-default' onclick='window.print()' value='print a div!'><span class='glyphicon glyphicon-print'></span> Print</button>
							</div>
						</div>";
					}
					elseif(isset($_GET['students_reg_no'])){
						echo"
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<div class='row'>
										<div class='col-md-8'>
											<h3 class='log-text'>Please Select Class to View Students</h3>
										</div>
										<div class='col-md-4'>
											<br />
											<form class='form-inline'>
												<div class='row'>
													<div class='col-md-6'>
														<div class='input-group'>
															<input type='text' name='search_bar_txt' placeholder='Search Student' class='form-control' />
														</div>
													</div>
													
													<div class='col-md-6'>
														<input type='submit' value='Search' class='btn btn-warning' />
													</div>
												</div>
											</form>
										</div>
									</div>";
									echo"
								</div>
								<div class='panel-body'>
									<form class='' method='POST' action='staff_dashboard.php?students_reg_no'>
										<div class='row'>
											<div class='col-md-10'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>CLASS</span>
													<select class='form-control' name='reg_no_class'>
														<option selected> {$select} </option>";
														$query = " SELECT * FROM `classes` ";
														$run_query = mysqli_query($connection, $query);
														if(mysqli_num_rows($run_query) > 0){
															while($result = mysqli_fetch_assoc($run_query)){
																$target_classes = $result['classes'];
																echo"
																	<option>{$target_classes}</option>
																";
															}
														}
														echo"
													</select>
												</div>
											</div>
											<div class='col-md-2'>
												<input type='submit' name='get_reg_no_btn' id='submit' value='Get Details' class='btn btn-large btn-success login_btn text-center' />
											</div>
										</div>
									</form>
								</div>		
							</div>
							<div class='table-responsive'>
								<table class='table table-striped'>
									<thead>
										<tr class='bg-primary'>
											<th>S/N</th>
											<th>NAMES</th>
											<th>GENDER</th>
											<th>CLASS</th>
											<th>PHONE</th>
											<th>REG NUMBER</th>
											<th>PASSWORD</th>
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
										";
										//////////////////// POST ACTION TO GET ALL STUDENTS NAMES AND REGISTRATION NUMBER FROM A PARTICULAR CLASS //////////////////////
										if(isset($_POST['get_reg_no_btn'])){
											$reg_no_class = inject_checker($connection, $_POST['reg_no_class']);
											
											if($reg_no_class == $select){
												$reg_msg = "<h4 class='text-danger'><b>!!! Please select class to get registration number.</b></h4>";
												echo $reg_msg;
											}
											else{
												$query = " SELECT * FROM `students` WHERE `class` = '{$reg_no_class}' ORDER BY `reg_number` ASC ";
												$run_query = mysqli_query($connection, $query);
												if($run_query == true){
													if(mysqli_num_rows($run_query) > 0){
														$i = 0;
														while($result = mysqli_fetch_array($run_query)){
															$i++;
															$reg_no_id = $result['id'];
															$reg_no_firstname = $result['firstname'];
															$reg_no_lastname = $result['lastname'];
															$reg_no_othername = $result['othername'];
															$reg_no_class = $result['class'];
															$reg_reg_number = $result['reg_number'];
                                                            $reg_phone = $result['contact_phone'];
                                                            $reg_password = $result['gen_password'];
                                                            $reg_sex = ucfirst($result['gender']);
															
															$reg_name = ucwords("{$reg_no_firstname} {$reg_no_lastname} {$reg_no_othername}");
															echo"
																<tr>
																	<td>{$i}</td>
																	<td>{$reg_name}</td>
																	<td>{$reg_sex}</td>
																	<td>{$reg_no_class}</td>
																	<td>{$reg_phone}</td>
																	<td>{$reg_reg_number}</td>
																	<td>{$reg_password}</td>
																	<td>
																		<form method='POST' action=''>
																			<input type='hidden' name='all_student_hidden_id' value='{$reg_no_id}' />
																			<input type='submit' name='edit_btn' value='Edit' class='btn btn-xs btn-primary' />
																			<input type='submit' name='student_delete_btn' value='Delete' class='btn btn-xs btn-danger' />
																		</form>
																	</td>
																</tr>
															";
														}
													}else{
														$reg_msg = "<h4 class='text-danger'><b>!!! No Records Found in {$reg_no_class}</b></h4>";
														echo $reg_msg;
													}
												}
											}
											//////////////// POST ACTION TO DELETE REGISTERED STUDENT FROM A PARTICULAR CLASS, BUT IT'S NOT WORKING FOR NOW //////
											if(isset($_POST['student_delete_btn'])){
												$all_student_hidden_id = $_POST['all_student_hidden_id'];
												
												$query = " DELETE FROM `students` WHERE `id` = '{all_student_hidden_id}' AND `class` = '{$reg_no_class}' ";
												$run_query = mysqli_query($connection, $query);
												
												if($run_query == true){
													echo "<p class='text-success'><b>Student Deleted Successfully</b></p>";
												}else{
													echo "<p><b>Error! Could Not Delete Record</b></p>";
												}
											}
											
										}else{
											///////////// POST ACTION TO DISPLAY ALL STUDENTS IN THE SCHOOL ////////////////
											$query = " SELECT * FROM `students` ORDER BY `class` LIMIT 50";
											$run_query = mysqli_query($connection, $query);
											if($run_query == true){
												if(mysqli_num_rows($run_query) > 0){
													$i = 0;
													while($result = mysqli_fetch_assoc($run_query)){
														$i++;
														$student_id = $result['id'];
														$student_firstname = $result['firstname'];
														$student_lastname = $result['lastname'];
														$student_othername = $result['othername'];
														$student_class = $result['class'];
														$student_reg_number = $result['reg_number'];
                                                        $student_phone = $result['contact_phone'];
                                                        $student_password = $result['gen_password'];
                                                        $student_sex = ucfirst($result['gender']);
														
														$full_name = ucwords("{$student_firstname} {$student_lastname} {$student_othername}");
														
														echo"
															<tr>
																<td>{$i}</td>
																<td>{$full_name}</td>
																<td>{$student_sex}</td>
																<td>{$student_class}</td>
																<td>{$student_phone}</td>
																<td>{$student_reg_number}</td>
																<td>{$student_password}</td>
																<td>
																	<form method='POST' action=''>
																		<input type='hidden' name='all_student_hidden_id' value='{$student_id}' />
																		<input type='submit' name='edit_btn' value='Edit' data-toggle='modal' data-target='#demanppopUpWindow1' class='btn btn-xs btn-primary' />
																		<input type='submit' name='all_student_delete_btn' value='Delete' class='btn btn-xs btn-danger' />
																	</form>


																</td>
															</tr>
														";
													}
												}else{
													echo "<h4 class='text-danger'><b>No Student has been registered in this portal...</b></h4>";
												}
											}
										}
										
										//////////// POST ACTION TO DELETE REGISTERED STUDENTS //////////////////////
										if(isset($_POST['all_student_delete_btn'])){
											$all_student_hidden_id = $_POST['all_student_hidden_id'];
											
											$query = " DELETE FROM `students` WHERE `id` = '{$all_student_hidden_id}' ";
											$run_query = mysqli_query($connection, $query);
											if($run_query == true){
												echo "<p class='text-success'><b>Student Deleted Successfully</b></p>";
											}else{
												echo "<p><b>Error! Could Not Delete Record</b></p>";
											}
										}
                                        /////////////////////////////// POST ACTION TO GET A PATICULAR STUDENT DETAILS IF EDIT BUTTON IS CLICKED ///////////////////////////
                                        if(isset($_POST['edit_btn'])){
                                            $all_student_hidden_id = $_POST['all_student_hidden_id'];

                                            $query = " SELECT * FROM `students` WHERE `id` = '{$all_student_hidden_id}' ";
                                            $run_query = mysqli_query($connection, $query);

                                            if(mysqli_num_rows($run_query) == 1){
                                                while($result = mysqli_fetch_assoc($run_query)){
                                                    $id = $result['id'];
                                                    $gender = $result['gender'];
                                                    $firstname = $result['firstname'];
                                                    $lastname = $result['lastname'];
                                                    $othername = $result['othername'];
                                                    $dob = $result['dob'];
                                                    $mob = $result['mob'];
                                                    $yob = $result['yob'];
                                                    $contact_phone = $result['contact_phone'];
                                                    $address = $result['address'];
                                                    $state = $result['state'];
                                                    $nationality = $result['nationality'];
                                                    $sponsor_name = $result['sponsor_name'];
                                                    $sponsor_phone = $result['sponsor_phone'];
                                                    $relationship = $result['relationship'];
                                                    $class = $result['class'];
                                                    $passport = $result['passport'];
                                                }

                                                echo"
                                                    <div class='panel panel-primary'>
                                                        <div class='panel-heading'>
                                                            <h3 class='text-center'>Edit Student Info</h3>
                                                        </div>
                                                        <div class='panel-body'>
                                                            <form method='POST' enctype='multipart/form-data' action='staff_dashboard.php?students_reg_no'>
                                                                <legend>Students Bio-Data</legend>
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Gender:</span>
                                                                    <select class='form-control' name='edit_student_gender'>
                                                                        <option selected >"; echo ucfirst($gender); echo "</option>
                                                                        <option value='male'>Male</option>
                                                                        <option value='female'>Female</option>
                                                                    </select>
                                                                </div>
                                                                <br />
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>First Name:</span>
                                                                    <input type='text' name='edit_student_firstname' value='{$firstname}' required class='form-control' placeholder='Enter first name (surname)' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br />
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Last Name:</span>
                                                                    <input type='text' name='edit_student_lastname' value='{$lastname}' required class='form-control' placeholder='Enter last name' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br/>
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Other Name:</span>
                                                                    <input type='text' name='edit_student_othername' value='{$othername}' class='form-control' placeholder='Enter other name (optional)' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br/>
                                                                <div class='row'>
                                                                    <div class='col-md-4 col-sm-4 col-xs-12'>
                                                                        <br />
                                                                        <div class='input-group'>
                                                                            <span class='input-group-addon' id='basic-addon2'>D O B:</span>
                                                                            <select class='form-control' name='edit_student_dob' style='width: 100%; float: left;'>
                                                                                <option selected>"; echo $dob; echo "</option>";
                                                                    for($dob = 1; $dob <= 31; $dob++){
                                                                        echo "<option>{$dob}</option>";
                                                                    }

                                                                    echo"
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class='col-md-4 col-sm-4 col-xs-12'>
                                                                        <br />
                                                                        <div class='input-group'>
                                                                            <span class='input-group-addon' id='basic-addon2'>MONTH:</span>
                                                                            <select class='form-control' name='edit_student_mob' style='width: 100%; float: left;'>
                                                                                <option selected>"; echo $mob;  echo "</option>";

                                                                    $month_array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

                                                                    foreach($month_array as $month){
                                                                        echo "<option>{$month}</option><br>";
                                                                    }
                                                                    echo"
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class='col-md-4 col-sm-4 col-xs-12'>
                                                                    <br />
                                                                    <div class='input-group'>
                                                                        <span class='input-group-addon' id='basic-addon2'>YEAR:</span>
                                                                        <select class='form-control' name='edit_student_yob' style='width: 100%; float: left;'>
                                                                            <option selected>"; echo $yob; echo"</option>";

                                                                    for($year = 2016; $year >= 1960; $year--){
                                                                        echo"
                                                                            <option>{$year}</option>";
                                                                    }

                                                                    echo"
                                                                        </select>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            <br />
                                                            <legend>Contact</legend>
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Contact Phone:</span>
                                                                    <input type='phone' name='edit_student_phone' value='{$contact_phone}' required class='form-control' placeholder='Enter nearest phone number to you' aria-describedby='basic-addon2'>
                                                                </div>
                                                                <br />
                                                                <div class='input-group'>
                                                                    <span class='input-group-addon' id='basic-addon2'>Home Address:</span>
                                                                    <textarea rows='3' name='edit_student_address' required class='form-control' placeholder='...' aria-describedby='basic-addon2'>{$address}</textarea>
                                                                </div>
                                                                <br/>

                                                            <legend>Place Of Origin</legend>
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>State:</span>
                                                                <select class='form-control' name='edit_student_state'>
                                                                    <option selected >"; echo $state; echo "</option>";

                                                                    $state_array = array("Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT Abuja");

                                                                    foreach($state_array as $state){
                                                                        echo "<option>{$state}</option><br>";
                                                                    }

                                                                    echo"
                                                                </select>
                                                            </div>
                                                            <br />
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Nationality:</span>
                                                                <select class='form-control' name='edit_student_nationality'>
                                                                    <option selected >"; echo $nationality; echo "</option>
                                                                    <option>Nigerian</option>
                                                                    <option>Non-nigerian</option>
                                                                </select>
                                                            </div>
                                                            <br />
                                                            <legend>Sponsor</legend>
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Name:</span>
                                                                <input type='text' name='edit_sponsor_name' value='{$sponsor_name}' required class='form-control' placeholder='Enter sponsors name' aria-describedby='basic-addon2'>
                                                            </div>
                                                            <br />
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Phone:</span>
                                                                <input type='phone' name='edit_sponsor_phone' value='{$sponsor_phone}' required class='form-control' placeholder='Enter sponsors phone number' aria-describedby='basic-addon2'>
                                                            </div>
                                                            <br />
                                                            <div class='input-group'>
                                                                <span class='input-group-addon' id='basic-addon2'>Relationship:</span>
                                                                <select class='form-control' name='edit_sponsor_relationship'>
                                                                    <option selected >";  echo $relationship; echo "</option>
                                                                    <option>Self</option>
                                                                    <option>Parent</option>
                                                                    <option>Sibling</option>
                                                                    <option>Guardian</option>
                                                                    <option>Others</option>
                                                                </select>
                                                            </div>
                                                            <br />

                                                        <legend>Academics</legend>
                                                        <div class='input-group'>
                                                            <span class='input-group-addon' id='basic-addon2'>Targeted Class:</span>
                                                            <select class='form-control' name='edit_student_tc'>
                                                                <option selected >{$class}</option>";
                                                                    $query = " SELECT * FROM `classes` ";
                                                                    $run_query = mysqli_query($connection, $query);
                                                                    if(mysqli_num_rows($run_query) > 0){
                                                                        while($result = mysqli_fetch_assoc($run_query)){
                                                                            $target_classes = $result['classes'];
                                                                            echo"
                                                                            <option>{$target_classes}</option>
                                                                        ";
                                                                        }
                                                                    }

                                                                    echo"
                                                            </select>
                                                        </div>

                                                        <!--<legend>Multimedia</legend>
                                                        <div class='input-group'>
                                                            <span class='input-group-addon' id='basic-addon2'>Passport:</span>
                                                            <input type='file' name='file' value='{$passport}' required class='form-control' aria-describedby='basic-addon2'>
                                                        </div>-->
                                                        <br />

                                                        <div class='text-center'>
                                                            <input type='hidden' name='one_student_hidden_id' value='{$id}' />
                                                            <input type='submit' name='student_edit_btn' value='UPDATE STUDENT INFO' class='btn btn-primary' />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>"
                                                ;
                                            }
                                        }

                                        //////////////////////////// POST ACTION TO EDIT AND UPDATE A PARTICULAR STUDENT'S INFO INTO DB //////////
                                        if(isset($_POST['student_edit_btn'])){
                                            $one_student_hidden_id = $_POST['one_student_hidden_id'];
                                            $edit_student_gender = inject_checker($connection, $_POST['edit_student_gender']);
                                            $edit_student_firstname = inject_checker($connection, $_POST['edit_student_firstname']);
                                            $edit_student_lastname = inject_checker($connection, $_POST['edit_student_lastname']);
                                            $edit_othername = inject_checker($connection, $_POST['edit_student_othername']);
                                            $edit_student_dob = inject_checker($connection, $_POST['edit_student_dob']);
                                            $edit_student_mob = inject_checker($connection, $_POST['edit_student_mob']);
                                            $edit_student_yob = inject_checker($connection, $_POST['edit_student_yob']);
                                            $edit_student_phone = inject_checker($connection, $_POST['edit_student_phone']);
                                            $edit_student_address = inject_checker($connection, $_POST['edit_student_address']);
                                            $edit_student_state = $_POST['edit_student_state'];
                                            $edit_student_nationality = $_POST['edit_student_nationality'];
                                            $edit_sponsor_name = inject_checker($connection, $_POST['edit_sponsor_name']);
                                            $edit_sponsor_phone = inject_checker($connection, $_POST['edit_sponsor_phone']);
                                            $edit_sponsor_relationship = $_POST['edit_sponsor_relationship'];
                                            $edit_student_tc = $_POST['edit_student_tc'];

                                            $query = " UPDATE `students` SET
                                                                          `gender` = '{$edit_student_gender}',
                                                                          `firstname` = '{$edit_student_firstname}',
                                                                          `lastname` = '{$edit_student_lastname}',
                                                                          `othername` = '{$edit_othername}',
                                                                          `dob` = '{$edit_student_dob}',
                                                                          `mob` = '{$edit_student_mob}',
                                                                          `yob` = '{$edit_student_yob}',
                                                                          `contact_phone` = '{$edit_student_phone}',
                                                                          `address` = '{$edit_student_address}',
                                                                          `state` = '{$edit_student_state}',
                                                                          `nationality` = '{$edit_student_nationality}',
                                                                          `sponsor_name` = '{$edit_sponsor_name}',
                                                                          `sponsor_phone` = '{$edit_sponsor_phone}',
                                                                          `relationship` = '{$edit_sponsor_relationship}',
                                                                          `class` = '{$edit_student_tc}' WHERE `id` = '{$one_student_hidden_id}' ";
                                            $run_query = mysqli_query($connection, $query);

                                            if($run_query == true){
                                                echo "<p class='text-success'><b>Student Info Updated</b></p>";
                                            }else{
                                                echo "<p class='text-danger><b>Student Info Update Failed</b></p>";
                                            }
                                        }

										echo"
									</tbody>
								</table>
							</div>
						";
					}
					elseif(isset($_GET['register_subjects'])){
						require_once("register_subject.php");
					}
					
					
					elseif(isset($_GET['upload'])){
						require_once("upload.php");
						
						foreach($error as $msg){
							echo "<h4 class='text-danger'>{$msg}</h4>";
						}
					}
					
					
					elseif(isset($_GET['publish_result'])){
						foreach($error as $error_msg){
							echo "<p class='text-danger'><b><span class='glyphicon glyphicon-close'></span> {$error_msg}</b></p>";
						}
						if(isset($msg_insert_success)){
							echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> {$msg_insert_success}</b></p>";
						}
						if(isset($msg_insert_error)){
							echo "<p class='text-danger'><b><span class='glyphicon glyphicon-close'></span> {$msg_insert_error}</b></p>";
						}
						if(isset($msg_insert_failed)){
							echo "<p class='text-danger'><b><span class='glyphicon glyphicon-close'></span> {$msg_insert_failed}</b></p>";
						}
						echo"
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<h2>Publish Student Results</h2>
								</div>
								<div class='panel-body'>
									<p class='text-warning'><b>NOTE: Before Publishing The Result of any Class, Make Sure that All the results for each subject for that particular Class have been Uploaded Properly. Click On Result Upload Tab to view Uploaded Results ...</b></p>
									<form method='POST' action='staff_dashboard.php?publish_result'>
										<legend>Publish  Results</legend>
										<div class='row'>
											<div class='col-md-3'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Student Class:</span>
													<select class='form-control' name='publish_result_class'>
														<option selected >{$select}</option>";
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
											</div>
											
											<div class='col-md-3'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Term:</span>
													<select class='form-control' name='publish_result_term'>
														<option selected >{$select}</option>";
															$term_array = array("First Term", "Second Term", "Third Term");
															
															foreach($term_array as $term){
																echo "<option>{$term}</option><br>";
															}
															echo"
													</select>
												</div>
											</div>
											
											<div class='col-md-3'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Session:</span>
													<select class='form-control' name='publish_result_session'>";
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
											
											<div class='col-md-2'>
												<input type='submit' name='publish_result_btn' value='PUBLISH' class='btn btn-success' />
											</div>
											
										</div>
									</form>
									<br />
									
									
									<form method='POST' action='staff_dashboard.php?publish_result'>
										<legend>View Published Results</legend>
										<div class='row'>
											<div class='col-md-3'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Student Class:</span>
													<select class='form-control' name='show_publish_result_class'>
														<option selected >{$select}</option>";
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
											</div>
											
											<div class='col-md-3'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Term:</span>
													<select class='form-control' name='show_publish_result_term'>
														<option selected >{$select}</option>";
															$term_array = array("First Term", "Second Term", "Third Term");
															
															foreach($term_array as $term){
																echo "<option>{$term}</option><br>";
															}
															echo"
													</select>
												</div>
											</div>
											
											<div class='col-md-3'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Session:</span>
													<select class='form-control' name='show_publish_result_session'>";
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
											<div class='col-md-2'>
												<input type='submit' name='view_publish_result_btn' value='VIEW PUBLISHED' class='btn btn-warning' />
											</div>
											
											<div>
												<input type='submit' name='delete_published_result_btn' value='DELETE' class='btn btn-danger' />
											</div>
										</div>
									</form>
									<br />";
									
									///////////////// POST ACTION TO VIEW PUBLISHED RESULT ////////////
									if(isset($_POST['view_publish_result_btn'])){
										$show_publish_result_class = $_POST['show_publish_result_class'];
										$show_publish_result_term = $_POST['show_publish_result_term'];
										$show_publish_result_session = $_POST['show_publish_result_session'];
										
										if($show_publish_result_class == $select){
											echo "<p class='text-danger'><b>Please Select Class</b></p>";
										}
										elseif($show_publish_result_term == $select){
											echo "<p class='text-danger'><b>Please Select Term</b></p>";
										}
										elseif($show_publish_result_session == $select){
											echo "<p class='text-danger'><b>Please Select Session</b></p>";
										}else{
											$query_show = " SELECT * FROM `positions` WHERE `class` = '{$show_publish_result_class}' AND `term` = '{$show_publish_result_term}' AND `session` = '{$show_publish_result_session}' ";
											$run_query_show = mysqli_query($connection, $query_show);
											
											if(mysqli_num_rows($run_query_show) > 0){
												$i = 0;
												echo"
													<div class='table-responsive'>
														<table class='table table-striped'>
															<thead>
																<tr>
																	<th>S/N</th>
																	<th>NAME</th>
																	<th>REG NO.</th>
																	<th>CLASS</th>
																	<th>TERM</th>
																	<th>SESSION</th>
																	<th>TOTAL</th>
																	<th>AVERAGE</th>
																	<th>POSITION IN CLASS</th>
																</tr>
															</thead>
												";
												while($result = mysqli_fetch_assoc($run_query_show)){
													$i++;
													$name = $result['name'];
													$reg_number = $result['reg_number'];
													$class = $result['class'];
													$term = $result['term'];
													$session = $result['session'];
													$student_total = $result['students_sub_total'];
													$student_average = $result['students_sub_average'];
													$student_position = $result['class_position'];
													echo"
														<tbody>
															<tr>
																<td>{$i}</td>
																<td>{$name}</td>
																<td class='warning'>{$reg_number}</td>
																<td>{$class}</td>
																<td>{$term}</td>
																<td>{$session}</td>
																<td class='success'>{$student_total}</td>
																<td class='danger'>{$student_average}</td>
																<td class='info'>{$student_position}</td>
																
															</tr>
														</tbody>
													";
												}
											}else{
												echo "<p class='text-danger'><b>This Particular Result is yet to be published</b></p>";
											}
											echo"
												</table>
											</div>
											";
										}										
									}
									///////////////// POST ACTION TO DELETE PUBLISHED RESULT ////////////////////
									if(isset($_POST['delete_published_result_btn'])){
											$show_publish_result_class = $_POST['show_publish_result_class'];
											$show_publish_result_term = $_POST['show_publish_result_term'];
											$show_publish_result_session = $_POST['show_publish_result_session'];
											
											if($show_publish_result_class == $select){
												echo "<p class='text-danger'><b>Please Select Class</b></p>";
											}
											elseif($show_publish_result_term == $select){
												echo "<p class='text-danger'><b>Please Select Term</b></p>";
											}
											elseif($show_publish_result_session == $select){
												echo "<p class='text-danger'><b>Please Select Session</b></p>";
											}else{
												$query = " DELETE FROM `positions` WHERE `class` = '{$show_publish_result_class}' AND `term` = '{$show_publish_result_term}' AND `session` = '{$show_publish_result_session}' ";
												$run_query = mysqli_query($connection, $query);
												
												if($run_query == true){
													echo "<p class='text-success'><b>Published Result Deleted Successfully</b></p>";
												}else{
													echo "<p class='text-danger'><b>Published Result Failed to Delete</b></p>";
												}
											}
										}
									
									echo"
									<form method='POST' action=''>
										<div class='col-md-5'>
											<legend>End of Term Date</legend>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>This Term Ends</span>
												<input type='text' name='term_end_date' class='form-control' placeholder='Type End of Term Date e.g 21/02/2015' />
											</div>
										</div>
										
										<div class='col-md-5'>
											<legend>Next Resumption Date</legend>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>Next Term Begins</span>
												<input type='text' name='next_term_date' class='form-control' placeholder='Type Resumption Date e.g 15/05/2015' />
											</div>
											<br />
										</div>
										
										<div class='col-md-2'>
											<br />
											<br />
											<input type='submit' name='result_date_btn' value='Declare' class='btn btn-info' />
										</div>

									</form>
									<br />
								</div>
							</div>
						";
						
						if(isset($_POST['result_date_btn'])){
							$term_end_date = inject_checker($connection, $_POST['term_end_date']);
							$next_term_date = inject_checker($connection, $_POST['next_term_date']);
							
							if(empty($term_end_date)){
								echo "<p class='text-danger'><b>Please Type End of Term Date</b></p>";
							}
							elseif(empty($next_term_date)){
								echo "<p class='text-danger'><b>Please Type Next Resumption Date</b></p>";
							}else{
								$query = " SELECT * FROM `dates` ";
								$run_query = mysqli_query($connection, $query);
								
								if(mysqli_num_rows($run_query) == 0){
									$query = " INSERT INTO `dates`(`end_of_term`, `next_term_begins`, `date_declared`) 
												VALUES('$term_end_date', '$next_term_date', '$date') ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b>Session Dates Declared Successfully</b></p>";
									}else{
										echo "<p class='text-danger'><b>Session Dates Declaration Failed</b></p>";
									}
								}
								elseif(mysqli_num_rows($run_query) == 1){
									$query = " UPDATE `dates` SET `end_of_term` = '$term_end_date' AND `next_term_begins` = 'next_term_date' AND `date_declared` = '$date' ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b>Session Dates Updated Successfully</b></p>";
									}else{
										echo "<p class='text-danger'><b>Session Dates Update Failed</b></p>";
									}
									
									
								}
							}
						}
					}
					elseif(isset($_GET['promote_students'])){
						if(isset($_POST['promote_students_btn'])){
							////////////// POST ACTION TO PROMOTE STUDENTS TO ANOTHER CLASS ///////////////
							$promote_student_from = inject_checker($connection, $_POST['promote_student_from']);
							$promote_student_to = inject_checker($connection, $_POST['promote_student_to']);
							
							if($promote_student_from == $select){
								echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Please Select Class to Promote From</b></p>";
							}
							elseif($promote_student_to == $select){
								echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Please Select Class to Promote To</b></p>";
							}else{
								if($promote_student_from == $promote_student_to){
									echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> You can not promote students to their previous Class</b></p>";
								}
								elseif($promote_student_from == $select){
									echo "<p class='text-danger'><b>Error: Please Select Class you wish to promote From</b></p>";
								}
								elseif($promote_student_to == $select){
									echo "<p class='text-danger'><b>Error: Please Select Class you wish to promote To</b></p>";
								}else{
									$update_query = " UPDATE `students` SET `class` = '{$promote_student_to}' WHERE `class` = '{$promote_student_from}' ";
									$run_update_query = mysqli_query($connection, $update_query);
									if($run_update_query == true){
										echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> Promotion Successful</b></p>";
										echo "";
									}else{
										echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Promotion Failed</b></p>";
										echo "";
									}
								}
							}
						}
						echo"
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<h2>Promote Students</h2>
								</div>
								<div class='panel-body'>
								    <p class='text-danger'><b>Caution:</b> Start student promotion from the <b>top</b> class to the <b>lower</b> class example: SSS3 to Graduated, SSS2 to SSS3 and so on till the end. Thank you.</p>
									<p class='text-warning'><b>Note: Promotion of Students Into a Higher Class Must be done at the End of Third Term i.e the End of an Academic Session. Please Comply to Avoid School Management Errors ...</b></p>
									<form method='POST' action='staff_dashboard.php?promote_students'>
										<div class='row'>
											<div class='col-md-4'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>Promote From:</span>
													<select class='form-control' name='promote_student_from'>
														<option selected >{$select}</option>";
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
											</div>
											
											<div class='col-md-4'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>To:</span>
													<select class='form-control' name='promote_student_to'>
														<option selected >{$select}</option>";
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
														<option>Graduated</option>
													</select>
												</div>
											</div>
											
											<div>
												<input type='submit' name='promote_students_btn' value='PROMOTE' class='btn btn-success' />
											</div>
											
										</div>
									</form>
								</div>
							</div>
						";
					}
					elseif(isset($_GET['print_student_slip'])){
						require_once("staff_dashboard_processor.php");
						echo"
							<div class='col-md-10'>
								<div class='row'>
									<div class='col-md-12' id='log'>
										<div class='panel panel-primary'>
											<div class='panel-heading'>
												<h3 class='log-text'>Enter Student Reg No to View Slip</h3>
											</div>
											<div class='panel-body'>
												<form class='' id='login' method='POST' action='staff_dashboard.php?print_student_slip'>
													<div class='input-group'>
														<span class='input-group-addon' id='basic-addon2'>Reg No:</span>
														<input type='text' name='slip_reg_number' placeholder='Type Your Registration Number' class='form-control' />
													</div>
													<br />
										
													<p id='btnsubmit'><input type='submit' name='admin_print_slip_btn' id='submit' value='View Slip' class='btn btn-large btn-success login_btn text-center' /></p>
												</form>
											</div>
										</div>
									</div>
								</div>";
								foreach($error as $msg){
									echo "<h4 class='text-danger'>{$msg}</h4>";
								}
							echo"
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
										<form class='' id='login' method='POST' action='staff_dashboard_processor.php'>
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>REG NO</span>
												<input type='text' placeholder='Enter Registration Number' class='form-control' name='result_regno' />
											</div>
											<br />
											
											<div class='input-group'>
												<span class='input-group-addon' id='basic-addon2'>CLASS</span>
												<select class='form-control' name='result_session'>
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
												<input type='text' placeholder='Enter Card Pin' class='form-control' name='result_pin' />
											</div>
											<br />
											<p id='btnsubmit'><input type='submit' name='result_check_btn' id='submit' value='Check Result' class='btn btn-large btn-success login_btn text-center' /></p>
										</form>
									</div>		
								</div>
							</div>
						";
					}
					elseif(isset($_GET['register_new_user'])){
						require_once("staff_dashboard_processor.php");
						echo"
						<div class='col-md-10' id='log'>";
							foreach($error as $msg_failed){
								echo "<h4 class='text-danger'>{$msg_failed}</h4>";
							}
							if(isset($msg)){
								echo $msg;
							}
									echo"
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<h3 class='log-text'>Register New User</h3>
								</div>
									
								<div class='panel-body'>
									<p class='text-warning'><b>NOTE: To Register a new Admin or User, You Need a Control Access. Please Contact Our User Support ...</b></p>
									<form class='' id='login' method='POST' action='staff_dashboard.php?register_new_user'>
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Control Access</span>
											<input type='password' name='control_access' placeholder='Type Admin Control Access to enable you create a new admin! ...' class='form-control' />
										</div>
										<br />
										<div>
											<label class='checkbox-inline'>
												<input type='radio' name='user_title' id='title1' value='mr' checked /> Mr
											</label>
											
											<label class='checkbox-inline'>
												<input type='radio' name='user_title' id='title2' value='mrs' /> Mrs
											</label>
											
											<label class='checkbox-inline'>
												<input type='radio' name='user_title' id='title3' value='miss' /> Miss
											</label>
										</div>
										<br />
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Fullname</span>
											<input type='text' placeholder='Type Your Fullname' class='form-control' name='user_fullname' />
										</div>
										<br />
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Home Address:</span>
											<textarea rows='3' name='user_address' required class='form-control' placeholder='...' aria-describedby='basic-addon2'></textarea>
										</div>
										<br/>
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Phone</span>
											<input type='text' placeholder='Type Phone Number' class='form-control' name='user_phone' />
										</div>
										<br />
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>State:</span>
											<select class='form-control' name='user_state'>
												<option selected >"; echo $select; echo "</option>";
												
												$state_array = array("Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT Abuja");
											
												foreach($state_array as $state){
													echo "<option>{$state}</option><br>";
												}
								
												echo"
											</select>
										</div>
										<br />
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>LGA:</span>
											<textarea rows='' name='user_lga' required class='form-control' placeholder='...' aria-describedby='basic-addon2'></textarea>
										</div>
										<br/>
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Nationality:</span>
											<select class='form-control' name='user_nationality'>
												<option selected >"; echo $select; echo "</option>
												<option>Nigerian</option>
												<option>Non-nigerian</option>
											</select>
										</div>
										<br />
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Email</span>
											<input type='text' placeholder='Type Email Address' class='form-control' name='user_email' />
										</div>
										<br />
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Password</span>
											<input type='password' placeholder='Type password' class='form-control' name='user_password1' />
										</div>
										<br />
										
										<div class='input-group'>
											<span class='input-group-addon' id='basic-addon2'>Confirm Password</span>
											<input type='password' placeholder='Retype Password' class='form-control' name='user_password2' />
										</div>
										<br />
										<p id='btnsubmit'><input type='submit' name='user_reg_btn' id='submit' value='Register' class='btn btn-large btn-success login_btn text-center' /></p>
									</form>
									<button type='button' class='btn btn-default' onclick='window.print()' value='print a div!'><span class='glyphicon glyphicon-print'></span> Print</button>
								</div>
								
							</div>
						</div>";
					}
					elseif(isset($_GET['manage_subjects'])){
						/////////////////// POST ACTION TO SPECIFY SUBJECTS OFFERED BY JUNIOR (JSS) CLASSES //////////////////
						if(isset($_POST['specify_junior_subjects_btn'])){
							$specify_junior_subjects = inject_checker($connection, $_POST['specify_junior_subjects']);
							if($specify_junior_subjects == $select){
								echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span>Please Select Subject to Specify</b></p>";
							}else{
								$query = " SELECT * FROM `jss` WHERE `jss_subjects` = '{$specify_junior_subjects}' ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									echo "<p class='text-danger'><b><b><span class='glyphicon glyphicon-remove'></span> Sorry {$specify_junior_subjects} has Already been specified for Junior Classes</b></p>";
								}else{
									$query = " INSERT INTO `jss`(`jss_subjects`, `upload_date`) VALUES('$specify_junior_subjects', '$date') ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> Specification of {$specify_junior_subjects} for Junior Classes Successful</b></p>";
									}else{
										echo "<p class='text-success'><b><span class='glyphicon glyphicon-remove'></span>Specification Failed</b></p>";
									}
								}
							}
						}
						
						/////////////////// POST ACTION TO SPECIFY SUBJECTS OFFERED BY SENIOR (SSS) CLASSES //////////////////
						if(isset($_POST['specify_senior_subjects_btn'])){
							$specify_senior_subjects = inject_checker($connection, $_POST['specify_senior_subjects']);
							if($specify_senior_subjects == $select){
								echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span>Please Select Subject to Specify</b></p>";
							}else{
								$query = " SELECT * FROM `sss` WHERE `sss_subjects` = '{$specify_senior_subjects}' ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span>Sorry {$specify_senior_subjects} has Already been specified for Senior Classes</b></p>";
								}else{
									$query = " INSERT INTO `sss`(`sss_subjects`, `upload_date`) VALUES('$specify_senior_subjects', '$date') ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> Specification of {$specify_senior_subjects} for Senior Classes Successful</b></p>";
									}else{
										echo "<p class='text-success'><b><span class='glyphicon glyphicon-remove'></span>Specification Failed</b></p>";
									}
								}
							}
						}
						
						//////////////POST ACTION TO DECLARE NUMBER OF SUBJECTS OFFERED BY JSS CLASS ////////////////
						if(isset($_POST['number_of_junior_subjects_btn'])){
							$number_of_junior_subjects = $_POST['number_of_junior_subjects'];
							
							if($number_of_junior_subjects == $select){
								echo "<p class='text-danger'>Please Select Number of Subjects<b></b></p>";
							}else{
								$query = " SELECT * FROM `jss_subject_number` ";
								$run_query = mysqli_query($connection, $query);
								
								if(mysqli_num_rows($run_query) == 1){
									$query = " UPDATE `jss_subject_number` SET `number_of_subject` = '{$number_of_junior_subjects}' ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b>Number of Subjects Offered by JSS class Updated Successfully</b></p>";
									}else{
										echo "<p class='text-danger'><b>Number of Subjects Update Failed</b></p>";
									}
								}else{
									$query = " INSERT INTO `jss_subject_number`(`number_of_subject`, `declared_date`) VALUES('$number_of_junior_subjects', '$date') ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b>Number of Subjects Offered by JSS class Declared Successfully</b></p>";
									}else{
										echo "<p class='text-danger'><b>Number of Subjects Declaration Failed</b></p>";
									}
								}
							}
						}
						
						
						//////////////POST ACTION TO DECLARE NUMBER OF SUBJECTS OFFERED BY SSS CLASS ////////////////
						if(isset($_POST['number_of_senior_subjects_btn'])){
							$number_of_senior_subjects = $_POST['number_of_senior_subjects'];
							
							if($number_of_senior_subjects == $select){
								echo "<p class='text-danger'><b>Please Select Number of Subjects</b></p>";
							}else{
								$query = " SELECT * FROM `sss_subject_number` ";
								$run_query = mysqli_query($connection, $query);
								
								if(mysqli_num_rows($run_query) == 1){
									$query = " UPDATE `sss_subject_number` SET `number_of_subject` = '{$number_of_senior_subjects}' ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b>Number of Subjects Offered by SSS class Updated Successfully</b></p>";
									}else{
										echo "<p class='text-danger'><b>Number of Subjects Update Failed</b></p>";
									}
								}else{
									$query = " INSERT INTO `sss_subject_number`(`number_of_subject`, `declared_date`) VALUES('$number_of_senior_subjects', '$date') ";
									$run_query = mysqli_query($connection, $query);
									
									if($run_query == true){
										echo "<p class='text-success'><b>Number of Subjects Offered by SSS class Declared Successfully</b></p>";
									}else{
										echo "<p class='text-danger'><b>Number of Subjects Declaration Failed</b></p>";
									}
								}
							}
						}
						echo"
							<div class='panel panel-primary'>
								<div class='panel-heading'>
									<h2>Manage Class Subjects</h2>
								</div>
								<div class='panel-body'>
									<form method='POST' action='staff_dashboard.php?manage_subjects'>
										<legend>Specify Subjects for Junior (JSS) Class</legend>
										<div class='row'>
											<div class='col-md-6'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>JSS Class Subjects:</span>
													<select class='form-control' name='specify_junior_subjects'>
														<option selected >{$select}</option>";
															$junior_subject_array = array("Mathematics", "English Language", "Agric Science", "Christian Religious Knowledge", "Home Economics", "Business Studies", "Social Studies", "Physical & Health Education", "Computer Science", "Basic Education", "Civic Education", "Introductory Technology", "French", "Literature in English");
																
															foreach($junior_subject_array as $junior_subject){
																echo "<option>{$junior_subject}</option><br>";
															}
															echo"
													</select>
												</div>
												<br />
											</div>
											
											<div class='col-md-6'>
												<input type='submit' name='specify_junior_subjects_btn' value='SPECIFY' class='btn btn-success' />
												<input type='submit' name='show_junior_subjects_btn' value='SHOW ALL SPECIFIED SUBJECT' class='btn btn-warning' />
											</div>
											
										</div>
									</form>";
									
									/////////////////////// POST ACTION TO SHOW ALL SPECIFIED SUBJECTS FOR JUNIOR STUDENTS //////////
									if(isset($_POST['show_junior_subjects_btn'])){
										$query = " SELECT * FROM `jss` ";
										$run_query = mysqli_query($connection, $query);
										
										if(mysqli_num_rows($run_query) > 0){
											$i = 0;
											echo"
												<div class='table-responsive'>
													<table class='table table-striped'>
														<thead>
															<tr>
																<th>S/N</th>
																<th>JUNIOR CLASSES SUBJECTS</th>
																<th>ACTION</th>
															</tr>
														</thead>
											";
											while($result = mysqli_fetch_assoc($run_query)){
												$i++;
												$subject_id_junior = $result['id'];
												$junior_subjects = $result['jss_subjects'];
												echo"
													
													<tbody>
														<tr>
															<td>{$i}</td>
															<td>{$junior_subjects}</td>
															<td>
																<form method='POST' action=''>
																	<input type='hidden' name='hide_subject_id' value='{$subject_id_junior}' />
																	<input type='submit' name='del_specify_btn' value='Delete' class='btn-xs btn-danger' />
																</form>
															</td>
														</tr>
													</tbody>
												";
											}
										}echo"
											</table>
										</div>";
									}
									
									if(isset($_POST['del_specify_btn'])){
										$hidden_subject_id = $_POST['hide_subject_id'];
										
										$query = " DELETE FROM `jss` WHERE `id` = '{$hidden_subject_id}' ";
										$run_query = mysqli_query($connection, $query);
										
										if($run_query == true){
											echo "<p class='text-success'><b>Subject Deleted Successfully</b></p>";
										}else{
											echo "<p><b>Error! Could Not Delete Record</b></p>";
										}
									}
									
									echo"
									<br />									
									<form method='POST' action='staff_dashboard.php?manage_subjects'>
										<legend>Specify Subjects for Senior (SSS) Class</legend>
										<div class='row'>
											<div class='col-md-6'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>SSS Class Subjects:</span>
													<select class='form-control' name='specify_senior_subjects'>
														<option selected >{$select}</option>";
															$senior_subject_array = array("Mathematics", "English Language", "Biology", "Agric Science", "Chemistry", "Physics", "Further Maths", "Economics", "Government", "Home Management", "Accounting", "Commerce", "Literature", "History", "Christian Religious Education", "Geography");
															foreach($senior_subject_array as $senior_subject){
																echo "<option>{$senior_subject}</option><br />";
															}
															echo"
													</select>
												</div>
												<br />
											</div>
											
											<div class='col-md-6'>
												<input type='submit' name='specify_senior_subjects_btn' value='SPECIFY' class='btn btn-success' />
												<input type='submit' name='show_senior_subjects_btn' value='SHOW ALL SPECIFIED SUBJECT' class='btn btn-warning' />
											</div>
											
										</div>
									</form>";
									
									/////////////////////// POST ACTION TO SHOW ALL SPECIFIED SUBJECTS FOR SENIOR STUDENTS //////////
									if(isset($_POST['show_senior_subjects_btn'])){
										$query = " SELECT * FROM `sss` ";
										$run_query = mysqli_query($connection, $query);
										
										if(mysqli_num_rows($run_query) > 0){
											$i = 0;
											echo"
												<div class='table-responsive'>
													<table class='table table-striped'>
														<thead>
															<tr>
																<th>S/N</th>
																<th>SENIOR CLASSES SUBJECTS</th>
																<th>ACTION</th>
															</tr>
														</thead>
											";
											while($result = mysqli_fetch_assoc($run_query)){
												$i++;
												$subject_id_senior = $result['id'];
												$senior_subjects = $result['sss_subjects'];
												echo"
													
													<tbody>
														<tr>
															<td>{$i}</td>
															<td>{$senior_subjects}</td>
															<td>
																<form method='POST' action=''>
																	<input type='hidden' name='hidden_subject_id' value='{$subject_id_senior}' />
																	<input type='submit' name='delete_specify_btn' value='Delete' class='btn-xs btn-danger' />
																</form>
															</td>
														</tr>
													</tbody>
														
												";
											}
										}echo"
											</table>
										</div>";
									}
									
									if(isset($_POST['delete_specify_btn'])){
										$hidden_subject_id = $_POST['hidden_subject_id'];
										
										$query = " DELETE FROM `sss` WHERE `id` = '{$hidden_subject_id}' ";
										$run_query = mysqli_query($connection, $query);
										
										if($run_query == true){
											echo "<p class='text-success'><b>Subject Deleted Successfully</b></p>";
										}else{
											echo "<p><b>Error! Could Not Delete Record</b></p>";
										}
									}
									
									echo"
									<br />
									<form method='POST' action='staff_dashboard.php?manage_subjects'>
										<legend>Specify Number of Subjects offered by Junior (JSS) Class</legend>
										<div class='row'>
											<div class='col-md-6'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>JSS No. of Sub:</span>
													<select class='form-control' name='number_of_junior_subjects'>
														<option selected >{$select}</option>";
															for($i=1; $i <= 20; $i++){
																echo "<option>{$i}</option>";
															}
															echo"
													</select>
												</div>
												<br />
												
												<div>
													<input type='submit' name='number_of_junior_subjects_btn' value='DECLARE' class='btn btn-success' />
												</div>
												<br />
											</div>
											
											
											
											<div class='col-md-6'>";
												///////////////// QUERY TO SHOW NUMBER OF SUBJECTS TO BE OFFERED BY JSS CLASSES ///////////
												$query = " SELECT * FROM `jss_subject_number` ";
												$run_query = mysqli_query($connection, $query);
												
												if(mysqli_num_rows($run_query) == 1){
													while($result = mysqli_fetch_assoc($run_query)){
														$subject_number_declared = $result['number_of_subject'];
													}
													echo"
														<div class='well'>
															<h4>Number Of Subjects offered by JSS CLASSES is <span class='text-danger'><u>{$subject_number_declared}</u></span></h4>
														</div>
													";
												}else{
													echo"
														<div class='well'>
															<h4>Number of Subjects Offered Not Declared !!!</h4>
														</div>
													";
												}
											echo"
											</div>
										</div>
									</form>
									<br />
									
									<form method='POST' action='staff_dashboard.php?manage_subjects'>
										<legend>Specify Number of Subjects offered by Senior (SSS) Class</legend>
										<div class='row'>
											<div class='col-md-6'>
												<div class='input-group'>
													<span class='input-group-addon' id='basic-addon2'>SSS No. of Sub:</span>
													<select class='form-control' name='number_of_senior_subjects'>
														<option selected >{$select}</option>";
															for($i=1; $i <= 20; $i++){
																echo "<option>{$i}</option>";
															}
															echo"
													</select>
												</div>
												<br />
												
												<div>
													<input type='submit' name='number_of_senior_subjects_btn' value='DECLARE' class='btn btn-success' />
												</div>
												<br />
											</div>
											<div class='col-md-6'>";
												///////////////// QUERY TO SHOW NUMBER OF SUBJECTS TO BE OFFERED BY SSS CLASSES ///////////
												$query = " SELECT * FROM `sss_subject_number` ";
												$run_query = mysqli_query($connection, $query);
												
												if(mysqli_num_rows($run_query) == 1){
													while($result = mysqli_fetch_assoc($run_query)){
														$subject_number_declared = $result['number_of_subject'];
													}
													echo"
														<div class='well'>
															<h4>Number Of Subjects offered by SSS CLASSES is <span class='text-danger'><u>{$subject_number_declared}</u></span></h4>
														</div>
													";
												}else{
													echo"
														<div class='well'>
															<h4>Number of Subjects Offered Not Declared !!!</h4>
														</div>
													";
												}
											echo"
											</div>
											
										</div>
									</form><br />
									
								</div>
							</div>
						";
					}
					elseif(isset($_GET['logout'])){
						unset($_SESSION['admin']);
						header("Location:login.php");
						exit;
					}
					else{
						echo"
							<div class='panel panel-primary'>
								<div class='panel-body'>
									<div class='col-md-2 thumbnail text-center'>
										<img src='img/avatar.jpg' class='img-responsive img-rounded' />
									</div>
									
									<div class='col-md-2'>
										<br />
										<h3>{$user_fullname}</h3>
										<form>
											<input type='submit' name='upload_image_btn' value='Upload Image' class='btn btn-primary btn-xs text-center' />
										</form>
									</div>
									
									<div class='col-md-4'>
										<br />
										<br />
										<p><span style='font-weight: bold;'>Gender: </span>{$gender}</p>
										<p><span style='font-weight: bold;'>State:</span> {$user_state}</p>
										<p><span style='font-weight: bold;'>LGA:</span> {$user_lga}</p>
										<p><span style='font-weight: bold;'>Nationality:</span> {$user_nationality}</p>
									</div>
									<div class='col-md-4'>
										<br />
										<br />
										<p><span style='font-weight: bold;'>Address:</span> {$user_address}</p>
										<p><span style='font-weight: bold;'>Phone:</span> {$user_phone}</p>
										<p><span style='font-weight: bold;'>Email:</span> {$user_email}</p>

										<button id='male_order' class='btn btn-primary btn-xs text-center' data-toggle='modal' data-target='#demanppopUpWindow'>Edit Profile</button>
									</div>
									<div class='clearfix'></div>
								</div>
								<div class='panel-body'>
									<div class='thumbnail jumbotron'>
										<h2>Howdy! {$user_fullname}</h2>
										<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.
										This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.
										This is a simple hero unit, a simple jumbotron-s tyle component for calling extra attention to featured content or information.</p>
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

        <!------------- MODAL SECTION BEGINS HERE (ITEM ORDER MODAL) ----------->

        <!-- ADMIN EDIT MODAL BEGINS HERE -->
        <div class='modal fade' id='demanppopUpWindow'>
            <div class='modal-dialog'>
                <div class='modal-content'>

                    <!-- header -->
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h3 class='modal-title'>Edit Profile</h3>
                    </div>

                    <!-- body (form) -->
                    <div class='modal-body'>
                        <form method='POST' action='staff_dashboard.php' role='form'>
                            <div>
                                <label class='checkbox-inline'>
                                    <input type='radio' name='user_title' id='title1' value='mr' checked /> Mr
                                </label>

                                <label class='checkbox-inline'>
                                    <input type='radio' name='user_title' id='title2' value='mrs' /> Mrs
                                </label>

                                <label class='checkbox-inline'>
                                    <input type='radio' name='user_title' id='title3' value='miss' /> Miss
                                </label>
                            </div>
                            <br />
                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Fullname</span>
                                <input type='text' value='<?php echo $user_fullname; ?>' class='form-control' name='user_fullname' />
                            </div>
                            <br />

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Home Address:</span>
                                <textarea rows='3' name='user_address' required class='form-control' placeholder='' aria-describedby='basic-addon2'><?php echo $user_address; ?></textarea>
                            </div>
                            <br/>

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Phone</span>
                                <input type='text' value='<?php echo $user_phone; ?>' class='form-control' name='user_phone' />
                            </div>
                            <br />

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>State:</span>
                                <select class='form-control' name='user_state'>
                                    <option selected ><?php echo $user_state; ?></option>
                                    <?php
                                        $state_array = array("Abia", "Adamawa", "Akwa ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara", "FCT Abuja");

                                        foreach($state_array as $state){
                                            echo "<option>{$state}</option><br>";
                                        }
                                    ?>

                                </select>
                            </div>
                            <br />

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>LGA:</span>
                                <textarea rows='' name='user_lga' required class='form-control' placeholder='' aria-describedby='basic-addon2'><?php echo $user_lga; ?></textarea>
                            </div>
                            <br/>

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Nationality:</span>
                                <select class='form-control' name='user_nationality'>
                                    <option selected ><?php echo $user_nationality; ?> </option>
                                    <option>Nigerian</option>
                                    <option>Non-nigerian</option>
                                </select>
                            </div>
                            <br />

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Email</span>
                                <input type='text' value='<?php echo $user_email; ?>' class='form-control' name='user_email' />
                            </div>
                            <br />

                            <!-- <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Password</span>
                                <input type='password' placeholder='Type password' class='form-control' name='user_password1' />
                            </div>
                            <br />

                            <div class='input-group'>
                                <span class='input-group-addon' id='basic-addon2'>Confirm Password</span>
                                <input type='password' placeholder='Retype Password' class='form-control' name='user_password2' />
                            </div>
                            <br /> -->

                            <input type='submit' name='profile_update_btn' value='Update Profile' class='btn btn-primary btn-block' />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF ADMIN MODAL -->

        <?php
            /*$query = " SELECT * FROM `students` WHERE `id` = '{$all_student_hidden_id}' ";
            $run_query = mysqli_query($connection, $query);

            if(mysqli_num_rows($run_query) == 1){
                while($result = mysqli_fetch_assoc($run_query)){
                    $gender = $result['gender'];
                }
            }*/
        ?>

        <!-- STUDENT EDIT MODAL BEGINS HERE -->


	</body>
</html>