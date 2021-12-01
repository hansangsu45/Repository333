<?PHP
	
	//echo "<pre>";
	//echo print_r($_SERVER);
	//echo "</pre>";
	
	$start_time = microtime();
	//define("HOST_DIR", "/host/home/liondothome/html");
	define("HOST_DIR",$_SERVER['DOCUMENT_ROOT']);
	define("ROOT_DIR", HOST_DIR."/project_02");
	define("LIB_DIR", HOST_DIR . "/lib");
	define("LOG_DIR",HOST_DIR."/_log");
	define("DEBUG_LEVEL", 1);
	
	ini_set("include_path", LIB_DIR);
    //define("LOG_DATE", "Ym");


	# ERROR 설정
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

	# PHP 환경설정
	//ini_set("include_path",LIB_DIR);
	ini_set("display_errors",DEBUG_LEVEL);

	#공통 인클루드

	require "lib.common.php";

?>