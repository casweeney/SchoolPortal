<?php
	require_once("includes/staff_session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
	$time = date('h:m:s');
?>
<?php
	/////////////// POST ACTION TO REGISTER STUDENTS WHEN THE REGISTER BUTTON IS CLICKED //////////////////
	if(isset($_POST['student_reg_btn'])){
		$reg_student_gender = inject_checker($connection, $_POST['reg_student_gender']);
		$reg_student_firstname = inject_checker($connection, $_POST['reg_student_firstname']);
		$reg_student_lastname = inject_checker($connection, $_POST['reg_student_lastname']);
		$reg_student_othername = inject_checker($connection, $_POST['reg_student_othername']);
		$reg_student_dob = inject_checker($connection, $_POST['reg_student_dob']);
		$reg_student_mob = inject_checker($connection, $_POST['reg_student_mob']);
		$reg_student_yob = inject_checker($connection, $_POST['reg_student_yob']);
		$reg_student_phone = inject_checker($connection, $_POST['reg_student_phone']);
		$reg_student_address = inject_checker($connection, $_POST['reg_student_address']);
		$reg_student_state = inject_checker($connection, $_POST['reg_student_state']);
		$reg_student_nationality = inject_checker($connection, $_POST['reg_student_nationality']);
		$reg_sponsor_name = inject_checker($connection, $_POST['reg_sponsor_name']);
		$reg_sponsor_phone = inject_checker($connection, $_POST['reg_sponsor_phone']);
		$reg_sponsor_relationship = inject_checker($connection, $_POST['reg_sponsor_relationship']);
		$reg_student_tc = inject_checker($connection, $_POST['reg_student_tc']);
		//$file = $_POST['file'];
		
		$query = " SELECT * FROM `current_season` ";
		$run_query = mysqli_query($connection, $query);
		
		if(mysqli_num_rows($run_query) == 1){
			while($result = mysqli_fetch_assoc($run_query)){
				$current_session = $result['current_session'];
			}
		}
		
		$year_of_reg = substr($current_session, 0, 4);
		$school_name = "SCHOOLNAME";
		$gen_password = "spk";
					////////////////// ERROR-CHECKING IF SPECIFIED FIELD IS EMPTY ////////////////////
					if($reg_student_gender === $select){
						$error[] = "Error: Gender Field Required <br /><br />";
					}
					if(empty($reg_student_firstname)){
						$error[] = "Error: Firstname Field Required <br /><br />";
					}
					if(empty($reg_student_lastname)){
						$error[] = "Error: Lastname Field Required <br /><br />";
					}
					if($reg_student_dob === $select){
						$error[] = "Error: Date of Birth Field Required <br /><br />";
					}
					if($reg_student_dob === $select){
						$error[] = "Error: Day of Birth Required <br /><br />";
					}
					if($reg_student_mob === $select){
						$error[] = "Error: Month of Birth Required <br /><br />";
					}
					if($reg_student_yob === $select){
						$error[] = "Error: Year of Birth Required <br /><br />";
					}
					if(empty($reg_student_address)){
						$error[] = "Error: Address Field Required <br /><br />";
					}
					if($reg_student_state === $select){
						$error[] = "Error: State of origin Required <br /><br />";
					}
					if($reg_student_nationality === $select){
						$error[] = "Error: Your Nationality is Required <br /><br />";
					}
					if(empty($reg_sponsor_name)){
						$error[] = "Error: Sponsor Name Required <br /><br />";
					}
					if(empty($reg_sponsor_phone)){
						$error[] = "Error: Sponsor Phone Required <br /><br />";
					}
					if($reg_sponsor_relationship === $select){
						$error[] = "Error: Sponsor Relationship is Required<br />";
					}
					if($reg_student_tc === $select){
						$error[] = "Error: Target Class is Required<br />";
					}
					if(empty($error)){
						////////////// ATION TO UPLOAD IMAGE INTO DB FROM STUDENT REGISTRATION PAGE ///////////
						$name = $_FILES['file']['name'];
						$tmp_name = $_FILES['file']['tmp_name'];
						
						if(isset($name)){
							if(!empty($name)){
							$location = 'image/';
								if(move_uploaded_file($tmp_name, $location.$name)){
									$image_location = $location.$name;
								}else{
									$image_location = "image/none.jpg";
								}

							}
						}
						
						///////////////////// DEFINING CLASS CODE TO GET A UNIQUE REG NUMBER /////////////////
						switch ($reg_student_tc){
							case $reg_student_tc === "JSS1": $class_code = 4 .$reg_student_tc;
							break;
							case $reg_student_tc === "JSS2": $class_code = 5 .$reg_student_tc;
							break;
							case $reg_student_tc === "JSS3": $class_code = 6 .$reg_student_tc;
							break;
							case $reg_student_tc === "SSS1": $class_code = 7 .$reg_student_tc;
							break;
							case $reg_student_tc === "SSS2": $class_code = 8 .$reg_student_tc;
							break;
							case $reg_student_tc === "SSS3": $class_code = 9 .$reg_student_tc;
							break;
							default: $msg = "Please Select Maths Operator";
						}
						
						//////////////// CHECKING NUMBER OF STUDENT ALREADY EXISTING IN DATABASE WITH SPECIFIED CLASS AND ADDING 1 TO THE EXISTING NUMBER OF STUDENT TO AUTOMATICALLY INCREMENT THE REG NUMBER BY 1 /////////////////////////////////
						$query = " SELECT * FROM `students` WHERE `class` = '{$reg_student_tc}' ";
						$run_query = mysqli_query($connection, $query);
						$number_of_reg_student = mysqli_num_rows($run_query);
						$increase_student = $number_of_reg_student + 1;
						$reg_number = $year_of_reg .$class_code .$school_name .$increase_student;
						
						$query = " SELECT * FROM `students` WHERE `reg_number` = '{$reg_number}' ";
						$run_query = mysqli_query($connection, $query);
						if(mysqli_num_rows($run_query) == 1){
							$error[] = "Error: Registeration Number Already Exist";
						}else{
							$query = " INSERT INTO `students`(`gender`, `firstname`, `lastname`, `othername`, `dob`, `mob`, `yob`, `contact_phone`, `address`, `state`, `nationality`, `sponsor_name`, `sponsor_phone`, `relationship`, `class`, `reg_number`, `gen_password`, `passport`, `date_of_reg`)
									VALUES('$reg_student_gender', '$reg_student_firstname', '$reg_student_lastname', '$reg_student_othername', '$reg_student_dob', '$reg_student_mob', '$reg_student_yob', '$reg_student_phone', '$reg_student_address', '$reg_student_state', '$reg_student_nationality', '$reg_sponsor_name', '$reg_sponsor_phone', '$reg_sponsor_relationship', '$reg_student_tc', '$reg_number', '$gen_password', '$image_location', '$date') ";
									
							$run_query = mysqli_query($connection, $query);
							if($run_query == true){
								
								header("Location:successful_reg.php");
								
							}else{
								$msg = "... Error: Registration not successfull ...";
							}
						}
						
					}
					
	}
?>
<?php
	///////////////////////// POST ACTION TO REGISTER NEW USER WHEN REGISTER BUTTON IS CLICKED /////////////////////////////////
	if(isset($_POST['user_reg_btn'])){
		$control_access = inject_checker($connection, strtolower($_POST['control_access']));
		$user_title = inject_checker($connection, $_POST['user_title']);
		$user_fullname = inject_checker($connection, $_POST['user_fullname']);
		$user_address = inject_checker($connection, $_POST['user_address']);
		$user_phone = inject_checker($connection, $_POST['user_phone']);
		$user_state = inject_checker($connection, $_POST['user_state']);
		$user_lga = inject_checker($connection, $_POST['user_lga']);
		$user_nationality = inject_checker($connection, $_POST['user_nationality']);
		$user_email = inject_checker($connection, $_POST['user_email']);
		$user_password = inject_checker($connection, $_POST['user_password1']);
		$confirm_password = inject_checker($connection, $_POST['user_password2']);
		
		////////////////// ERROR-CHECKING IF SPECIFIED FIELD IS EMPTY ////////////////////
		if(empty($control_access)){
			$error[] = "Error: You Need Control Access to Add Another User";
		}
		if(empty($user_title)){
			$error[] = "Error: Title required";
		}
		if(empty($user_fullname)){
			$error[] = "Error: Fullname required";
		}
		if(empty($user_phone)){
			$error[] = "Error: Phone required";
		}
		if(!empty($user_email)){
			if(single_email_validator($user_email)){
				$query = " SELECT * FROM `users` WHERE `email` = '{$user_email}' ";
				$run_query = mysqli_query($connection, $query);
				if(mysqli_num_rows($run_query) > 0){
					$error[] = "Error: Email address already exist !";
				}
			}else{
				$error[] = "Error: Invalid Email address entered !";
			}
		}else{
			$error[] = "Error: Email Address Required";
		}
		if(empty($user_password)){
			$error[] = "Error: Password required";
		}
		if(empty($error)){
			if($user_password !== $confirm_password){
				$error[] = "Error: Password do not match !";
			}
		}
		if(empty($error)){
			$query = " SELECT * FROM `access` WHERE `control_access` ='{$control_access}' ";
			$run_query = mysqli_query($connection, $query);
			
			if(mysqli_num_rows($run_query) == 1){
				$query = "INSERT INTO `users`(`title`, `fullname`, `address`, `phone`, `state`, `lga`, `nationality`, `email`, `password`, `date_of_reg`)
						VALUES('$user_title', '$user_fullname','$user_address', '$user_phone', '$user_state', '$user_lga', '$user_nationality', '$user_email', '$user_password', '$date')";
						
				$run_query = mysqli_query($connection, $query);
				if($run_query == true){
					header("Location:successful_reg.php");
				}else{
					$msg = "<p class='text-danger'><b>... Error: Registration not successfull ...</b></p>";
				}
			}else{
				$msg = "<p class='text-danger'><b>Incorrect Control Access</b></p>";
			}
		}
	}
?>
<?php
	//////////////// POST ACTION TO PRINT STUDENTS SLIP IF THE PRINT SLIP BUTTON IS CLICKED ////////////////////
	if(isset($_POST['admin_print_slip_btn'])){
		$slip_reg_number = $_POST['slip_reg_number'];
		
		if(empty($slip_reg_number)){
			$error[] = "Error: Student Reg Number Required";
		}
		if(empty($error)){
			$query = " SELECT * FROM `students` WHERE `reg_number` = '{$slip_reg_number}' ";
			$run_query = mysqli_query($connection, $query);
			
			if(mysqli_num_rows($run_query) == 1){
				//session_start();
				
				while($result = mysqli_fetch_assoc($run_query)){
					$student_id = $result['id'];
					$_SESSION['admin'] = $student_id;
					
					header("Location:slip.php");
				}
			}
		}
	}
?>