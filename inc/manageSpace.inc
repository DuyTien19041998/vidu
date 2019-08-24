
<?php
$hd1 = '<table class="table table-hover"> 
                <tr>
                <th width="20%">Tên địa điểm:</th>
                <th width="20%">Tên người thuê:</th>
                <th width="20%">Địa chỉ:</th>
                <th width="10%">Thời gian bắt đầu: </th>
                <th width="10%">Thời gian kết thúc: </th>
                <th>Lựa chọn</th>
                </tr>';
echo $hd1;
while( $row = mysqli_fetch_array($rs_1) ) {
    $ct1 = "<tr>
                <td>{$row["name"]} </td>
                <td>{$row["fullName"]} </td>
                <td>{$row["street"]}, {$row["precinct"]}, {$row["district"]}, {$row["city"]}, </td>
                <td>{$row["timeStart"]}</td>
                <td>{$row["timeEnd"]}</td>";
        if($row["acceptStatus"] == '0'){
                $ct1 .= "<td><button class='btn btn-success btn-sm rentingAction' data-status='agree' data-space-id='{$row["rentingId"]}'>Đồng ý</button>
                    <button class='btn btn-danger btn-sm rentingAction' data-status='disagree' data-space-id='{$row["rentingId"]}'>Hủy</button>";
        }else if($row["acceptStatus"] == '1'){
                $ct1 .= "<td>Đã chấp nhận</td>";
        }else{
                $ct1 .= "<td>Đã hủy</td>";
        }
    
    $ct1 .=     "</td>
                </tr>";
    echo $ct1;		
}
$ft1 = "</table>";
echo $ft1;
?>