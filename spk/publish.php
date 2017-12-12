<div class='panel panel-primary'>
	<div class='panel-heading'>
		<h2>Publish Student Results</h2>
	</div>
	<div class='panel-body'>
		<form method='POST' action='staff_dashboard.php?publish_result'>
			<div class='row'>
				<div class='col-md-4'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Student Class:</span>
						<select class='form-control' name='publish_result_class'>
							<option selected >{$select}</option>
								$class_array = array("JSS1", "JSS2", "JSS3", "SSS1", "SSS2", "SSS3");
								
								foreach($class_array as $class){
									echo "<option>{$class}</option><br>";
								}
						</select>
					</div>
				</div>
				
				<div class='col-md-4'>
					<div class='input-group'>
						<span class='input-group-addon' id='basic-addon2'>Subjects:</span>
						<select class='form-control' name='publish_result_term'>
							<option selected >{$select}</option>
								$term_array = array("First Term", "Second Term", "Third Term");
								
								foreach($term_array as $term){
									echo "<option>{$term}</option><br>";
								}
						</select>
					</div>
				</div>
				
				<div>
					<input type='submit' name='publish_result_btn' value='PUBLISH' class='btn btn-success' />
				</div>
				
			</div>
		</form>
	</div>
</div>