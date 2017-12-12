<?php
	require_once("includes/control_session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
?>
<?php
	//////////////// DEFAULT NULL VALUES ///////////////
	$error = array();
	$failed = array();
	$date = date('d/M/Y');
	$time = date('s');
	$select = "--select--";
	$year = date('Y');
	
	$serial_date = date('Ymd');
?>
<?php
	/////////////// POST ACTION TO GENERATE PIN IF THE GENERATE BUTTTON IS CLICKED ///////////
	if(isset($_POST['generate_pin_btn'])){
		mt_srand((double)microtime()*1000000);
		
		$pin_no1 = mt_rand();
		$pin_no2 = mt_rand();
		$pin_no3 = mt_rand();
	}
?>
<?php
	//////////// POST ACTION TO UPLOAD GENERATED PIN TO DATABASE WITH SPECIFIED TERM /////////////////
	if(isset($_POST['upload_pin_btn'])){
		$pin_total = 5;
		
		for($i = 1; $i <= $pin_total; $i++){
			
			$gen_pin = inject_checker($connection, $_POST["gen_pin{$i}"]);
			$pin_upload_term = inject_checker($connection, $_POST['pin_upload_term']);
			
			if(empty($gen_pin)){
				$error[] = "Error! Please Generate Pin Before You Upload";
			}
			if($pin_upload_term == $select){
				$error[] = "Error! Please Select the Term where the Generated pin will be Used";
			}
			if(empty($error)){
				if($pin_upload_term == ucwords("first term")){
					////////////// QUERY TO CHECK NUMBER EXISTING IN TABLE PIN1 AND INCREMENTING BY 1 //////////////
					$query = " SELECT * FROM `pin1` ";
					$run_query = mysqli_query($connection, $query);
					$existing_number = mysqli_num_rows($run_query);
					$increase_number = $existing_number++;
					$serial_number = $serial_date .$increase_number;
					
					$query = " SELECT * FROM `pin1` WHERE `first_term_pin` = '{$gen_pin}' ";
					$run_query = mysqli_query($connection, $query);
					
					
					if(mysqli_num_rows($run_query) > 0){
						$msg_failure = "Pin Already Exist";
					}else{
						$query = " INSERT INTO `pin1`(`term`, `first_term_pin`, `serial_number`, `upload_date`)
									VALUES('$pin_upload_term', '$gen_pin', '$serial_number', '$date')";
						$run_query = mysqli_query($connection, $query);
						if($run_query == true){
							$query = " INSERT INTO `unused_pins`(`term`, `unused_pins`, `serial_number`, `upload_date`)
										VALUES('$pin_upload_term', '$gen_pin', '$serial_number', '$date') ";
							$run_query = mysqli_query($connection, $query);
							
							if($run_query == true){
								$msg_success = "Pin Upload Successful <br/>";
							}else{
								$msg_failure = "Pin Failed to Upload";
							}
						}else{
							$msg_failure = "Pin Upload Failed";
						}
					}
				}
				elseif($pin_upload_term == ucwords("second term")){
					////////////// QUERY TO CHECK NUMBER EXISTING IN TABLE PIN2 AND INCREMENTING BY 1 //////////////
					$query = " SELECT * FROM `pin2` ";
					$run_query = mysqli_query($connection, $query);
					$existing_number = mysqli_num_rows($run_query);
					$increase_number = $existing_number++;
					$serial_number = $serial_date .$increase_number;
					
					$query = " SELECT * FROM `pin2` WHERE `second_term_pin` = '{$gen_pin}' ";
					$run_query = mysqli_query($connection, $query);
					
					if(mysqli_num_rows($run_query) > 0){
						$msg_failure = "Pin Already Exist";
					}else{
						$query = " INSERT INTO `pin2`(`term`, `second_term_pin`, `serial_number`, `upload_date`)
									VALUES('$pin_upload_term', '$gen_pin', '$serial_number', '$date')";
						$run_query = mysqli_query($connection, $query);
						if($run_query == true){
							$query = " INSERT INTO `unused_pins`(`term`, `unused_pins`, `serial_number`, `upload_date`)
										VALUES('$pin_upload_term', '$gen_pin', '$serial_number', '$date') ";
							$run_query = mysqli_query($connection, $query);
							
							if($run_query == true){
								$msg_success = "Pin Upload Successful <br/>";
							}else{
								$msg_failure = "Pin Failed to Upload";
							}
						}else{
							$msg_failure = "Pin Upload Failed";
						}
					}
				}
				elseif($pin_upload_term == ucwords("third term")){
					////////////// QUERY TO CHECK NUMBER EXISTING IN TABLE PIN3 AND INCREMENTING BY 1 //////////////
					$query = " SELECT * FROM `pin3` ";
					$run_query = mysqli_query($connection, $query);
					$existing_number = mysqli_num_rows($run_query);
					$increase_number = $existing_number++;
					$serial_number = $serial_date .$increase_number;
					
					$query = " SELECT * FROM `pin3` WHERE `third_term_pin` = '{$gen_pin}' ";
					$run_query = mysqli_query($connection, $query);
					
					if(mysqli_num_rows($run_query) > 0){
						$msg_failure = "Pin Already Exist";
					}else{
						$query = " INSERT INTO `pin3`(`term`, `third_term_pin`, `serial_number`, `upload_date`)
									VALUES('$pin_upload_term', '$gen_pin', '$serial_number', '$date')";
						$run_query = mysqli_query($connection, $query);
						if($run_query == true){
							$query = " INSERT INTO `unused_pins`(`term`, `unused_pins`, `serial_number`, `upload_date`)
										VALUES('$pin_upload_term', '$gen_pin', '$serial_number', '$date') ";
							$run_query = mysqli_query($connection, $query);
							
							if($run_query == true){
								$msg_success = "Pin Upload Successful <br/>";
							}else{
								$msg_failure = "Pin Failed to Upload";
							}
						}else{
							$msg_failure = "Pin Upload Failed";
						}
					}
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SPK - PIN GENERATOR</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
		<meta name='description" content="student registration' />
		<link type='text/css' rel='stylesheet' href='css/bootstrap.css' />
		<link type='text/css' rel='stylesheet' href='css/font-awesome.css' />
        <link rel="shortcut icon" href="img/icon.png">
		<link rel='stylesheet' href='css/defined.css' />
		<script type='text/javascript' src='js/jquery-1.11.3.min.js'></script>
		<script src='js/bootstrap.js'></script>
	</head>
	<body>
		<div class='container-fluid'>
			<header class='row' id='header'>
				<div class='col-md-2'>
				
				</div>
				
				<div class='col-md-8 text-center'>
					<h1 style='color: #fff;'>School Portal Kit</h1>
				</div>
				
				<div class='col-md-2'>
				
				</div>
			</header>
		</div>
		<br />
		<div class='container'>
			<div class='row'>
				<div class='col-md-5'>
					<?php
						if(isset($msg_success)){
							echo "<p class='text-success text-center'><b><span class='glyphicon glyphicon-ok'></span> {$msg_success}</b></p><br />";
						}elseif(isset($msg_failure)){
							echo "<p class='text-danger text-center'><b><span class='glyphicon glyphicon-close'></span> {$msg_failure}</b></p><br />";
						}
					?>
					<div class='row thumbnail'>
						<div class='col-md-12'>
							<h3 class='log-text'>Generate Pin</h3>
							<form class='' id='login' method='POST' action='generator.php'>
								<br />
								<p id='btnsubmit'><input type='submit' name='generate_pin_btn' id='submit' value='Generate Pin' class='btn btn-large btn-success login_btn text-center' /></p>
							</form>
							<form method='POST' action='generator.php'>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>GEN PIN:</span>
									<input type='text' name='gen_pin1' value='<?php echo $time .rnd(14, false, false, true); ?>' required class='form-control'  aria-describedby='basic-addon2' />
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>GEN PIN:</span>
									<input type='text' name='gen_pin2' value='<?php echo $time .rnd(14, false, false, true); ?>' required class='form-control'  aria-describedby='basic-addon2' />
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>GEN PIN:</span>
									<input type='text' name='gen_pin3' value='<?php echo $time .rnd(14, false, false, true); ?>' required class='form-control'  aria-describedby='basic-addon2' />
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>GEN PIN:</span>
									<input type='text' name='gen_pin4' value='<?php echo $time .rnd(14, false, false, true); ?>' required class='form-control'  aria-describedby='basic-addon2' />
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>GEN PIN:</span>
									<input type='text' name='gen_pin5' value='<?php echo $time .rnd(14, false, false, true); ?>' required class='form-control'  aria-describedby='basic-addon2' />
								</div>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>TERM</span>
									<select class='form-control' name='pin_upload_term'>
										<option selected><?php echo $select ?></option>
										<?php
											$term_array = array("First Term", "Second Term", "Third Term");
											foreach($term_array as $term){
												echo "<option>{$term}</option>";
											}
										?>
									</select>
								</div>
								<br />
								
								<input type='submit' name='upload_pin_btn' id='submit' value='Upload Pin' class='btn btn-large btn-success login_btn text-center' />
								<input type='submit' name='end_access_btn' value='Leave This Page' class='btn btn-warning' />
								<?php
									foreach($error as $msg){
										echo "<p class='text-danger'><b>{$msg}</b></p><br />";
									}
								?>
							</form>
							
							<?php
								if(isset($_POST['end_access_btn'])){
									unset($_SESSION['control']);
									header("Location:secured.php");
									exit;
								}
							?>
						</div>
					</div>
				</div>
				<div class='col-md-2'>
					&nbsp;
				</div>
				<div class='col-md-5'>
					<div class='row thumbnail'>
						<div class='col-md-12'>
							<form method='POST' action='generator.php'>
								<h3 class='log-text'>View Uploaded Pin</h3>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>TERM</span>
									<select class='form-control' name='view_pin_term'>
										<option selected><?php echo $select ?></option>
										<?php
											$term_array = array("First Term", "Second Term", "Third Term");
											foreach($term_array as $term){
												echo "<option>{$term}</option>";
											}
										?>
									</select>
								</div>
								<br />
								
								<input type='submit' name='view_pin_btn' id='submit' value='View Uploaded Pin' class='btn btn-large btn-success login_btn text-center' />
								<input type='submit' name='end_access_btn' value='Leave This Page' class='btn btn-warning' />
								<br />
								<br />
								<br />
								
								<?php
									///////////////////// POST ACTION TO VIEW UPLOADED PINS FROM DATABASE WITH SPECIFIED TERM //////////////////
									if(isset($_POST['view_pin_btn'])){
										$view_pin_term = $_POST['view_pin_term'];
										
										////// ERROR CHECKING FOR EMPTY FIELDS /////
										if($view_pin_term == $select){
											$failed[] = "Error! Please Select the Term of the Pin You want to View";
										}
										if(empty($failed)){
											if($view_pin_term == ucwords("first term")){
												$query = " SELECT * FROM `pin1` WHERE `term` = '{$view_pin_term}' ";
												$run_query = mysqli_query($connection, $query);
												
												if($run_query == true){
													if(mysqli_num_rows($run_query) > 0){
														echo"
															<div class='table-responsive'>
																<table class='table table-striped'>
																	<thead>
																		<tr>
																			<th>FIRST TERM PINS</th>
																			<th>SERIAL NUMBERS</th>
																			<th>ACTION</th>
																		</tr>
																	</thead>
														";
														while($result = mysqli_fetch_assoc($run_query)){
															$first_pin = $result['first_term_pin'];
															$serial_number = $result['serial_number'];
															echo"
																<tbody>
																	<tr>
																		<td>{$first_pin}</td>
																		<td>{$serial_number}</td>
																		<td>
																			<form>
																				<input type='submit' name='del_pin' value='Delete' class='btn btn-danger btn-xs' />
																			</form>
																		</td>
																	</tr>
																</tbody>
															";
														}
													}else{
														echo "Related Pin Not Found";
													}echo"
															</table>
														</div>
													";
												}
											}
											elseif($view_pin_term == ucwords("second term")){
												$query = " SELECT * FROM `pin2` WHERE `term` = '{$view_pin_term}' ";
												$run_query = mysqli_query($connection, $query);
												
												if($run_query == true){
													if(mysqli_num_rows($run_query) > 0){
														echo"
															<div class='table-responsive'>
																<table class='table table-striped'>
																	<thead>
																		<tr>
																			<th>SECOND TERM PINS</th>
																			<th>SERIAL NUMBERS</th>
																			<th>ACTION</th>
																		</tr>
																	</thead>
														";
														while($result = mysqli_fetch_assoc($run_query)){
															$second_pin = $result['second_term_pin'];
															$serial_number = $result['serial_number'];
															echo"
																<tbody>
																	<tr>
																		<td>{$second_pin}</td>
																		<td>{$serial_number}</td>
																		<td>
																			<form>
																				<input type='submit' name='del_pin' value='Delete' class='btn btn-danger btn-xs' />
																			</form>
																		</td>
																	</tr>
																</tbody>
															";
														}
													}else{
														echo "Related Pin Not Found";
													}echo"
															</table>
														</div>
													";
												}
											}
											elseif($view_pin_term == ucwords("third term")){
												$query = " SELECT * FROM `pin3` WHERE `term` = '{$view_pin_term}' ";
												$run_query = mysqli_query($connection, $query);
												
												if($run_query == true){
													if(mysqli_num_rows($run_query) > 0){
														echo"
															<div class='table-responsive'>
																<table class='table table-striped'>
																	<thead>
																		<tr>
																			<th>THIRD TERM PINS</th>
																			<th>SERIAL NUMBERS</th>
																			<th>ACTION</th>
																		</tr>
																	</thead>
														";
														while($result = mysqli_fetch_assoc($run_query)){
															$third_pin = $result['third_term_pin'];
															$serial_number = $result['serial_number'];
															echo"
																<tbody>
																	<tr>
																		<td>{$third_pin}</td>
																		<td>{$serial_number}</td>
																		<td>
																			<form>
																				<input type='submit' name='del_pin' value='Delete' class='btn btn-danger btn-xs' />
																			</form>
																		</td>
																	</tr>
																</tbody>
															";
														}
													}else{
														echo "Related Pin Not Found";
													}echo"
															</table>
														</div>
													";
												}
											}
										}
									}
									
									foreach($failed as $error_msg){
										echo "<p class='text-danger'><b>{$error_msg}</b></p>";
									}
								?>
							</form>
							<br />
							
							<form method='POST' action='generator.php'>
								<h3 class='log-text'>View Unused Pin</h3>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>TERM</span>
									<select class='form-control' name='view_unsed_pin_term'>
										<option selected><?php echo $select ?></option>
										<?php
											$term_array = array("First Term", "Second Term", "Third Term");
											foreach($term_array as $term){
												echo "<option>{$term}</option>";
											}
										?>
									</select>
								</div>
								<br />
								
								<input type='submit' name='view_unused_btn' id='submit' value='View Unused Pin' class='btn btn-large btn-success login_btn text-center' />
								<br />
								<br />
								<br />
								
								<?php
									///////////////////// POST ACTION TO VIEW UNUSED PINS FROM DATABASE WITH SPECIFIED TERM //////////////////
									if(isset($_POST['view_unused_btn'])){
										$view_unsed_pin_term = $_POST['view_unsed_pin_term'];
										
										////// ERROR CHECKING FOR EMPTY FIELDS /////
										if($view_unsed_pin_term == $select){
											$failed[] = "Error! Please Select the Term of the Pin You want to View";
										}
										if(empty($failed)){
											$query = " SELECT * FROM `unused_pins` WHERE `term` = '{$view_unsed_pin_term}' ";
											$run_query = mysqli_query($connection, $query);
											
											if($run_query == true){
												if(mysqli_num_rows($run_query) > 0){
													$i = 0;
													echo"
														<div class='table-responsive'>
															<table class='table table-striped'>
																<thead>
																	<tr>
																		<th>S/N</th>
																		<th>UNUSED PINS</th>
																		<th>SERIAL NO.</th>
																		<th>PIN TERM</th>
																		<th>ACTION</th>
																	</tr>
																</thead>
													";
													while($result = mysqli_fetch_assoc($run_query)){
														$i++;
														$unused_pin = $result['unused_pins'];
														$serial_number = $result['serial_number'];
														$unused_pin_term = $result['term'];
														echo"
															<tbody>
																<tr>
																	<td>{$i}</td>
																	<td>{$unused_pin}</td>
																	<td>{$serial_number}</td>
																	<td>{$unused_pin_term}</td>
																	<td>
																		<form>
																			<input type='submit' name='del_unused_pin' value='Delete' class='btn btn-danger btn-xs' />
																		</form>
																	</td>
																</tr>
															</tbody>
														";
													}
												}else{
													echo "Related Pin Not Found";
												}echo"
														</table>
													</div>
												";
											}
										}
									}
									
									foreach($failed as $error_msg){
										echo "<p class='text-danger'><b>{$error_msg}</b></p>";
									}
								?>
							</form>
							<br />
							
							<form method='POST' action='generator.php'>
								<h3 class='log-text'>View Used Pins</h3>
								<br />
								
								<div class='input-group'>
									<span class='input-group-addon' id='basic-addon2'>TERM</span>
									<select class='form-control' name='used_pin_term'>
										<option selected><?php echo $select ?></option>
										<?php
											$term_array = array("First Term", "Second Term", "Third Term");
											foreach($term_array as $term){
												echo "<option>{$term}</option>";
											}
										?>
									</select>
								</div>
								<br />
								
								<input type='submit' name='view_used_pin_btn' value='View Used Pin' class='btn btn-large btn-success login_btn text-center' />
							</form>
							<?php
                            //////////// POST ACTION TO VIEW USED PINS /////////////////////////////
								if(isset($_POST['view_used_pin_btn'])){
									$used_pin_term = inject_checker($connection, ucwords($_POST['used_pin_term']));
									
									if($used_pin_term === $select){
										$failed[] = "Please Select the Term of Used Pin You Want to View !!!";
									}
									if(empty($failed)){
										$query = " SELECT * FROM `used_pins` WHERE `used_term` = '{$used_pin_term}' ORDER BY `date_used` ASC ";
										$run_query = mysqli_query($connection, $query);
										
										if(mysqli_num_rows($run_query) > 0){
											$i = 0;
											echo"
												<div class='table-responsive'>
													<table class='table table-striped'>
														<thead>
															<tr>
																<th>S/N</th>
																<th>USED PINS</th>
																<th>USED BY</th>
																<th>USAGE</th>
																<th>CLASS</th>
																<th>TERM</th>
																<th>SESSION</th>
																<th>ACTION</th>
															</tr>
														</thead>
											";
											while($result = mysqli_fetch_assoc($run_query)){
												$i++;
												$pins_used = $result['used_pins'];
												$used_by = $result['user_reg_number'];
												$times_used = $result['used_count'];
												$user_class = $result['user_class'];
												$term_used = $result['used_term'];
												$session_used = $result['used_session'];
												
												echo"
													<tbody>
														<tr>
															<td>{$i}</td>
															<td>{$pins_used}</td>
															<td>{$used_by}</td>
															<td class='text-center'>{$times_used}</td>
															<td>{$user_class}</td>
															<td>{$term_used}</td>
															<td>{$session_used}</td>
															<td>
																<form>
																	<input type='submit' name='del_used' value='Delete' class='btn btn-danger btn-xs' />
																</form>
															</td>
														</tr>
													</tbody>
												";
											}
										}else{
											echo "<p class='text-danger'><b>No Pin Has Been Used for {$used_pin_term} !!!</b></p>";
										}echo"
												</table>
											</div>
										";
									}
								}
								foreach($failed as $error_msg){
									echo "<p class='text-danger'><b>{$error_msg}</b></p>";
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<footer>
			<div class='container'>
				<p class='text-center' style='color: #666;'>Copyright &#169; <?php echo $year ?> // Product of <a href='http://www.toxaswift.com'>Toxaswift Inc.</a> // <span class='glyphicon glyphicon-envelope'></span> info@toxaswift.com</p>
			</div>
		</footer>
	</body>
</html>