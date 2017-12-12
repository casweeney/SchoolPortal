<?php
	require_once("includes/staff_session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	//require_once("staff_dashboard_processor.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$date = date('d/M/Y');
	$select = "--select--";
	$oge = time();
	$time = date('H:i:s', $oge);
	$error = array();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SPK - Edit Student Info</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<meta name='description" content="student registration' />
		<link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
		<link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
		<link type='text/css' rel='stylesheet' href='css/blink.css' />
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
	</head>
	<body>
		<div class='container'>
			<?php
				echo"
					<div class='panel panel-primary'>
						<div class='panel-heading'>
							<h3 class='text-center'>Edit Student Info</h3>
						</div>
						<div class='panel-body'>
							<form method='POST' enctype='multipart/form-data' action='staff_dashboard.php?register_new_student'>
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
									<input type='submit' name='student_reg_btn' value='UPDATE STUDENT INFO' class='btn btn-primary' />
								</div>
							</form>
							<button type='button' class='btn btn-default' onclick='window.print()' value='print a div!'><span class='glyphicon glyphicon-print'></span> Print</button>
						</div>
					</div>
				";
			?>
		</div>
	</body>
</html>