<?php
	//////////// FUNCTION TO REMOVE SLASHES AND TO REMOVE SPACES //////////
	function inject_checker ($connection, $field){
		return (htmlentities(trim(mysqli_real_escape_string($connection, $field))));
	}

	//////////////// FUNCTION TO VERIFY ONLY TEXT FIELDS ///////////////
	function text_only_validator ($name){
		return(@ereg('^[a-zA-Z]+[a-z0-9A-Z]+$', $name));
	}

	//////////////// FUNCTION TO VERIFY ONLY USERNAME FIELDS ///////////////
	function username_validator ($username){
		return(@ereg('^[a-zA-Z]+[a-z0-9A-Z]+$', $username));
	}

	////////////////FUNCTION TO VERIFY ONLY EMAIL FIELDS ///////////////
	function single_email_validator ($email){
		return(@ereg('^[a-z0-9A-Z]+@[a-z0-9A-Z]+\\.[a-z]+$', $email));
	}
	
	/////////////// TO ENCRYPT DATA SENT THROUGH GETS //////////////
	function confused ($get){
		return( sha1(sha1(sha1(htmlentities(urlencode($sent))))) );
	}
	
	
	function subject_position($position){
		$position_array = array(11, 12, 13, 111, 112, 113, 211, 212, 213, 311, 312, 313, 411, 412, 413, 511, 512, 513, 611, 612, 613, 711, 712, 713, 811, 812, 813, 911, 912, 913);
		
		//Get the reversed order of the positions
		$reversed_position = strrev($position);
		
		//Get the first integer when the position has been reversed
		$first_number_reversed = substr($reversed_position, 0, 1);
		
		if(in_array($position, $position_array)){
			$position_in_class = "<b>{$position}th</b>";
			return $msg = $position_in_class;
		}
		// If the when the position is reversed and the first integer is 1, it should append "st" to the position
		elseif($first_number_reversed == 1){
			$position_in_class = "<b>{$position}st</b>";
			return $msg = $position_in_class;
		}
		
		// If the when the position is reversed and the first integer is 2, it should append "nd" to the position
		elseif($first_number_reversed == 2){
			$position_in_class = "<b>{$position}nd</b>";
			return $msg = $position_in_class;
		}
		
		// If the when the position is reversed and the first integer is 3, it should append "rd" to the position
		elseif($first_number_reversed == 3){
			$position_in_class = "<b>{$position}rd</b>";
			return $msg = $position_in_class;
		}
		//Else the rest of the positions will be appended with "th"
		else{
			$position_in_class = "<b>{$position}th</b></b>	";
			return $msg = $position_in_class;
		}
	}
	
	function rnd($length, $lower=true, $upper=true, $numbers=true){
		$pool = "";
		$result = "";
		
		if($lower == true){
			$pool .= "abcdefghijklmnopqrstuvwxyz";
		}
		
		if($upper == true){
			$pool .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		}
		
		if($numbers == true){
			$pool .= "01234567890";
		}
		
		$cc = 0;
		while($cc < $length){
			$result .= $pool[mt_rand(0, strlen($pool)-1)];
			$cc++;
		}
		return $result;
	}

	function test_input($data) {
	 	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}
?>