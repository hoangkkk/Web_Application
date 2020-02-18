<?php
	include("../connect.php");
	$sl='select* from thongtinquanly';
	$kq=mysqli_query($mysqli,$sl);
	$i=0;
	
	while($d=mysqli_fetch_array($kq)){
		//echo $d['Dc_thuadat'];
		$array=explode(' ', $d['Dc_thuadat']);
		$sonha[$i]=$array[0];
		$i++;
	}
	// lấy số nhà
	$sd=mysqli_num_rows($kq);
	for($j=0;$j<$sd; $j++){
		echo $sonha[$j].'<br>';
		echo bin2hex("$sonha[$j]").'<br>'.'<br>';
	}
	
	
	
	
	
	
	
	
	
	
	//echo $array;
  
// Mỗi khoảng trắng sẽ là một phần tử trong mảng<br />
/*$array=explode(' ', $str);
$skt=str_word_count($str);
for($i=0; $i<=$skt-1 ;$i++){
	echo $array[$i].'<br>';
}*/
?>
<?php
 /*function build_heap(&$array, $i, $t){
  $tmp_var = $array[$i];    
  $j = $i * 2 + 1;

  while ($j <= $t)  {
   if($j < $t)
    if($array[$j] < $array[$j + 1]) {
     $j = $j + 1; 
    }
   if($tmp_var < $array[$j]) {
    $array[$i] = $array[$j];
    $i = $j;
    $j = 2 * $i + 1;
   } else {
    $j = $t + 1;
   }
  }
  $array[$i] = $tmp_var;
 }

 function heap_sort(&$array) {
  $init = (int)floor((count($array) - 1) / 2);
  for($i=$init; $i >= 0; $i--){
   $count = count($array) - 1;
   build_heap($array, $i, $count);
  }

  for ($i = (count($array) - 1); $i >= 1; $i--)  {
   $tmp_var = $array[0];
   $array [0] = $array [$i];
   $array [$i] = $tmp_var;
   build_heap($array, 0, $i - 1);
  }
 }

// Demo
$array = array(9,8,7,6,5,4,3,2,1,0,10,1000,0);
heap_sort($array);
    var_dump($array);*/
?>