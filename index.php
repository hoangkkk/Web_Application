<?php 
session_start();ob_start();
include("connect.php");
include("Classes/PHPExcel.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#khung{
	width: 1000px;
	margin: auto;
	background-image: url(image/the_majestic_temple_of_the_phoenix_chris_ostrowski_by_najtkriss-d8qyxk8.jpg);
}
#top{
	width: 100%;
	min-height: 70px;
	text-align: center;
	color: #F00;
	font-weight:bold;
	font-size:24px;

}
#middle{ width:100%; min-height:500px; clear:both; margin:auto;}
#bot{ width:100%; min-height:100px; clear:both; background-color: #FFF; font-weight:bold;}
#menu{ width:100%; min-height:50px; clear:both; margin-top:25px;}
a{
	color:#FFF;
	text-decoration:none;
}
a:hover{ color:#F9F;}
</style>
</head>

<body>
<div id="khung">
<div id="top"><h1>Web quản lý thữa đất</h1></div>
<div id="find" style="float:right">
  <form id="form3" name="form3" method="Post" action="index.php?id=5">
    <label for="find"></label>
    <input type="text" name="find" id="find" value="<?php if(isset($_POST["find"])) echo $_POST["find"];?>"/>
    <input type="submit" name="tk" id="tk" value="Tìm kiếm" />
  </form>
</div>

<div id="middle">
<div>
<?php 
	if(isset($_GET['id'])){
	$ts=$_GET['id'];
	switch($ts){
		case 1: include('import.php'); break;
		case 3: include('insert.php'); break;
		case 4: include('update.php'); break;
		case 5: include('find.php'); break;
		case 6: include('Delete.php'); break;
		default; break;
	}}else{
?>
<div style="text-align:center; color: #FFF; font-size:24px; font-weight:bold; clear:both;">Bảng quản lý  nhà đất</div>
  <table width="1000" border="2 solid" align="center" cellspacing="0">
    <tr style="color: #FF3">
      <th width="40" scope="col">STT</th>
      <th width="350" scope="col">Địa chỉ</th>
      <th width="145" scope="col">Diện tích</th>
      <th width="179" scope="col">Chủ sở hữu hiện tại</th>
      <th width="154" scope="col">Loại nhà</th>
      <th width="175" scope="col">Mục đích sử dụng</th>
      <th width="111" scope="col">Giá tiền</th>
      <th width="100" scope="col"><a href="index.php?id=3">Thêm</a></th>
    </tr>
    <?php
		$sl="select * from thongtinquanly order by Dc_thuadat ASC";
		$kq=mysqli_query($mysqli,$sl);
		$i=1;
		while($d=mysqli_fetch_array($kq)){
			//tạo session để lưu trữ.
			$_SESSION['idCN'][$i]=$d['idCN'];
	 ?>
    <tr style="color: #F30; text-align:center;">
      <td><?php echo $i; $i++;?></td>
      <td><?php echo $d['Dc_thuadat']?></td>
      <td><?php echo $d['Dientich']?></td>
      <td><?php echo $d['ChuHT']?></td>
      <td><?php echo $d['LoaiNha']?></td>
      <td><?php echo $d['Md_sudung']?></td>
      <td><?php echo $d['Gia_tien']?></td>
      <td align="center" style="font-weight:bold"><a href="index.php?id=4&idCN=<?php echo $d['idCN'];?>">Sửa</a> | <a href="process.php?xoa=<?php echo $d['idCN']?>">Xóa</a></td>
    </tr>
    
     <?php }?>
  </table>
  <?php }?>
</div>
</div>
<div id="menu">
  <div style="float:right"><form id="form1" name="form1" method="post" action="index.php?id=1">
    <input type="submit" name="ip" id="ip" value="Import" />
  </form></div>
   <div style="float:right; margin-right:20px;">
    <form method="post">
    	<button name="export" type="submit">Export</button>
    </form>
   </div>
   <div style="float:right; margin-right:20px;">
     <form id="form4" name="form4" method="post" action="index.php?id=6">
       <input name="xoa" type="submit" id="xoa" value="Delete" />
     </form>
   </div>
</div>
<div id="bot">
<div> Hoàng Mậu Sơn &nbsp;&nbsp;&nbsp; Mssv: 1551120044</div>
<div> Đỗ Đăng Trình &nbsp;&nbsp;&nbsp;&nbsp; Mssv: 1551120059</div>̀
<div> Lớp: CN15A</div>
</div>
</div>
</body>
</html>
<?php
	if(isset($_POST['export'])){
		$objExcel = new PHPExcel();
		$objExcel -> setActiveSheetIndex(0);
		$sheet= $objExcel -> getActiveSheet() -> setTitle('Sheet1');
		$rowCount = 1;
		$sheet -> setCellValue('A'.$rowCount,'STT');
		$sheet -> setCellValue('B'.$rowCount,'Địa Chỉ');
		$sheet -> setCellValue('C'.$rowCount,'Diện tích');
		$sheet -> setCellValue('D'.$rowCount,'Chủ sở hữu hiện tại');
		$sheet -> setCellValue('E'.$rowCount,'Loại nhà');
		$sheet -> setCellValue('F'.$rowCount,'Mục đích sử dụng');
		$sheet -> setCellValue('G'.$rowCount,'Giá tiền');
		$sheet->getColumnDimension("A")->setAutoSize(true);
		$sheet->getColumnDimension("B")->setAutoSize(true);
		$sheet->getColumnDimension("C")->setAutoSize(true);
		$sheet->getColumnDimension("D")->setAutoSize(true);
		$sheet->getColumnDimension("E")->setAutoSize(true);
		$sheet->getColumnDimension("F")->setAutoSize(true);
		$sheet->getColumnDimension("G")->setAutoSize(true);
		$result = $mysqli -> query("select * from thongtinquanly order by Dc_thuadat ASC");
		while($d1=mysqli_fetch_array($result)){
		
		$rowCount++;
		$sheet -> setCellValue('A'.$rowCount,$rowCount-1);
		$sheet -> setCellValue('B'.$rowCount,$d1['Dc_thuadat']);
		$sheet -> setCellValue('C'.$rowCount,$d1['Dientich']);
		$sheet -> setCellValue('D'.$rowCount,$d1['ChuHT']);
		$sheet -> setCellValue('E'.$rowCount,$d1['LoaiNha']);
		$sheet -> setCellValue('F'.$rowCount,$d1['Md_sudung']);
		$sheet -> setCellValue('G'.$rowCount,$d1['Gia_tien']);
			}
		
		$objwriter = new PHPExcel_Writer_Excel2007($objExcel);
		$filename= 'export.xlsx';
		$objwriter -> save($filename);
		header('Content-Disposition: attachment; filename= "' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
		header('Content-Length:' . filesize($filename));
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: no-cache');
		readfile($filename);
		return;
		}
?>














