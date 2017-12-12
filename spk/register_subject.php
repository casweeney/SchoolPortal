<?php
	echo"
		<div class='panel panel-primary'>
	<div class='panel-heading'>
		<h2>Register Subjects</h2>
	</div>
	
	<div class='panel-body'>
		<form>
			<div class='row'>
				<div class='col-md-4'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Reg No:</span>
						<input type='text' value='' name='sub1_exam_score' placeholder='Type Your Registration Number' class='form-control' />
					</div>
				</div>
				
				<div class='col-md-4'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Name:</span>
						<input type='text' name='sub1_exam_score' placeholder='Type Your Name' class='form-control' />
					</div>
				</div>
			</div>
			<br />
			<div class='row'>
				<div class='col-md-2'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Class:</span>
						<select class='form-control' name='result_upload_class'>
							<option selected >{$select}</option>";
								$query = " SELECT * FROM `classes` ";
								$run_query = mysqli_query($connection, $query);
								if(mysqli_num_rows($run_query) > 0){
									while($result = mysqli_fetch_assoc($run_query)){
										$register_classes = $result['classes'];
										echo"
											<option>{$register_classes}</option>
										";
									}
								}
								echo"
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Subjects:</span>
						<select class='form-control' name='sub1'>
							<option selected >{$select}</option>";
							
								$subject_array = array("Mathematics", "English Language", "Biology", "Agric Science", "Chemistry", "Physics", "Further Maths", "Economics", "Government");
								
								foreach($subject_array as $subject){
									echo "<option>{$subject}</option><br>";
								}
								echo"
						</select>
					</div>
				</div>
				
				<div class='col-md-3'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Result Term:</span>
						<select class='form-control' name='result_upload_term'>
							<option selected >{$select}</option>";
								$term_array = array("First Term", "Second Term", "Third Term");
								
								foreach($term_array as $term){
									echo "<option>{$term}</option><br>";
								}
								echo"
						</select>
					</div>
				</div>
				
				<div class='col-md-4'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Current Session:</span>
						<select class='form-control' name='result_upload_term'>";
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
	";
?>