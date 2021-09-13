<?PHP

	$num=5;

	for($i=0; $i<$num; $i++){
		Triangle2($num,$i);
		Triangle2($num,$num-$i-1);
		 echo "<br/>";
	}
	
	
	
	for($i=0; $i<$num; $i++){
		Triangle($num,$num-$i);
		Triangle($num,$i+1);
		echo "<br/>";
	}


	function Triangle($count, $i)
	{
		for($j=0; $j<$count; $j++){
			if($j<$i) echo "*";
			else echo "&nbsp";
		}
		
	}

	function Triangle2($count, $i)
	{
		for($j=0; $j<$count; $j++){
			if($j<$i) echo "&nbsp";
			else echo "*";
		}
		
	}




?>


