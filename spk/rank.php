<?php
	$values = $scores = array(4,5,2,9);
	rsort($scores);
	for($i=0; $i<4; $i++){
		$rank = $i + 1;
		foreach($values as $value){
			if($scores[$i] == $value) echo $value . " is number " . $rank . "<br />";
		}
		//echo $scores[$i];
	}
?>