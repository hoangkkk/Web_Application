
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"             
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                     
            });       
        }
    });
  
});
</script>
<div id="find" style="float:left">
  <form id="form3" name="form3" method="Post" action="">
    <label for="find"></label>
    <font color="#F4D5FF">Nhập Từ khóa liên quan bạn muốn xóa:</font> 
    <input type="text" name="find" id="find" />
    <input type="submit" name="tk" id="tk" value="Tìm kiếm" />
  </form>
<form id="form" name="form" method="Post" action=" process.php">
</div>

<?php 

if(isset($_POST['find'])){?>
<div style="text-align:center; color:#F00; font-size:24px; font-weight:bold; clear:both;">Kết Quả Tìm Kiếm</div>
<table width="1000" border="1" cellspacing="0" align="center">
  <tr style="color: #FF3">
  <th width="74" scope="col">Select all <input type="checkbox" id="selecctall"/></th>
    <th width="39" scope="col">STT</th>
    <th width="212" scope="col">Địa chỉ thửa đất</th>
    <th width="76" scope="col">Diện tích </th>
    <th width="102" scope="col">Chủ sở hữu</th>
    <th width="114" scope="col">Loại nhà</th>
    <th width="195" scope="col">Mục đích</th>
    <th width="77" scope="col">Giá</th>
    <th width="73" scope="col">&nbsp;</th>
  </tr>
  <?php 
  	$tk=$_POST['find'];
	$sl="select* from thongtinquanly where ChuHT like '%$tk%' or Gia_tien like '%$tk%' or Dc_thuadat like '%$tk%' or LoaiNha like '%$tk%' or Dientich like '%$tk%'";
	$kq=mysqli_query($mysqli,$sl);
	$i=1;
	while($d=mysqli_fetch_array($kq)){
?>

  <tr style="color:#F30; text-align:center;">
  	<td><div align="center">
  	  <input class="checkbox1" type="checkbox" name="check[]" id="check" value="<?php echo $d['idCN'];?>">
    </div></td>
    <td><?php echo $i; $i++;?></td>
    <td><?php echo $d['Dc_thuadat'];?></td>
    <td><?php echo $d['Dientich'];?></td>
    <td><?php echo $d['ChuHT'];?></td>
    <td><?php echo $d['LoaiNha'];?></td>
    <td><?php echo $d['Md_sudung'];?></td>
    <td><?php echo $d['Gia_tien'];?></td>
    <td align="center" style="font-weight:bold"><a href="process.php?xoa=<?php echo $d['idCN']?>">Xóa</a></td>
  </tr>
  <?php }?>
</table>
<div align="center">

  <input name="xoanhieu" type="submit" value="Delete" id="xoanhieu">
</div>
  <?php }?>
</form>











