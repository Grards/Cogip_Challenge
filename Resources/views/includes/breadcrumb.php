<?php 
$page = $_SERVER['PHP_SELF'];
$currentpage = ucwords(str_replace("-"," ",(basename($page,".php"))));
$currentdir = ucwords(basename(dirname($page)));
$topdir = basename(dirname(dirname($page)));
?>