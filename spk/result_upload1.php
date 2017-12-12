<?php
	if(isset($_POST['result_upload_btn'])){
		$result_upload_class = inject_checker($connection, $_POST['result_upload_class']);
		$result_upload_subject = inject_checker($connection, $_POST['result_upload_subject']);
		$result_upload_term = inject_checker($connection, $_POST['result_upload_term']);
		$date = date('d/M/Y');
		
		$total = 10;
		for($i = 1; $i <= $total; $i++){
			$student_id = inject_checker($connection, $_POST["student{$i}_id"]);
			$student_name = inject_checker($connection, $_POST["student{$i}_name"]);
			$student_ca = inject_checker($connection, $_POST["student{$i}_ca"]);
			$student_project = inject_checker($connection, $_POST["student{$i}_project"]);
			$student_exam = inject_checker($connection, $_POST["student{$i}_exam"]);
			$student_total = inject_checker($connection, $_POST["student{$i}_total"]);
			
			$query = " INSERT INTO `results1`(`class`, `term`, `reg_number`, `name`, `subjects`, `ca`, `project`, `exam`, `subject_total`, `date_of_upload`) 
						VALUES('$result_upload_class', '$result_upload_term', '$student_id', '$student_name', '$result_upload_subject', '$student_ca', '$student_project', '$student_exam', '$student_total', '$date') ";
			$run_query = mysqli_query($connection, $query);
		}
		
		if($run_query == true){
			$i = 1;
			$query = "SELECT * FROM results1 WHERE subjects='{$result_upload_subject}' AND `class` = '{$result_upload_class}' ORDER BY subject_total DESC";
			$run_query = mysqli_query($connection, $query);
			while($outputs = mysqli_fetch_array($run_query)){
				
				$subject_t = $outputs['subject_total'];
				
				
				$sql = "UPDATE results1 SET subject_rank = '{$i}' WHERE subject_total = '{$subject_t}'";
				$run_query1 = mysqli_query($connection, $sql);
				if($run_query1 == true){echo "insertion successful! ";}else{ echo "Failed!";}
				
				$i++;
			}
		}else{
			echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Failed! Try Again</b></p>";
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
						<span class='input-group-addon' id='basic-addon2'>Subjects:</span>
						<select class='form-control' name='result_upload_subject'>
							<option selected ><?php echo $select; ?></option>
							<?php
								$subject_array = array("Mathematics", "English Language", "Biology", "Agric Science", "Chemistry", "Physics", "Further Maths", "Economics", "Government");
								
								foreach($subject_array as $subject){
									echo "<option>{$subject}</option><br>";
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
				
				<!-- ACTION TO GET ALL STUDENTS WHO REGISTERED A PARTICULAR SUBJECT TO ENABLE EASY RESULT UPLOAD
				
				<div>
					<input type='submit' name='go_upload' value='GET' class='btn btn-success' />
				</div>
				-->
				
			</div>
			<br />

			<div class='row'>
				<div class='col-md-2'>
					<h4>Reg no</h4>
				</div>
				<div class='col-md-2'>
					<h4>Name</h4>
				</div>
				<div class='col-md-1'>
					<h4>C.A</h4>
				</div>
				<div class='col-md-1'>
					<h4>Project</h4>
				</div>
				<div class='col-md-1'>
					<h4>Exam</h4>
				</div>
				<div class='col-md-1'>
					<h4>Total</h4>
				</div>
			</div>
			
			
			<?php
				/*
				if(isset($_POST['go_upload'])){
					$result_upload_class = inject_checker($_POST['result_upload_class']);
					$result_upload_subject = inject_checker($_POST['result_upload_subject']);
					$result_upload_term = inject_checker($_POST['result_upload_term']);
					
					$query = " SELECT * FROM `subjects` WHERE `class` = '{$result_upload_class}' AND `subjects` = '{$result_upload_subject}' AND `term` = '{$result_upload_term}' ";
					$run_query = mysqli_query($connection, $query);
					
					if(mysqli_num_rows($run_query) > 0){
						while($result = mysqli_fetch_assoc($run_query)){
							$students_reg_no = $result['reg_number'];
							$student_names = $result['name'];
							echo"
								
							";
						}
					}else{
						echo "No records found";
					}
				}*/
			?>
			
			<!-- STUDENT 1 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student1_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>	
					<div class='input-group'>
						<input type='text' name='student1_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student1_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student1_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student1_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student1_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			
			<!-- STUDENT 2 SCORE -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student2_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student2_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student2_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student2_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student2_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student2_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 3 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student3_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student3_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student3_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student3_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student3_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student3_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 4 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student4_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student4_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student4_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student4_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student4_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student4_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 5 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student5_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student5_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student5_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student5_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student5_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student5_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 6 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student6_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student6_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student6_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student6_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student6_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student6_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 7 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student7_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student7_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student7_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student7_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student7_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student7_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 8 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student8_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student8_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student8_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student8_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student8_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student8_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 9 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student9_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student9_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student9_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student9_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student9_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student9_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<!-- STUDENT 10 SCORES -->
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student10_id' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<input type='text' name='student10_name' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student10_ca' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student10_project' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student10_exam' placeholder='' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-1'>
					<div class='input-group'>
						<input type='text' name='student10_total' placeholder='' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			
			<p id='btnsubmit'><input type='submit' name='result_upload_btn' id='submit' value='UPLOAD' class='btn btn-large btn-success login_btn text-center' /></p>
		</form>
	</div>
</div>