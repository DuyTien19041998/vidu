<!DOCTYPE html>
<?php
    session_start();
    include("../inc/connect.inc");
?>
<html> 
<head>
    <title>Tổng quan hệ thống</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../js/jquery.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="lib/datatables.min.js"></script>
    <link href="lib/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="lib/custom.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Quản lý hệ thống</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Tổng quan</a></li>
        <li ><a href="accounts.php">Người dùng</a></li> 
        <li ><a href="spaces.php">Mặt bằng</a></li>
       
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
        <div class="col-md-12">
            <h4>Tổng quan hệ thống website</h4>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-4 infoDiv">
            <h3>Người dùng</h3>
            <div class="bigNumber"><h3>
            <?php
                $sql = "SELECT COUNT(userName) as soluong
                        FROM accounts";
                $rs = mysqli_query($con, $sql);
                if(mysqli_num_rows($rs) > 0){
                    $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                    echo $row['soluong'];
                }
                mysqli_free_result($rs);                    
                ob_flush();
            ?></h3>
            </div>
        </div>
        <div class="col-md-4 infoDiv">
            <h3>Mặt bằng</h3>
            <div class="bigNumber"><h3>
            <?php
                $sql = "SELECT COUNT(id) as soluong
                        FROM space";
                $rs = mysqli_query($con, $sql);
                if(mysqli_num_rows($rs) > 0){
                    $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                    echo $row['soluong'];
                }
                mysqli_free_result($rs);                    
                ob_flush();
            ?></h3>
            </div>
        </div>
        <div class="col-md-4 infoDiv">
            <h3>Giao dịch</h3>
            <div class="bigNumber"><h3>
                <?php
                $sql = "SELECT COUNT(rentingId) as soluong
                        FROM renting";
                $rs = mysqli_query($con, $sql);
                if(mysqli_num_rows($rs) > 0){
                    $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
                    echo $row['soluong'];
                }
                mysqli_free_result($rs);                    
                ob_flush();
            ?></h3>
            </div>
        </div>
    </div>
  
</div>
</body>
</html>