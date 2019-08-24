
<?php
$hd = '<table class="table table-hover"> 
		<tr> 
		<th>Mã mặt bằng:</th>
		<th>Tên mặt bằng: </th> 
		<th>Địa chỉ:  </th> 
        </tr>';
echo $hd;
while( $row = mysqli_fetch_array($rs) ) {
    $ct = "<tr>
		<td>	{$row["id"]} </td>
		<td>	{$row["name"]} </td>
		<td>  {$row["street"]}, {$row["precinct"]}, {$row["district"]}, {$row["city"]}</td>
		</tr> ";
    echo $ct;		
}

$ft = '</table>';
echo $ft;
?>