<?PHP

function p(){
	$args = func_get_args();
	echo "<div align='left'><pre>= RESULT =\n";
	if(is_array($args)){
		$i = 0;
		foreach($args as $tgt){
			echo "[param:" . (++$i) . "]\n";
			print_r($tgt);
			echo "\n";
		}
	}
	echo "</pre></div>";
} 

function pe() {
	$args = func_get_args();
	echo "<div align='left'><pre>= RESULT =\n";
	if(is_array($args)){
		$i = 0;
		foreach($args as $tgt){
			echo "[param:" . (++$i) . "]\n";
			print_r($tgt);
			echo "\n";
		}
	}
	echo "</pre></div>";
		exit;
}


function errorLog($preFix = "log", $msg="no msg", $levelType){

		$levelMsg;

		switch($levelType)
		{
			case 0:
				$levelMsg="DEBUG";
				break;
			case 1:
				$levelMsg = "WARNING";
				break;
			case 2:
				$levelMsg = "FATAL";
				break;
			default:
				$levelMsg = "ORTHER";
				break;
			
		}

		if(is_array($msg))
		{
			$msg = serialize($msg);
			//$msg = unserialize($msg);
		}

		$logFile = LOG_DIR."/".$preFix."_".date("Ymd").".log";

		if(is_writable(LOG_DIR)){
			return error_log($msg,3,$logFile);
		}else{
			return error(LOG_DIR." is not writable");  //오류남
		}
	}



//코드
function encryptDecrypt($toEncrypt) {
	$key = ['K', 'C', 'Q'];
	$output = '';
	for ($i = 0; $i < strlen($toEncrypt); $i++) {
		$output .= chr(ord($toEncrypt[$i]) ^ ord($key[$i % count($key)]));
	}
	return $output;
}


//랜덤 코드
function setCode($length = 10, $characters = "01256adfijlnps") {
 
	#random code
	$ran_code = ""; 
	$i=0;
	while($i<$length) { 
		$char = substr($characters, mt_rand(0, strlen($characters)-1), 1);  
		$ran_code .= $char;
		$i++;
	} 
	
	return $ran_code;


}

function is_rendCode($array) { 
	$isFlag = true;
	while($isFlag) { 
		$ret_code = setCode();
		if (!in_array($ret_code, $array)) {
			array_push($array, $ret_code);
			$isFlag = false;
		}

	} 
	return $ret_code;
}

?>