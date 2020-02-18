<?php 
	$sl='select* from thongtinquanly where idCN='.$_GET['idCN'];
	$kq=mysqli_query($mysqli,$sl);
	$d=mysqli_fetch_array($kq);
?>
<div style=" margin:auto;">
<h1 align="center"> Sửa thữa đất</h1>
<form id="form1" name="form1" method="Post" action="process.php">
  <table width="822" border="0">
    <tr>
      <th width="212" scope="row">Địa chỉ</th>
      <td width="594"><p>
        <label for="dc"></label>
        <input name="dc" type="text" id="dc" size="50" value="<?php echo $d['Dc_thuadat'];?>">
        
      </p></td>
    </tr>
    <tr>
      <th scope="row">Diện tích</th>
      <td><p>&nbsp;
        </p>
        <p>
          <label for="dt"></label>
          <input type="text" name="dt" id="dt" value="<?php echo $d['Dientich'];?>" />
        </p>
        <p>&nbsp; </p></td>
    </tr>
    <tr>
      <th scope="row">Chủ sở hữu hiện tại</th>
      <td><p>
        <label for="chush"></label>
        </p>
        <p>
          <input type="text" name="chush" id="chush" value="<?php echo $d['ChuHT'];?>"/>
        </p>
        <p>&nbsp; </p></td>
    </tr>
    <tr>
      <th scope="row">Loại nhà</th>
      <td><p>
        <label for="type"><br />
        </label>
        <input type="text" name="type" id="type"  value="<?php echo $d['LoaiNha'];?>"/>
      </p>
        <p>&nbsp; </p></td>
    </tr>
    <tr>
      <th scope="row">Mục đích sử dụng</th>
      <td><p>
        <label for="md"></label>
        </p>
        <p>
          <input name="md" type="text" id="md" size="50" value="<?php echo $d['Md_sudung'];?>"/>
        </p>
        <p>&nbsp; </p></td>
    </tr>
    <tr>
      <th scope="row">Giá tiền</th>
      <td><p>
        <label for="gia"></label>
        </p>
        <p>
          <input type="text" name="gia" id="gia" value="<?php echo $d['Gia_tien'];?>" />
        </p>
        <p>&nbsp; </p></td>
    </tr>
    <tr>
      <th scope="row" colspan="2"><p>&nbsp;
        </p>
        <p>&nbsp;</p>
        <p>
          <input type="submit" name="update" id="update" value="Update" />
        </p></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  <input type="hidden" name="idCN" id="idCN" value="<?php echo $d['idCN'];?>"/>
</form>
</div>
