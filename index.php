<?php 
	include("function.php");
	 
	agza_kesgitleyji();
	$page=" ";
	if($kesgitleyji == 'bar'){
		switch($page){
		case 'vocabulary':header("Location:pages/vocabulary/vocabulary.php"); break;
		case 'gurnakcylar':header("Location:pages/home/gurnakcylar.php");break;
		default:header("Location:pages/habarlar/index.php"); break;
		}
	}else{
	    header("Location:login/index.php");
	}
?>