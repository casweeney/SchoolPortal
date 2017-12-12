<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$error = array();
	$date = date('d/M/Y');
	$select = "--select--";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SPK</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<meta name='description" content="student registration' />
		<link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
		<link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
		<link rel='stylesheet' href='css/defined.css' />
		<script type='text/javascript' src='js/jquery-1.11.3.min.js'></script>
		<script src='js/bootstrap.js'></script>
	</head>
	<body>
		<br />
		<br />
		<br />
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-4'>
				
				</div>
				
				<div class='col-md-4'>
					<div class='row'>
						<div class='col-md-12' id='log' style='border: 2px solid #aaa; border-radius: 10px;'>
							<h3 class='log-text'>Please Fill the form to check result</h3>
							<br />
							
							<form class='' id='login' method='POST' action=''>
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>REG NO</span>
									<input type='text' placeholder='Enter Registration Number' class='form-control' name='result_regno' />
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>TERM</span>
									<select class='form-control' name='result_term'>
										<option selected><?php echo $select ?></option>
										<?php
											$term_array = array("First", "Second", "Third");
											foreach($term_array as $term){
												echo "<option>{$term}</option>";
											}
										?>
									</select>
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>SESSION</span>
									<select class='form-control' name='result_session'>
										<option selected><?php echo $select ?></option>
										<?php
											$session_array = array("2011/2012", "2012/2013", "2013/2014", "2014/2015", "2015/2016", "2016/2017");
											foreach($session_array as $session){
												echo "<option>{$session}</option>";
											}
										?>
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
				
				<div class='col-md-4'>
				
				</div>
			</div>
		</div>
	</body>
</html>