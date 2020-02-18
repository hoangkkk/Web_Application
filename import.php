<div>
<form method="post" enctype="multipart/form-data" action=""> 
<input type="file" name="file" />
<button type="submit" name="up">Import</button></form>
<div>
<?php 
include("connect.php");
if(isset($_POST['up'])){
	$file=$_FILES['file']['tmp_name'];
	//echo $file; kt import dc hay ko?
	//khoi tao doi tuong reader
	$objReader=PHPExcel_IOFactory::createReaderForFile($file);
	$objReader -> setLoadSheetsOnly('Sheet1');// load sheet1
	$objExcel= $objReader -> Load($file);
	// đưa dữ liệu vào kiểu mảng
	$sheetData= $objExcel->getActiveSheet()->toArray('null', true, true, true, true, true, true, true);
	
	//print_r($sheetData);
	
	//lấy giá trị dòng cao nhất
	$HighestRow= $objExcel-> setActiveSheetIndex()->getHighestRow();
	//echo $HighestRow;
	for($row=2;$row<=$HighestRow;$row++){
		$DC= $sheetData[$row]['B'];
		$DT= $sheetData[$row]['C'];
		$Chu= $sheetData[$row]['D'];
		$Loai= $sheetData[$row]['E'];
		$MD= $sheetData[$row]['F'];
		$Gia= $sheetData[$row]['G'];
		
	/*	echo $STT;
		echo $DC;
		echo $DT;
		echo $Chu;
		echo $Loai;
		echo $MD;
		echo $Gia;
		*/
		// insert vao SQL
		$sql="insert into thongtinquanly(idCN, Dc_thuadat, Dientich, ChuHT, LoaiNha, Md_sudung, Gia_tien) values(Null,'$DC','$DT','$Chu','$Loai','$MD',$Gia)";
		$mysqli->query($sql);
	}
	echo '<font color="#000000" size="+1">import thành công!!!</font>'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'<a href="index.php"><font color="#FF0000" size="+1">trang chủ</font></a>';
}
?>



