<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
?>
<?php
	if(isset($_POST['result_upload_btn'])){
		$result_upload_reg_number = $_POST['result_upload_reg_number'];
		$result_upload_class = $_POST['result_upload_class'];
		$result_upload_term = $_POST['result_upload_term'];
		$sub1 = $_POST['sub1'];
		$sub1_exam_score = $_POST['sub1_exam_score'];
		$sub1_test1 = $_POST['sub1_test1'];
		$sub1_test2 = $_POST['sub1_test2'];
		$sub1_test3 = $_POST['sub1_test3'];
		$sub1_project = $_POST['sub1_project'];
		$sub1_total = $_POST['sub1_total'];
		$sub2 = $_POST['sub2'];
		$sub2_exam_score = $_POST['sub2_exam_score'];
		$sub2_test1 = $_POST['sub2_test1'];
		$sub2_test2 = $_POST['sub2_test2'];
		$sub2_test3 = $_POST['sub2_test3'];
		$sub2_project = $_POST['sub2_project'];
		$sub2_total = $_POST['sub2_total'];
		$sub3 = $_POST['sub3'];
		$sub3_exam_score = $_POST['sub3_exam_score'];
		$sub3_test1 = $_POST['sub3_test1'];
		$sub3_test2 = $_POST['sub3_test2'];
		$sub3_test3 = $_POST['sub3_test3'];
		$sub3_project = $_POST['sub3_project'];
		$sub3_total = $_POST['sub3_total'];
		$sub4 = $_POST['sub4'];
		$sub4_exam_score = $_POST['sub4_exam_score'];
		$sub4_test1 = $_POST['sub4_test1'];
		$sub4_test2 = $_POST['sub4_test2'];
		$sub4_test3 = $_POST['sub4_test3'];
		$sub4_project = $_POST['sub4_project'];
		$sub4_total = $_POST['sub4_total'];
		$sub5 = $_POST['sub5'];
		$sub5_exam_score = $_POST['sub5_exam_score'];
		$sub5_test1 = $_POST['sub5_test1'];
		$sub5_test2 = $_POST['sub5_test2'];
		$sub5_test3 = $_POST['sub5_test3'];
		$sub5_project = $_POST['sub5_project'];
		$sub5_total = $_POST['sub5_total'];
		$sub6 = $_POST['sub6'];
		$sub6_exam_score = $_POST['sub6_exam_score'];
		$sub6_test1 = $_POST['sub6_test1'];
		$sub6_test2 = $_POST['sub6_test2'];
		$sub6_test3 = $_POST['sub6_test3'];
		$sub6_project = $_POST['sub6_project'];
		$sub6_total = $_POST['sub6_total'];
		
		$subjects_grand_total = $sub1_total + $sub2_total + $sub3_total + $sub4_total + $sub5_total + $sub6_total;
		
		if(empty($result_upload_reg_number)){
			$error[] = "Error: Student Registration Number Required";
		}
		if($result_upload_class === $select){
			$error[] = "Error: Student Class Required";
		}
		if($result_upload_term === $select){
			$error[] = "Error: Term of result required";
		}
		if(empty($error)){
			$query = " SELECT * FROM `results` WHERE `reg_number` = '{$result_upload_reg_number}' AND `class` = '{$result_upload_class}' AND `term` = '{$result_upload_term}' ";
			$run_query = mysqli_query($connection, $query);
			if(mysqli_num_rows($run_query) > 0){
				$error[] = "Error: This Result Already Exist";
			}else{
				$query = " INSERT INTO `results` SET
								`reg_number` = '$result_upload_reg_number',
								`class` = '$result_upload_class',
								`term` = '$result_upload_term',
								`sub1` = '$sub1',
								`sub1_exam_score` = '$sub1_exam_score',
								`sub1_test1` = '$sub1_test1',
								`sub1_test2` = '$sub1_test2',
								`sub1_test3` = '$sub1_test3',
								`sub1_project` = '$sub1_project',
								`sub1_total` = '$sub1_total',
								`sub2` = '$sub2',
								`sub2_exam_score` = '$sub2_exam_score',
								`sub2_test1` = '$sub2_test1',
								`sub2_test2` = '$sub2_test2',
								`sub2_test3` = '$sub2_test3',
								`sub2_project` = '$sub2_project',
								`sub2_total` = '$sub2_total',
								`sub3` = '$sub3',
								`sub3_exam_score` = '$sub3_exam_score',
								`sub3_test1` = '$sub3_test1',
								`sub3_test2` = '$sub3_test2',
								`sub3_test3` = '$sub3_test3',
								`sub3_project` = '$sub3_project',
								`sub3_total` = '$sub3_total',
								`sub4` = '$sub4',
								`sub4_exam_score` = '$sub4_exam_score',
								`sub4_test1` = '$sub4_test1',
								`sub4_test2` = '$sub4_test2',
								`sub4_test3` = '$sub4_test3',
								`sub4_project` = '$sub4_project',
								`sub4_total` = '$sub4_total',
								`sub5` = '$sub5',
								`sub5_exam_score` = '$sub5_exam_score',
								`sub5_test1` = '$sub5_test1',
								`sub5_test2` = '$sub5_test2',
								`sub5_test3` = '$sub5_test3',
								`sub5_project` = '$sub5_project',
								`sub5_total` = '$sub5_total',
								`sub6` = '$sub6',
								`sub6_exam_score` = '$sub6_exam_score',
								`sub6_test1` = '$sub6_test1',
								`sub6_test2` = '$sub6_test2',
								`sub6_test3` = '$sub6_test3',
								`sub6_project` = '$sub6_project',
								`sub6_total` = '$sub6_total',
								`subject_grand_total` = '$subjects_grand_total',
								`date_of_upload` = '$date' 
							";
				
				$run_query = mysqli_query($connection, $query);
				
				if($run_query == true){
					$error[] = "Result Uploaded Successfully";
				}else{
					$error[] = "Error: Result Upload Failed";
				}
			}
		}
	}
