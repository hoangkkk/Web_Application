<?php   
include("connect.php");
if(isset($_POST['insert'])){
	$sl="insert into thongtinquanly values(Null, '{$_POST['dc']}', '{$_POST['dt']}', '{$_POST['chush']}', '{$_POST['type']}', '{$_POST['md']}', {$_POST['gia']})";
	if(mysqli_query($mysqli,$sl)){
		header("location:index.php");
	}
	else echo $sl;
}
if(isset($_POST['update'])){
	$sl="update thongtinquanly set idCN={$_POST['idCN']},  Dc_thuadat='{$_POST['dc']}', Dientich='{$_POST['dt']}', ChuHT='{$_POST['chush']}', LoaiNha='{$_POST['type']}', Md_sudung='{$_POST['md']}', Gia_tien='{$_POST['gia']}' where idCN={$_POST['idCN']}";
	if(mysqli_query($mysqli,$sl))
		header("location:index.php");
	else echo $sl;
}

?>
<?php
 if(isset($_GET['xoa'])){
	 $sl="Delete from thongtinquanly where idCN=".$_GET['xoa'];
	 if(mysqli_query($mysqli,$sl))
		header("location:index.php");
	else echo $sl;
	 }
?>












<?php
if(isset($_POST['xoanhieu'])) {
	$id_array = $_POST['check']; // return array
	$id_count = count($_POST['check']); // count array
	
	for($i=0; $i < $id_count; $i++) {
		$id = $id_array[$i];
		$query = mysqli_query($mysqli,"DELETE FROM `thongtinquanly` WHERE `idCN` = '$id'");
		if(!$query) { die(mysql_error()); }
	}
	header("Location: index.php"); // redirent after deleting
}
?>









