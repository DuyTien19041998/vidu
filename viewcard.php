<?php include("header.php"); ?>
<?php
include "inc/connect.inc";
if (isset($_SESSION["userName"])) {
    $username = $_SESSION['userName'];
    echo $username;
} else {
    $username = "_guest";echo $username;
}
?>






	<h1>Danh Sách Sân Đang Đặt</h1>
	<table border=1>
		<tr>
			<th>mã thuê</th>
			<th>mã sân</th>
			<th>tên tài khoản</th>
			<th>thời gian thuê</th>
            <th>thời gian trả</th>
			<th colspan="2">function</th>
			
		</tr>


<?php

if (! $con) {
    die('false to connect DB');
} else {
    // truy vaasn co so du lieu
    $sql="SELECT * FROM `renting` WHERE userName='{$username}'";
    // hien thi utf-8

    mysqli_query($con, 'SET NAMES UTF8');
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['rentingId'];
            $hoten = $row['spaceId'];
            $diem = $row['userName'];
            $tgbd = $row['timeStart'];
            $tgkt= $row['timeEnd'];
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$hoten</td>";
            echo "<td>$diem</td>";
            echo "<td>$tgbd</td>";
            echo "<td>$tgkt</td>";
            echo "<td><a href='deletecart.php?id=$id'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "0 result";
    }
    echo "	</table>";
}


?>
	
	



<?php include("footer.php"); ?>
