<?php
	header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
	header("Pragma: no-cache"); // HTTP/1.0
	
	$url = "http" . (($_SERVER['SERVER_PORT']==443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if($url == base_url('index.php/login') || 
       $url == base_url('') || 
	   $url == base_url('index.php/changepassword'))
	{
		if(substr($url, 0, 4) == 'http')
		{
			$url = str_replace('http', 'https', $url);	
			header('location:'.$url);
		}
	}
?>

