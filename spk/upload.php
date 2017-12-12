<?php
	if(isset($_POST['result_upload_btn'])){
		for($j = 0; $j < (int)$_POST["total_num"]; $j++){
			$student_id = inject_checker($connection, $_POST['student_id'][$j]);
			$student_name = inject_checker($connection, $_POST['student_name'][$j]);
			$student_class = inject_checker($connection, $_POST['student_class'][$j]);
			$result_term = inject_checker($connection, $_POST['result_term'][$j]);
			$result_session = inject_checker($connection, $_POST['result_session'][$j]);
			$result_subject = inject_checker($connection, $_POST['result_subject'][$j]);
			$student_ca = inject_checker($connection, $_POST['student_ca'][$j]);
			$student_project = inject_checker($connection, $_POST['student_project'][$j]);
			$student_exam = inject_checker($connection, $_POST['student_exam'][$j]);
			$student_total = $student_ca + $student_project + $student_exam;
			$date = date('d/M/Y');
			
			$query = " SELECT * FROM `results1` WHERE `class` = '{$student_class}' AND `term` = '{$result_term}' AND `session` = '{$result_session}' AND `subjects` = '{$result_subject}' ";
			$run_query = mysqli_query($connection, $query);
		}
		if(mysqli_num_rows($run_query) > 0){
			echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> This Result Has Already Been Uploaded</b></p>";
		}else{
			$query = " INSERT INTO `results1`(`class`, `term`, `session`, `reg_number`, `name`, `subjects`, `ca`, `project`, `exam`, `subject_total`, `date_of_upload`) VALUES ";
			for($j = 0; $j < (int)$_POST["total_num"]; $j++){
				$student_id = inject_checker($connection, $_POST['student_id'][$j]);
				$student_name = inject_checker($connection, $_POST['student_name'][$j]);
				$student_class = inject_checker($connection, $_POST['student_class'][$j]);
				$result_term = inject_checker($connection, $_POST['result_term'][$j]);
				$result_session = inject_checker($connection, $_POST['result_session'][$j]);
				$result_subject = inject_checker($connection, $_POST['result_subject'][$j]);
				$student_ca = inject_checker($connection, $_POST['student_ca'][$j]);
				$student_project = inject_checker($connection, $_POST['student_project'][$j]);
				$student_exam = inject_checker($connection, $_POST['student_exam'][$j]);
				$student_total = $student_ca + $student_project + $student_exam;
				$date = date('d/M/Y');
				
				$query .= "('$student_class','$result_term','$result_session','$student_id','$student_name','$result_subject','$student_ca','$student_project','$student_exam','$student_total','$date'),";
			}
			$query = rtrim($query,",");
			$run_query = mysqli_query($connection, $query);
			
			if($run_query == true){
				$i = 1;
				$query1 = "SELECT * FROM `results1` WHERE `subjects` = '{$result_subject}' AND `class` = '{$student_class}' AND `term` = '{$result_term}' AND `session` = '{$result_session}' ORDER BY `subject_total` DESC ";
				$run_query1 = mysqli_query($connection, $query1);
				
				while($outputs = mysqli_fetch_assoc($run_query1)){
					
					$subject_t = $outputs['subject_total'];
					
					
					$sql = "UPDATE results1 SET subject_rank = '{$i}' WHERE subject_total = '{$subject_t}'";
					$run_query2 = mysqli_query($connection, $sql);
					$i++;
					
				}
				if($run_query2 == true){
					echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> Upload Successful</b></p>";
				}else{
					echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span>Upload Failed! Try Again</b></p>";
				}
				
				
			}else{
				echo "<p class='text-danger'><b><span class='glyphicon glyphicon-remove'></span> Failed! Try Again</b></p>";
			}
		}
	}
?>

