<?php
if( strstr($_SERVER['HTTP_USER_AGENT'],'Android') ||
	strstr($_SERVER['HTTP_USER_AGENT'],'webOS') ||
	strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') ||
	strstr($_SERVER['HTTP_USER_AGENT'],'iPod')||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Blackberry') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'OperaMobi') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'IEMobile') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Jasmine') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Fennec') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Blazer') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Minimo') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'MOT-') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Nokia') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'SAMSUNG') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'Polaris') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'LG-') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'SonyEricsson') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'SIE-') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'AUDIOVOX') ||
	strstr($_SERVER['HTTP_USER_AGENT'], 'mobile') ||
	substr($_SERVER['HTTP_HOST'], 0,2)==='m.' ||
	substr($_SERVER['HTTP_HOST'], 0,6)==='www.m.'
)
{
	$theme = "mobile";
}
elseif (
	substr($_SERVER['HTTP_HOST'], 0,2)==='1.' ||
	substr($_SERVER['HTTP_HOST'], 0,6)==='www.1.'
)
{
	$theme = "classic01";
}
elseif (
	substr($_SERVER['HTTP_HOST'], 0,2)==='2.' ||
	substr($_SERVER['HTTP_HOST'], 0,6)==='www.2.'
)
{
	$theme = "classic02";
}
elseif (
	substr($_SERVER['HTTP_HOST'], 0,2)==='3.' ||
	substr($_SERVER['HTTP_HOST'], 0,6)==='www.3.'
)
{
	$theme = "classic03";
}
else
{
	$theme = "classic";
}
return $theme;
?>