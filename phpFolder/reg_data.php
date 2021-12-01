<?
	require "init.php";

	$table_name = "tb_users";
	$dbo = mysqli_connect("localhost", "root", "autoset", "project02");
	$query ="
		select * from " . $table_name . " WHERE status > 0;
	";
	$ret = mysqli_query($dbo, $query);
	
	$ret_array = array();
	if($ret->num_rows > 0) {
		//data 존재
 
		while($row = mysqli_fetch_array($ret)) { 
			array_push($ret_array, $row);
		} 
	} else {
		//data 없다
		$ret_select = "0 Result";
	} 
?>
<HTML>
<Body>
<Form method="POST" action="reg_process.php">
	UserID : 
	<SELECT name="id">
		<Option value="0">신규 유저</OPtion> 
		<!-- 반복문 시작 -->
		<?PHP
			foreach($ret_array as $key => $val) {
				
		
		?> 
				<Option value="<?PHP echo $val["id"] .  "_"  . $val["count"]?>"><?PHP echo $val["user_id"] ?></OPtion>  
		<?PHP
			} 
		?> 
		<!-- 반복문 종료 -->
	</SELECT>
	<input type="submit" value="등록">
</Form>
</BODY>
</HTML> 