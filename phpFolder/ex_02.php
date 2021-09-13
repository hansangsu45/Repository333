<?PHP

$max_line=5;
$max=6;
$cnt_null=1;

$arr=array();

for($r=0; $r<$max_line; $r++){
	for($i=0; $i<$max; $i++){
	    if($i<$cnt_null){
			$arr[$r][$i]=" &nbsp; ";
		}
		else{
			$arr[$r][$i]=" * ";
		}
	}
	$cnt_null++;
}
$cnt_null=5;
for($r=0; $r<$max_line; $r++){
	for($i=0; $i<$max; $i++){
	    if($i<$cnt_null){
			$arr[$r][$i+6]=" &nbsp; ";
		}
		else{
			$arr[$r][$i+6]=" * ";
		}
	}
	$cnt_null--;
}

$cnt_null=5;
for($r=0; $r<$max_line; $r++){
	for($i=0; $i<$max; $i++){
	    if($i<$cnt_null){
			$arr[$r+6][$i]=" * ";
		}
		else{
			$arr[$r+6][$i]=" &nbsp; ";
		}
	}
	$cnt_null--;
}

$cnt_null=1;
for($r=0; $r<$max_line; $r++){
	for($i=0; $i<$max; $i++){
	    if($i<$cnt_null){
			$arr[$r+6][$i+6]=" * ";
		}
		else{
			$arr[$r+6][$i+6]=" &nbsp; ";
		}
	}
	$cnt_null++;
}

#출력
for($i=0; $i<12; $i++){
	for($j=0; $j<12; $j++){
		echo $arr[$i][$j];
	}
	echo "<br/>";
} 


?>


