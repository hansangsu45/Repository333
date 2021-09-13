<?PHP
	
   $t=calc(12,4,'/');

   echo $t;


   function calc($a, $b, $x)
   {
	   $s="연산하신 결과는 : ".$a.$x.$b.' = ';
		if($x=='+')
	    {
			return $s.($a+$b);
		}
		else if($x=='-')
	    {
			return $s.($a-$b);
	    }
	   else if($x=='*')
	   {
			return $s.($a*$b);
	   }
	   else if($x=='/')
	   {
			return $s.($a/$b);
	   }
	   else {
		   return "잘못된 접근";
	   }
   }

?>