?>
<div class='panel panel-primary'>
	<div class='panel-heading'>
		<h2>Upload Student Result</h2>
		<?php
			foreach($error as $msg){
				echo "<h4>{$msg}</h4><br />";
			}
		?>
	</div>
	<div class='panel-body'>
		<form method='POST' action=''>
			<div class='row'>
				<div class='col-md-5'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Reg Number:</span>
						<input type='text' name='result_upload_reg_number' placeholder='Enter Student Registration Number' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Student Class:</span>
						<select class='form-control' name='result_upload_class'>
							<option selected ><?php echo $select; ?></option>
							<?php
								$class_array = array("JSS1", "JSS2", "JSS3", "SSS1", "SSS2", "SSS3");
								
								foreach($class_array as $class){
									echo "<option>{$class}</option><br>";
								}
							?>
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Result Term:</span>
						<select class='form-control' name='result_upload_term'>
							<option selected ><?php echo $select; ?></option>
							<?php
								$term_array = array("First Term", "Second Term", "Third Term");
								
								foreach($term_array as $term){
									echo "<option>{$term}</option><br>";
								}
							?>
						</select>
					</div>
				</div>
			</div>
			<br />
			
			<div class='row'>
				<div class='col-md-2'>
					&nbsp;
				</div>
				<div class='col-md-2'>
					<h4>Subjects</h4>
				</div>
				<div class='col-md-1'>
					<h4>Exam Score</h4>
				</div>
				<div class='col-md-1'>
					<h4>Test 1</h4>
				</div>
				<div class='col-md-1'>
					<h4>Test 2</h4>
				</div>
				<div class='col-md-1'>
					<h4>Test 3</h4>
				</div>
				<div class='col-md-1'>
					<h4>Project</h4>
				</div>
				<div class='col-md-1'>
					<h4>Total</h4>
				</div>
			</div>
			
			
			<!-- SUBJECT 1 FORM BEGINS HERE -->
			<div class='row'>
				<div class='col-md-2'>
					<legend>Subject 1</legend>
				</div>
				
				<div class='col-md-2'>
						<div class='input-group'>
							<select class='form-control' name='sub1'>
								<option selected ><?php echo $select; ?></option>
								<?php
									$subject_array = array("Mathematics", "English Language", "Biology");
									
									foreach($subject_array as $subject){
										echo "<option>{$subject}</option><br>";
									}
								?>
							</select>
						</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub1_exam_score' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub1_test1' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub1_test2' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub1_test3' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub1_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub1_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			
			<!-- SUBJECT 2 FORM BEGINS HERE -->
			<div class='row'>
				<div class='col-md-2'>
					<legend>Subject 2</legend>
				</div>
				
				<div class='col-md-2'>
						<div class='input-group'>
							<select class='form-control' name='sub2'>
								<option selected ><?php echo $select; ?></option>
								<?php
									$subject_array = array("Mathematics", "English Language", "Biology");
									
									foreach($subject_array as $subject){
										echo "<option>{$subject}</option><br>";
									}
								?>
							</select>
						</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub2_exam_score' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub2_test1' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub2_test2' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub2_test3' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub2_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub2_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			
			<!-- SUBJECT 3 FORMS BEGINS HERE -->
			<div class='row'>
				<div class='col-md-2'>
					<legend>Subject 3</legend>
				</div>
				
				<div class='col-md-2'>
						<div class='input-group'>
							<select class='form-control' name='sub3'>
								<option selected ><?php echo $select; ?></option>
								<?php
									$subject_array = array("Mathematics", "English Language", "Biology");
									
									foreach($subject_array as $subject){
										echo "<option>{$subject}</option><br>";
									}
								?>
							</select>
						</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub3_exam_score' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub3_test1' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub3_test2' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub3_test3' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub3_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub3_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			
			<!-- SUBJECT 4 FORMS BEGINS HERE -->
			<div class='row'>
				<div class='col-md-2'>
					<legend>Subject 4</legend>
				</div>
				
				<div class='col-md-2'>
						<div class='input-group'>
							<select class='form-control' name='sub4'>
								<option selected ><?php echo $select; ?></option>
								<?php
									$subject_array = array("Mathematics", "English Language", "Biology");
									
									foreach($subject_array as $subject){
										echo "<option>{$subject}</option><br>";
									}
								?>
							</select>
						</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub4_exam_score' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub4_test1' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub4_test2' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub4_test3' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub4_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub4_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			
			<!-- SUBJECT 5 FORMS BEGINS HERE -->
			<div class='row'>
				<div class='col-md-2'>
					<legend>Subject 5</legend>
				</div>
				
				<div class='col-md-2'>
						<div class='input-group'>
							<select class='form-control' name='sub5'>
								<option selected ><?php echo $select; ?></option>
								<?php
									$subject_array = array("Mathematics", "English Language", "Biology");
									
									foreach($subject_array as $subject){
										echo "<option>{$subject}</option><br>";
									}
								?>
							</select>
						</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub5_exam_score' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub5_test1' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub5_test2' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub5_test3' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub5_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub5_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			
			<!-- SUBJECT 6 FORMS BEGINS HERE -->
			<div class='row'>
				<div class='col-md-2'>
					<legend>Subject 6</legend>
				</div>
				
				<div class='col-md-2'>
						<div class='input-group'>
							<select class='form-control' name='sub6'>
								<option selected ><?php echo $select; ?></option>
								<?php
									$subject_array = array("Mathematics", "English Language", "Biology");
									
									foreach($subject_array as $subject){
										echo "<option>{$subject}</option><br>";
									}
								?>
							</select>
						</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub6_exam_score' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub6_test1' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub6_test2' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub6_test3' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub6_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='sub6_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			
			<p id='btnsubmit'><input type='submit' name='result_upload_btn' id='submit' value='UPLOAD' class='btn btn-large btn-success login_btn text-center' /></p>
		</form>
	</div>
</div>