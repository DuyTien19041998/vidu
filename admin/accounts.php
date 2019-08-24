<!DOCTYPE html>
<?php
    session_start();
    include("../inc/connect.inc");
?>
<html> 
<head>
    <title>Admin - Quản lý người dùng</title>
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
        <li class="active"><a href="accounts.php">Người dùng</a></li> 
        <li><a href="spaces.php">Mặt bằng</a></li>
           
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
    </div>
    <div class="row">
        <div class="col-md-12 content">
            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT userName, fullName, email, phone FROM accounts";
                        $rs = mysqli_query($con, $sql);
                        if(mysqli_num_rows($rs) > 0){
                            while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
                                echo "<tr>
                                    <td>{$row['userName']}</td>
                                    <td>{$row['fullName']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone']}</td>
                                    <td><a href='delete.php?userName={$row['userName']}'>delete</a></td>
                                    <td><a href='edit.php?userName={$row['userName']}'>edit</a></td>
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