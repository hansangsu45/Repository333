<?PHP

	$var=[];

    Triangle1(5);
	
	for($i=0; $i<count($var); $i++){
	    echo $var[$i];
	}

		echo "&nbsp";
	
	foreach($var as $key => $value)
	{
		echo $var[$key];
	}
	


function Triangle1($count)
{
	 global $var;
	 $num=0;
   for($r=0; $r<$count; $r++)
   {
		$max = $r+1;

		for($i=0; $i<$max; $i++){
			$var[$num] = "&nbsp";
			$num++;
		}

		$max = $count-$r;
		for($i=0; $i<$max; $i++){
			$var[$num]= "*";
			$num++;
		}

		$max = $count-$r;
		for($i=0; $i<$max; $i++){
			$var[$num]= "&nbsp";
			$num++;
		}

		$max = $r+1;
		for($i=0; $i<$max; $i++){
			$var[$num]= "*";
			$num++;
		}

		$var[$num]= "<br />";
		$num++;
      }
   

   for($r=0; $r<$count; $r++)
   {
		$max = $count-$r;

		for($i=0; $i<$max; $i++){
			$var[$num]= "*";
			$num++;
		}

		$max = $r+1;
		for($i=0; $i<$max; $i++){
			$var[$num]= "&nbsp";
			$num++;
		}

		$max = $r+1;
		for($i=0; $i<$max; $i++){
			$var[$num]= "*";
			$num++;
		}

		$max = $count-$r;
		for($i=0; $i<$max; $i++){
			$var[$num]= "&nbsp";
			$num++;
		}

		$var[$num]= "<br />";
		$num++;
     }
   
 }

?>