<div class='panel panel-primary'>
	<div class='panel-heading'>
		<h2>Upload &amp; Manage Student Results</h2>
	</div>
	<div class='panel-body'>
		<form class='noprint' method='POST' action='staff_dashboard.php?upload'>
			<legend>View Uploaded Results</legend>
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Class:</span>
						<select class='form-control' name='view_upload_class'>
							<option selected ><?php echo $select ?></option>
							<?php
								$query = " SELECT * FROM `classes` ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$classes = $result['classes'];
										echo"
											<option>{$classes}</option>
										";
									}
								}
							?>
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Subject:</span>
						<select class='form-control' name='view_upload_subject'>
							<option selected ><?php echo $select ?></option>
							<?php
								$query = " SELECT * FROM `jss` ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$jss_subjects = $result['jss_subjects'];
										echo "<option>{$jss_subjects}</option>";
									}
								}
								
								$query = " SELECT * FROM `sss` ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$sss_subjects = $result['sss_subjects'];
										echo "<option>{$sss_subjects}</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				
				<div class='col-md-2'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Term:</span>
						<select class='form-control' name='view_upload_term'>
							<option selected ><?php echo $select ?></option>
							<?php
								$term_array = array("First Term", "Second Term", "Third Term");
								
								foreach($term_array as $term){
									echo "<option>{$term}</option><br>";
								}
							?>
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Session:</span>
						<select class='form-control' name='view_upload_session'>
							<?php
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
							?>
						</select>
					</div>
				</div>
				
				<div>
					<input type='submit' name='view_upload_btn' value='VIEW' class='btn btn-sm btn-success' />
					<input type='submit' name='del_upload_btn' value='DELETE' class='btn btn-sm btn-danger' />
				</div>
			</div>
		</form>
		<br />
		
		<?php
			////////////// POST ACTION TO VIEW UPLOADED RESULTS /////
			if(isset($_POST['view_upload_btn'])){
				$view_upload_class = $_POST['view_upload_class'];
				$view_upload_subject = $_POST['view_upload_subject'];
				$view_upload_term = $_POST['view_upload_term'];
				$view_upload_session = $_POST['view_upload_session'];
				
				if($view_upload_class == $select){
					echo "<p class='text-danger'><b>Please Select Class</b></p>";
				}
				elseif($view_upload_subject == $select){
					echo "<p class='text-danger'><b>Please Select Term</b></p>";
				}
				elseif($view_upload_term == $select){
					echo "<p class='text-danger'><b>Please Select Session</b></p>";
				}else{
					$query = " SELECT * FROM `results1` WHERE `class` = '{$view_upload_class}' AND `term` = '{$view_upload_term}' AND `session` = '{$view_upload_session}' AND `subjects` = '{$view_upload_subject}' ORDER BY `reg_number` ASC ";
					$run_query = mysqli_query($connection, $query);
					
					if(mysqli_num_rows($run_query) > 0){
						$i = 0;
						echo"
							<div class='table-responsive'>
								<table class='table table-striped'>
									<thead>
										<tr>
											<th>S/N</th>
											<th>Reg No</th>
											<th>Name</th>
											<th>Class</th>
											<th>Subject</th>
											<th>Term</th>
											<th>Session</th>
											<th>CA</th>
											<th>Project</th>
											<th>Exam</th>
											<th>Total</th>
										</tr>
									</thead>
						";
						while($result = mysqli_fetch_assoc($run_query)){
							$i++;
							$reg_no = $result['reg_number'];
							$name = $result['name'];
							$class = $result['class'];
							$subjects = $result['subjects'];
							$term = $result['term'];
							$session = $result['session'];
							$ca = $result['ca'];
							$project = $result['project'];
							$exam = $result['exam'];
							$total = $result['subject_total'];
							
							echo"
								<tbody>
									<tr>
										<td>{$i}</td>
										<td class='warning'>{$reg_no}</td>
										<td>{$name}</td>
										<td>{$class}</td>
										<td>{$subjects}</td>
										<td>{$term}</td>
										<td>{$session}</td>
										<td class='info'>{$ca}</td>
										<td class='danger'>{$project}</td>
										<td class='success'>{$exam}</td>
										<td class='success'>{$total}</td>
									</tr>
								</tbody>
							";
						}
						echo"
							</table>
						</div>
						";
					}else{
						echo "<p class='text-danger'><b> Results Not Uploaded</b></p>";
					}
				}
			}
		?>
		
		<?php
			if(isset($_POST['del_upload_btn'])){
				$view_upload_class = $_POST['view_upload_class'];
				$view_upload_subject = $_POST['view_upload_subject'];
				$view_upload_term = $_POST['view_upload_term'];
				$view_upload_session = $_POST['view_upload_session'];
				
				if($view_upload_class == $select){
					echo "<p class='text-danger'><b>Please Select Class</b></p>";
				}
				elseif($view_upload_subject == $select){
					echo "<p class='text-danger'><b>Please Select Term</b></p>";
				}
				elseif($view_upload_term == $select){
					echo "<p class='text-danger'><b>Please Select Session</b></p>";
				}else{
					$query = " DELETE FROM `results1` WHERE `class` = '{$view_upload_class}' AND `term` = '{$view_upload_term}' AND `session` = '{$view_upload_session}' AND `subjects` = '{$view_upload_subject}' ";
					$run_query = mysqli_query($connection, $query);
					
					if($run_query == true){
						echo "<p class='text-success'><b><span class='glyphicon glyphicon-ok'></span> Uploaded Results Deleted Successfully</b></p>";
					}else{
						echo "<p class='text-danger'><b>Uploaded Results Unable to Delete</b></p>";
					}
				}
			}
		?>
		
		
		<form class='noprint' method='POST' action='staff_dashboard.php?upload'>
			<legend>Upload Results</legend>
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Class:</span>
						<select class='form-control' name='result_upload_class'>
							<option selected ><?php echo $select ?></option>
							<?php
								$query = " SELECT * FROM `classes` ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$classes = $result['classes'];
										echo"
											<option>{$classes}</option>
										";
									}
								}
							?>
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Subject:</span>
						<select class='form-control' name='result_upload_subject'>
							<option selected ><?php echo $select ?></option>
							<?php
								$query = " SELECT * FROM `jss` ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$jss_subjects = $result['jss_subjects'];
										echo "<option>{$jss_subjects}</option>";
									}
								}
								
								$query = " SELECT * FROM `sss` ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$sss_subjects = $result['sss_subjects'];
										echo "<option>{$sss_subjects}</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Term:</span>
						<select class='form-control' name='result_upload_term'>
							<option selected ><?php echo $select ?></option>
							<?php
								$term_array = array("First Term", "Second Term", "Third Term");
								
								foreach($term_array as $term){
									echo "<option>{$term}</option><br>";
								}
							?>
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Session:</span>
						<select class='form-control' name='result_upload_session'>
							<?php
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
							?>
						</select>
					</div>
				</div>
				
				<div>
					<input type='submit' name='go_upload' value='GET' class='btn btn-sm btn-success' />
				</div>
				
			</div>
		</form>
		<br />
		
		
		<?php
			if(isset($_POST['go_upload'])){
				$result_upload_class = inject_checker($connection, $_POST['result_upload_class']);
				$result_upload_subject = inject_checker($connection, $_POST['result_upload_subject']);
				$result_upload_term = inject_checker($connection, $_POST['result_upload_term']);
				$result_upload_session = inject_checker($connection, $_POST['result_upload_session']);
				
				////////////////ERROR CHECKING FOR EMPTY FIELDS //////////////////
				if($result_upload_class === $select){
					$error[] = "Error: Please Select the Class for result upload";
				}
				if($result_upload_subject === $select){
					$error[] = "Error: Please Select the Subject for result upload";
				}
				if($result_upload_term === $select){
					$error[] = "Error: Please Select the Term for result upload";
				}
				if(empty($error)){
					$query = " SELECT * FROM `subjects` WHERE `class` = '{$result_upload_class}' AND `subjects` = '{$result_upload_subject}' AND `term` = '{$result_upload_term}' AND `session` = '{$result_upload_session}' ORDER BY `reg_number` ASC ";
					$run_query = mysqli_query($connection, $query);
					if(mysqli_num_rows($run_query) > 0){
						echo "
							<div class='row'>
								<div class='col-md-2 col-sm-2 col-xs-2'>
									<h4>Reg No</h4>
								</div>
								
								<div class='col-md-2 col-sm-2 col-xs-2'>
									<h4>Name</h4>
								</div>
								
								<div class='col-md-1 col-sm-1 col-xs-1'>
									<h4>Class</h4>
								</div>
								
								<div class='col-md-1 col-sm-1 col-xs-1'>
									<h4>Term</h4>
								</div>
								
								<div class='col-md-1 col-sm-1 col-xs-1'>
									<h4>Session</h4>
								</div>
								
								<div class='col-md-2 col-sm-2 col-xs-2'>
									<h4>Subject</h4>
								</div>
								
								<div class='col-md-1 col-sm-1 col-xs-1'>
									<h4>CA</h4>
								</div>
								
								<div class='col-md-1 col-sm-1 col-xs-1'>
									<h4>Project</h4>
								</div>
								
								<div class='col-md-1 col-sm-1 col-xs-1'>
									<h4>Exam</h4>
								</div>
							</div>
							
							<form method='POST' action'upload.php?go_upload'>
						";
						$i = 0;$k=1;
						//echo $k.".  ";
						while($result = mysqli_fetch_assoc($run_query)){
							$students_reg_no = $result['reg_number'];
							$student_names = $result['name'];
							$student_class = $result['class'];
							$result_term = $result['term'];
							$result_subject = $result['subjects'];
							$result_session = $result['session'];
							echo"
								{$k}
								<div class='row'>
									<div class='col-md-2 col-xs-2'>
										<div class='input-group'>
											<input id='upload' type='text' name='student_id[]' value='{$students_reg_no}' placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-2 col-xs-2'>	
										<div class='input-group'>
											<input id='upload' type='text' name='student_name[]' value='{$student_names}' placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-1 col-xs-1'>	
										<div class='input-group'>
											<input type='text' name='student_class[]' value='{$student_class}' placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-1 col-xs-1'>	
										<div class='input-group'>
											<input type='text' name='result_term[]' value='{$result_term}' placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-1 col-xs-1'>	
										<div class='input-group'>
											<input type='text' name='result_session[]' value='{$result_session}' placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-2 col-xs-2'>	
										<div class='input-group'>
											<input type='text' name='result_subject[]' value='{$result_subject}' placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-1 col-xs-1'>
										<div class='input-group'>
											<input type='text' name='student_ca[]' required placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-1 col-xs-1'>
										<div class='input-group'>
											<input type='text' name='student_project[]' required placeholder='' class='form-control' />
										</div>
									</div>
									
									<div class='col-md-1 col-xs-1'>
										<div class='input-group'>
											<input type='text' name='student_exam[]' required placeholder='' class='form-control' />
										</div>
									</div>
									
								</div>
								<br />
							";
							$i++;$k++;
						}
						echo "
							<input type='hidden' name='total_num' value='{$i}' />
							<input type='submit' name='result_upload_btn' id='submit' value='Upload' class='btn btn-large btn-success login_btn text-center noprint' />
							<button type='button' class='btn btn-default noprint' onclick='window.print()' value='print a div!'><span class='glyphicon glyphicon-print'></span> Print </button>
							
							<br />
						</form>
						";
					}else{
						echo "<p class='text-danger'><b>No records found !!!</b></p>";
					}
				}
			}
		?>
	</div>
</div>