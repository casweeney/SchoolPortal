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
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
	$time = date('h:m:s');
?>
<?php
	$query = " SELECT * FROM `results1` WHERE `id` = '{$_SESSION['student']}' ";
	$run_query = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$result_name = $result['name'];
			$result_reg_number = $result['reg_number'];
			$result_class = $result['class'];
			$result_term = $result['term'];
			$result_session = $result['session'];
		}
	}
?>
<?php
	$query = " SELECT * FROM `students` WHERE `reg_number` = '{$result_reg_number}' ";
	$run_query = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$result_passport = $result['passport'];
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
<?php
	$query = " SELECT * FROM `dates` ";
	$run_query = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
			$term_ended = $result['end_of_term'];
			$next_term_starts = $result['next_term_begins'];
		}
	}
?>
<!DOCTYPE>
<html>
	<head>
		<title>SPK Result - <?php echo $result_name; ?></title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<meta name='description" content="student registration' />
		<link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
		<link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
		<link type='text/css' rel='stylesheet' href='css/blink.css' />
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
	</head>
	<body>
		<div class='container' id='result_page'>
			<br />
			<div class='row'>
				<div class='col-md-2 col-sm-2 col-xs-2 thumbnail text-center'>
					<img src='<?php echo $school_logo; ?>' class='img-responsive' />
				</div>
				
				<div class='col-md-8 col-sm-8 col-xs-8'>
					<h4 class='text-center'><b><?php echo $school_name; ?></b></h4>
					<p class='text-center'><b><?php echo $school_address; ?></b></p>
					<h5 class='text-center'><b><?php echo $result_term; ?> Report Sheet for <?php echo $result_session; ?> Session</b></h5>
					<br />
					<br />
					<div class='row'>
						<div class='col-md-6 col-sm-6 col-xs-6'>
							<h5><b>NAME:</b> <?php echo strtoupper($result_name); ?></h5>
							<h5><b>REG NO:</b> <?php echo $result_reg_number; ?></h5>
							<h5><b>CLASS:</b> <?php echo $result_class; ?></h5>
						</div>
						
						<div class='col-md-6 col-sm-6 col-xs-6'>
							<h5><b>TERM ENDED:</b> <?php echo $term_ended; ?></h5>
							<h5><b>NEXT TERM RESUMES:</b> <?php echo $next_term_starts; ?></h5>
						</div>
					</div>
				</div>
				
				<div class='col-md-2 col-sm-2 col-xs-2 thumbnail text-center'>
					<img src='<?php echo $result_passport; ?>' class='img-responsive' />
				</div>
			</div>
			<br />
			<br />
			
			
			
			<?php
				$query = " SELECT * FROM `results1` WHERE `reg_number` = '{$result_reg_number}' AND `class` = '{$result_class}' AND `term` ='{$result_term}' AND `session` = '{$result_session}' ";
				$run_query = mysqli_query($connection, $query);
				
				if(mysqli_num_rows($run_query) > 0){
					echo"
						<div class=''>
							<table class='table table-bordered text-info' id='result'>
								<thead>
									<tr class='info'>
										<th>SUBJECTS</th>
										<th>CA (30)</th>
										<th>PROJECT (10)</th>
										<th>EXAM (60)</th>
										<th>TOTAL (100)</th>
										<th>GRADE</th>
										<th>POSITION</th>
										<th>REMARKS</th>
									</tr>
								</thead>
					";
					while($result = mysqli_fetch_assoc($run_query)){
						$result_regno = $result['reg_number'];
						$result_subject = $result['subjects'];
						$result_ca = $result['ca'];
						$result_project = $result['project'];
						$result_exam = $result['exam'];
						$result_score = $result['subject_total'];
						$result_rank = subject_position($result['subject_rank']);
						$a = 70;
						$b = 60;
						$c = 50;
						$d = 45;
						$e = 40;
						$f = 0;
						if($result_score >= $a){
							$result_grade = "A";
							$remark = "Excellent";
						}
						elseif($result_score >= $b){
							$result_grade = "B";
							$remark = "Very Good";
						}
						elseif($result_score >= $c){
							$result_grade = "C";
							$remark = "Credit";
						}
						elseif($result_score >= $d){
							$remark = "Pass";
						}
						elseif($result_score >= $e){
							$result_grade = "E";
							$remark = "Fair";
						}
						else{
							$result_grade = "F";
							$remark = "Fail";
						}
						
						echo"
							<tr>
								<td>{$result_subject}</td>
								<td>{$result_ca}</td>
								<td>{$result_project}</td>
								<td>{$result_exam}</td>
								<td>{$result_score}</td>
								<td>{$result_grade}</td>
								<td>{$result_rank}</td>
								<td>{$remark}</td>
							</tr>
						";
					}
				}echo"
						</table>
					</div>
				";
			?>
			
			<?php
				$query = " SELECT * FROM `positions` WHERE `class` = '{$result_class}' AND `term` ='{$result_term}' AND `session` = '{$result_session}' ";
				$run_query = mysqli_query($connection, $query);
				$number_in_class = mysqli_num_rows($run_query);
				
				$query = " SELECT * FROM `positions` WHERE `reg_number` = '{$result_reg_number}' AND `class` = '{$result_class}' AND `term` ='{$result_term}' AND `session` = '{$result_session}' ";
				$run_query = mysqli_query($connection, $query);
				
				if(mysqli_num_rows($run_query) == 1){
					while($result = mysqli_fetch_assoc($run_query)){
						$student_total = $result['students_sub_total'];
						$student_average = $result['students_sub_average'];
						$position_in_class = $result['class_position'];
					}
				}
				
				if($student_average >= 60){
					$teacher_remark = "Excellent Result, Keep it Up.";
					$principal_remark = "Satisfactory.";
				}
				elseif($student_average >= 50){
					$teacher_remark = "Excellent Result, But you can do better.";
					$principal_remark = "Satisfactory.";
				}
				elseif($student_average >= 40){
					$teacher_remark = "Fair Result, Please Work Harder.";
					$principal_remark = "Satisfactory, Please add more effort.";
				}
				else{
					$teacher_remark = "Poor Result, Work Harder.";
					$principal_remark = "Poor Result, Put More Effort.";
				}
			?>
			<div class='container'>
				<div class='row'>
					<div class='col-md-2 col-xs-2'>
						<h4>Scale:</h4>
						<p class='grade'>A = 70 and Above</p>
						<p class='grade'>B = 60 - 69</p>
						<p class='grade'>C = 50 - 59</p>
						<p class='grade'>D = 45 - 49</p>
						<p class='grade'>E = 40 - 44</p>
						<p class='grade'>F = 39 below</p>
					</div>
					
					<div class='col-md-2 col-xs-2'>
						<h4>Grade Equivalent:</h4>
						<p class='grade'>A = Excellent</p>
						<p class='grade'>B = Very Good</p>
						<p class='grade'>C = Good</p>
						<p class='grade'>D = Pass</p>
						<p class='grade'>E = Fair</p>
						<p class='grade'>F = Fail</p>
					</div>
					
					<?php
						$attentive = rand(3, 5);
						$a_to_work = rand(3, 5);
						$health = rand(3, 5);
						$politeness = rand(3, 5);
						$games = rand(3, 5);
						$h_writing = rand(2, 5);
						$music_skills = rand(2, 5);
						$sports = rand(3, 5);
					?>

					<div class='col-md-2 col-xs-2'>
						<h4>Student Score:</h4>
						<p class='grade'>Total: <?php echo $student_total; ?></p>
						<p class='grade'>Average: <?php echo $student_average; ?></p>
					</div>
					
					<div class='col-md-2 col-xs-2'>
						<h4>Effective Domain:</h4>
						<p class='grade'>Attentiveness&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $attentive; ?>/5</p>
						<p class='grade'>Attitude to work&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $a_to_work; ?>/5</p>
						<p class='grade'>Health&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $health; ?>/5</p>
						<p class='grade'>Politeness&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $politeness; ?>/5</p>
					</div>
					
					<div class='col-md-3 col-xs-3'>
						<h4>Psychomotor Domain:</h4>
						<p class='grade'>Games&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $games; ?>/5</p>
						<p class='grade'>Hand Writing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $h_writing; ?>/5</p>
						<p class='grade'>Musical Skills&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $music_skills; ?>/5</p>
						<p class='grade'>Sports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $sports; ?>/5</p>
					</div>
					
				</div>
				<br />
				
				<div class='row'>
					<div class='col-md-5 col-xs-5'>
						<div class='panel panel-default'>
							<div class='panel-body'>
								<p class='grade'><b>Position in Class:</b> <?php echo $position_in_class; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Number in Class:</b> <?php echo $number_in_class; ?></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class='row'>
					<div class='col-md-11'>
						<table class='table table-bordered'>
							<thead>
								<tr>
									<th>Remarks/Comments</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Teacher's Remark</td>
									<td><?php echo $teacher_remark; ?></td>
								</tr>
								
								<tr>
									<td>Principal's Remark</td>
									<td><?php echo $principal_remark ?></td>
								</tr>
								
								<tr>
									<td>3rd Term Promotion</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<?php
					$query = " SELECT * FROM `administratives` ";
					$run_query = mysqli_query($connection, $query);
					
					if(mysqli_num_rows($run_query) == 1){
						while($result = mysqli_fetch_assoc($run_query)){
							$signature = $result['school_stamp'];
						}
					}
				?>
				
				<div class='row'>
					<div class='col-md-4 col-xs-4'>
						<h5><?php echo $date; ?></h5>
						<h4>Date Issued</h4>
					</div>
					
					<div class='col-md-4 col-xs-4'>
						<img src='<?php echo $signature; ?>' class='img-responsive' id='signature' />
						<h4>Signature</h4>
					</div>
				</div>
			</div>
			<br />
			<button type='button' class='btn btn-default noprint' onclick='window.print()' value='print a div!'><span class='glyphicon glyphicon-print'></span> Print </button>
			<br />
			<br />
		</div>
	</body>
</htm>
<?php
	unset($_SESSION['student']);
	exit;
?>