<?PHP

	//상점 구매 관련 PHP --> 상점에서 아이템 구매하면 여기 실행됨
	require "init.php";
	
	//유저 아이디, 돈, 템 아이디 가져옴
	$UID = $_POST["uid"];
	$money = $_POST["money"];
	$item_id = $_POST["iid"];

	$dbo = mysqli_connect("localhost","root","autoset","member_1") or die ("connect Error");

	$query = "update user set money = ".$money." where id = ".$UID; //테이블에서 해당 유저의 돈을 갱신시켜줌. (템 사서 돈 적어졌으니 새로 바꿈)
	mysqli_query($dbo,$query);
	
	//여기서부터가 문제 (이렇게 하는거 아닌거 같지만 일단은 돌아감)
	$query = "INSERT INTO user_items (user_id,item_id) VALUES (".$UID.",".$item_id.");";  //매핑 테이블에 유저 아이디, 아이템 아이디 집어넣음
	mysqli_query($dbo,$query);
	
	$query = "SELECT item_id FROM user_items WHERE user_id = ".$UID.";";  //매핑에서 유저아이디에 맞는 아이템 아이디들 가져옴
	$ret_query = mysqli_query($dbo,$query);
	
	$tmp = array();
	if($ret_query->num_rows > 0)
	{
		do
		{
			if($row = mysqli_fetch_array($ret_query)) //가져온 템 아이디들을 하나씩 아이템에 매칭시켜서 가져옴
			{
				$query2 = "select i.*, it.type_name from item as i left join item_type as it on i.type = it.id where i.id = ".$row[0].";"; //$row[0]이 템 아이디이므로 이거에 맞는 아이템을 가져옴. 타입 이름까지
				$ret_query2 = mysqli_query($dbo,$query2);

				if($ret_query2->num_rows > 0)
				{
					if($row2 = mysqli_fetch_array($ret_query2))
					{
						if(!empty($row2[0]))
						{
							unset($row2[0]);
							unset($row2[1]);
							unset($row2[2]);
							unset($row2[3]);
							unset($row2[4]);
						}
						array_push($tmp,$row2);
					}
				}
			}
			else break;
		}while(true);
	}

	$ret_json["store_data"] = $tmp;  //유니티에서 기존에 있는 클래스를 그냥 재활용하기 위해서 변수에 store가 들가있음.

	mysqli_close($dbo);
	
	echo json_encode($ret_json);

?>