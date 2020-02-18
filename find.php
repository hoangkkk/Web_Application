<?php 

if(isset($_POST['find'])){?>
<div style="text-align:center; color:#F00; font-size:24px; font-weight:bold; clear:both;">Kết Quả Tìm Kiếm</div>
<table width="1000" border="1" cellspacing="0" align="center">
  <tr style="color: #FF3">
    <th width="53" scope="col">STT</th>
    <th width="233" scope="col">Địa chỉ thửa đất</th>
    <th width="79" scope="col">Diện tích </th>
    <th width="107" scope="col">Chủ sở hữu</th>
    <th width="119" scope="col">Loại nhà</th>
    <th width="205" scope="col">Mục đích</th>
    <th width="81" scope="col">Giá</th>
    <th width="71" scope="col">&nbsp;</th>
  </tr>
  <?php 
  	$tk=$_POST['find'];
	$sl="select* from thongtinquanly where ChuHT like '%$tk%' or Gia_tien like '%$tk%' or Dc_thuadat like '%$tk%' or LoaiNha like '%$tk%' or Dientich like '%$tk%'";
	$kq=mysqli_query($mysqli,$sl);
	$kq1=mysqli_query($mysqli,"select* from thongtinquanly");
	$sd=mysqli_num_rows($kq1);
	while($d=mysqli_fetch_array($kq)){
?>

  <tr style="color:#F30; text-align:center;">
    <td><?php 
	for($i=1;$i<=$sd;$i++){
		if($_SESSION['idCN'][$i]==$d['idCN'])
					echo $i;}
					
	?>
    </td>
    <td><?php echo $d['Dc_thuadat'];?></td>
    <td><?php echo $d['Dientich'];?></td>
    <td><?php echo $d['ChuHT'];?></td>
    <td><?php echo $d['LoaiNha'];?></td>
    <td><?php echo $d['Md_sudung'];?></td>
    <td><?php echo $d['Gia_tien'];?></td>
    <td align="center" style="font-weight:bold"><a href="index.php?id=4&idCN=<?php echo $d['idCN'];?>">Sửa</a> | <a href="process.php?xoa=<?php echo $d['idCN']?>"></a></td>
  </tr>
  <?php }?>
</table>
<?php }?>