<?PHP
	require "init.php";

	$ret_post = $_POST;
	errorLog("UnityLog",$ret_post, 0);
 
 	$table_name = $_POST["table_name"];
 	$table_name = "tb_UserInfos";
	$login_id = $_POST["login_id"];
	
	$array = array();

	
	$dbo = mysqli_connect('localhost', 'root', 'autoset', 'project02');
	
	$query = "
		SELECT login_id, password From " . $table_name . " Where status > 0";
	$ret_query = mysqli_query($dbo, $query);
	$jsonArray = array();
	if($ret_query->num_rows > 0) { 
		while($row=mysqli_fetch_assoc($ret_query))
		{
			array_push($jsonArray,$row);
		}
	}
	else{
		$ret_cnt=0;
	}

	$ret_query = mysqli_query($dbo,$query);
	mysqli_close($dbo);

	$ret_array = array("result"=>true, "jsonInfo"=>$jsonArray);

	$jsonret = json_encode($ret_array);
	echo $jsonret;
	 
?>