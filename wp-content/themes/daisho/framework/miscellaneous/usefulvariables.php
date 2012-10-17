<?php
	global $mobile;
	global $ipad;
	global $desktop;
	global $demoServer;
	global $ie;
	global $ie6;
	global $ie7;
	global $ie8;
	
	if($_SERVER['SERVER_NAME'] == 'themes.devatic.com'){ $demoServer = true; }else{ $demoServer = false; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){ $ipad = true; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone')){ $mobile = true; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPod')){ $mobile = true; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'Android')){ $mobile = true; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'MSIE')){ $ie = true; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 6')){ $ie6 = true; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 7')){ $ie7 = true; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'MSIE 8')){ $ie8 = true; }
	if(!$mobile AND !$ipad){ $desktop = true; }
?>