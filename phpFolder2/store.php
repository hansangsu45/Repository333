<?PHP
	
	//상점 관련 PHP --> 상점에서 버튼 클릭시 해당 아이템 타입에 맞는 아이템 목록을 보내줌(조건에도 만족하는)
	require "init.php";
	
	$type = $_POST["type"];  //띄워줄 아이템 타입 받는다.

	$dbo = mysqli_connect("localhost","root","autoset","member_1") or die ("connect Error");
	
	//아이템의 모든 데이터 정보와 아이템 타입의 이름을 가져온다. left join사용. as로 귀찮음을 덜어줌. i.type이 it.id와 같은 것을 묶어서 가져옴
	$query = "select i.*, it.type_name from item as i left join item_type as it on i.type = it.id where i.type = ".$type." and i.id % 2 = 1;";  //id를 기준으로 홀수번째 데이터만 가져오는 것이므로 이렇게 한다
	$ret_query = mysqli_query($dbo, $query);
	$tmp = array();
	
	if($ret_query->num_rows > 0)
	{
		do
		{
			if($row = mysqli_fetch_array($ret_query))
			{
				if(!empty($row[0]))  //가져온 데이터가 5개라서 unset도 5번 함
				{
					unset($row[0]);
					unset($row[1]);
					unset($row[2]);
					unset($row[3]);
					unset($row[4]);
				}
				array_push($tmp,$row);
			}
			else break;
		}
		while(true);
	}
	
	mysqli_close($dbo);

	$ret_json = array("store_data"=>$tmp);
	echo json_encode($ret_json);
	
	

?>