<?PHP

	//로그인 관련 PHP  --> 유저의 데이터(지금은 돈만)랑 아이템 타입들을 가져와서 보내준다
	require "init.php";

	//유저의 아이디와 비번을 받아온다
	$ID = $_POST["login_id"];
	$PW = $_POST["login_pw"];

	$dbo = mysqli_connect("localhost","root","autoset","member_1") or die ("connect Error");

	$query = "select money,id from user where login_id = '".$ID."' and login_pw = '".$PW."' and status > 0;";  //아이디와 비번에 맞는 유저의 돈과 아이디를 가져옴
	$ret_query = mysqli_query($dbo, $query);
	$tmp = -1;  //유저의 돈을 넣어줄거.   존재하지 않는 유저라면 -1을 유지한 채 보낸다. 그러면 이 값이 -1이면 로그인 실패라는 것을 알 수 있다
	$tmp2 = -1;  //유저 아이디 넣어줄거
	//해당 유저의 돈과 아이디 가져옴
	if($ret_query->num_rows > 0)  
	{
		 $row = mysqli_fetch_array($ret_query);

		 if(!empty($row[0]))  //array로 가져왔으니 인덱스로 가져온 것을 지운다
		 {
			unset($row[0]);
			unset($row[1]);
	     } 

		 $tmp = $row['money'];
		 $tmp2 = $row['id'];
	}

	//아이템 타입을 다 가져옴
	$query = "select * from item_type";  //아이템 타입 목록을 가져옴
	$ret_query = mysqli_query($dbo, $query);
	$arr = array();
	if($ret_query->num_rows > 0)
	{
		do
		{
			if($row = mysqli_fetch_array($ret_query))
			{
				if(!empty($row[0]))
				{
					unset($row[0]);
					unset($row[1]);
				}
				array_push($arr,$row);
			}
			else break;
		}while(true);
	}

	mysqli_close($dbo);

	//$item_type = json_encode($arr);

	echo json_encode(array("money"=>$tmp,"id"=>$tmp2,"item_type"=>$arr));  //배열에서 키에 맞는 값들을 설정해서 띄워줌. 유니티에서 받을 땐 변수명을 여기서 정한 키와 똑같이 한다
	//echo $tmp;
?>