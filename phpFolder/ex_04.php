<?PHP

	$arr = array(
		0 => array(
			'id' => 1001,
			'name' => 'Knight',
			'city' => 'seoul'
		),
		1 => array(
			'id' => 1003,
			'name' => 'Magic',
			'city' => 'busan'
		),
		2 => array(
			'id' => 1003,
			'name' => 'Magic',
			'city' => 'seoul'
		),
		3 => array(
			'id' => 1001,
			'name' => 'Knight',
			'city' => 'busan'
		)
	);

	$ret = [];
	$tmp=[];

	for($i=0; $i<count($arr); $i++){
		if(!array_key_exists($arr[$i]['id'], $tmp))
		{
			$tmp[$arr[$i]['id']] = 0;
			$ret[$arr[$i]['id']][0]=$arr[$i]['city']." ".$arr[$i]['name'];
		}
		else
		{
			$ret[$arr[$i]['id']][1]=$arr[$i]['city']." ".$arr[$i]['name'];
		}	
		    
	}
	
	echo "<pre>";
	echo print_r($ret);
	echo "</pre>";

?>