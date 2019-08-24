<?php
$sql = "SELECT a.name, d.fullName,c.street,c.precinct,c.district,c.city, e.timeStart, e.timeEnd
                      FROM space as a INNER JOIN renting as b ON a.id = b.spaceid
                                      INNER JOIN accounts as d ON d.userName = b.userName 
                                      INNER JOIN spaceaddress as c ON a.id = c.id 
                                      INNER JOIN renting as e ON e.spaceId = a.id
                      WHERE a.ownerUserName='cntan'";
$rs  = @mysqli_query($con,$sql);
if($rs && mysqli_num_rows($rs) > 0) {
	$hd = '<table class="table table-hover"> 
                <tr>
                
                <th>Tên địa điểm:</th>
                <th>Tên người thuê:</th>
                <th>Địa chỉ:</th>
                <th>Thời gian bắt đầu:</th>
                <th>Thời gian kết thúc:</th>
                </tr>
                <tr>
                <th>Lựa chọn</th>
                <td><button type="button" class="btn btn-success">Cha</button>
                    <button type="button" class="btn btn-danger">Hủy</button>
                </td>
                </tr>

                
                
                </thead>
                <tbody>';
	echo $hd;
	$tt = 1;
	while($row = mysqli_fetch_array($rs) ) {
	$ct = "<tr>
                
                <td>{$row["name"]} </td>
                <td>{$row["fullName"]} </td>
                <td>{$row["street"]}, {$row["precinct"]}, {$row["district"]}, {$row["city"]}, </td>
                <td>{$row["timeStart"]}</td>
                <td>{$row["timeEnd"]}</td>

                </tr>
                </tbody>"
                ;
				$tt++;
		$tt++;
	echo $ct;
	}
	
	 $ft = '</table>';
 	echo $ft;
 	mysqli_free_result($rs);
 	mysqli_close($con);
}
	else echo "Lỗi";
?>
