<?

	require "init.php";

	$reg_post = $_POST;
	//$login_id = (empty($ret_post["login_id"]))?"test_id":$ret_post["login_id"];
	//$login_pw = (empty($ret_post["login_pw"]))?"1234":$ret_post["login_pw"];
	$login_id = $_POST["login_id"];
	$login_pw = $_POST["login_pw"];

	$dbo = mysqli_connect("localhost","root","autoset","project02") or die ("connect Error");
		
	$is_ID_dbo = "select count(*) as cnt from tb_Members where status > 0 and login_id = '".$login_id."';";
	//$is_ID_dbo = "Select count(*) as cnt From tb_Members;";
	//$is_ID_dbo = "select login_id,login_pw from tb_Members where status>0";
	$is_ID_ret = mysqli_query($dbo, $is_ID_dbo);
	
	$test = "1";

	if($is_ID_ret->num_rows > 0)
	{
		$is_ID_value = mysqli_fetch_assoc($is_ID_ret);
	}

	$query = "Insert Into tb_Members (login_id,login_pw,status) Values ('".$login_id."','".$login_pw."',1);";
	if($is_ID_value["cnt"] >0)
	{
		$query = "Update tb_Members Set login_pw='".$login_pw."' Where login_id= '".$login_id."';";
	}

	$ret_query = mysqli_query($dbo,$query);

	mysqli_close($dbo);
	
	$test .=  $login_id.$login_pw;
	echo $test;

	/*$ret_arr = array();

	if($is_ID_ret->num_rows > 0)
	{
		while($row=mysqli_fetch_assoc($is_ID_ret))
		{
			array_push($ret_arr,$row);
		}
	}
	
	p($ret_arr);*/
	//p(json_encode( $ret_arr ));

?>