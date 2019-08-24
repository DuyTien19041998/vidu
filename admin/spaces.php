<!DOCTYPE html>
<?php
    session_start();
    include("../inc/connect.inc");
?>
<html> 
<head>
    <title>Admin - Quản lý mặt bằng</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../js/jquery.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="lib/datatables.min.js"></script>
    <link href="lib/datatables.min.css" rel="stylesheet" type="text/css"/>
    <script src="lib/custom.js"></script>
    
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Quản lý hệ thống</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Tổng quan</a></li>
        <li ><a href="accounts.php">Người dùng</a></li> 
        <li class="active"><a href="spaces.php">Mặt bằng</a></li>
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../">Trở về website</a></li>
        <li><a href="#">Giờ hệ thống: <span id="system-time"></span></a></li>
        <li><a href="#">Đăng xuất</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">

    <div class="row">
        <div class="col-md-12 content">
            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>Mã Sân</th>
                        <th>Tên Sân</th>
                        <th>Chủ sở hữu</th>
                        <th>Địa chỉ</th>
                        <th>Loại Sân</th>
                        <th>Giá thuê (vnd/h) </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT space.id, space.`name`, ownerUserName, capcity, pricePerHour,street, precinct, district, city   FROM (space JOIN 
                                    (spacedetail JOIN spaceaddress ON spacedetail.id = spaceaddress.id)
                                    ON space.id = spacedetail.id)
                                 ";
                        $rs = mysqli_query($con, $sql);
                        if(mysqli_num_rows($rs) > 0){
                            while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['ownerUserName']}</td>
                                    <td>{$row['street']}, {$row['precinct']}, {$row['district']}, {$row['city']}</td>
                                    <td>{$row['capcity']}</td>
                                    <td>{$row['pricePerHour']}</td>

                                </tr>";
                            }
                        }
                        mysqli_free_result($rs);                    
	                    ob_flush(); 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>