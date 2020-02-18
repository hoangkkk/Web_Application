<?php
	$mysqli = mysqli_connect('localhost','root','','quanlynhadat');
	$mysqli->set_charset('utf8');
	if(mysqli_connect_errno()){
		echo 'loi: '.mysqli_connect_error();
		exit;
		
	}
?>