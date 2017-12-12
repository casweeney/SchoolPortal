<?php
	require_once("includes/staff_session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	require_once("staff_dashboard_processor.php");
?>
<?php
	$i = 1;
	$scores = array();
	$query = "SELECT * FROM results1 WHERE subjects='Mathematics' ORDER BY subject_total DESC";
	$run_query = mysqli_query($connection, $query);
	while($outputs = mysqli_fetch_array($run_query)){
		
		$subject_t = $outputs['subject_total'];
		
		
		$sql = "UPDATE results1 SET subject_rank = '{$i}' WHERE subject_total = '{$subject_t}'";
		$run_query1 = mysqli_query($connection, $sql);
		if($run_query1){echo "insertion successful! ";}else{ echo "Failed!" . mysqli_connect_error();}
		
		$i++;
		
	}
	
	rsort($scores);
	
	while($output = mysqli_fetch_array($run_query)){
		for($i=0; $i<2; $i++){
			/*if($scores[$i] == $outputs['subject_total']){
				echo $i;
			}*/
			echo $scores[$i];
		}
	}

?>