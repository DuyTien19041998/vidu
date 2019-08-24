<?php
$hd0 = '<table class="table table-hover"> 
		<tr> 
		<th>Mã mặt bằng</th>
		<th>Tên mặt bằng</th> 
		<th>Địa chỉ</th> 
		<th>Thời gian bắt đầu</th>
		<th>Thời gian kết thúc</th> 
		<th>Trạng thái</th> 
		</tr>';
echo $hd0;
while( $row = mysqli_fetch_array($rs_0) ) {
    $ct0 = "<tr>
            <td>  {$row["spaceId"]}</td>
            <td>  {$row["name"]} </td>
            <td>  {$row["street"]}, {$row["precinct"]}, {$row["district"]}, {$row["city"]}</td>
            <td>  {$row["timeStart"]} </td>
            <td>  {$row["timeEnd"]} </td>
            <td>  ".($row["acceptStatus"]==0?"Đang chờ chấp nhận":($row["acceptStatus"]==1?"Đã chấp nhận thuê":"Không chấp nhận"))." </td>
            </tr> ";
    echo $ct0;		
}
$ft0 = '</table>';
echo $ft0;
?>