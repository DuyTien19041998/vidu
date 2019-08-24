<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
	include "inc/connect.inc";
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$fullname = $_POST["fullname"];
	$phone = $_POST["phone"];

// kiem tra ten user da ton dai chua
$sql="SELECT * FROM `accounts` WHERE userName='{$username}'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$usernamedb = $row['userName'];
	}
}
if($usernamedb==$username)//neu ten dn ton tai cap nhat
{
	$sql ="UPDATE `accounts` SET `email` = '{$email}', `fullName`='{$fullname}',`password`='{$password}',`phone`='{$phone}' WHERE `accounts`.`userName` = '{$username}';";
	if(mysqli_query($con,$sql)){
		echo "<script type='text/javascript'>alert('Cập nhập tài khoản thành công');</script>";
        header("Refresh:1; url=index.php",true,303);
	}
}
else{	$sql = "INSERT INTO accounts (userName,fullName,password,email,phone) 
				VALUES ('{$username}','{$fullname}','{$password}','{$email}','{$phone}')";
    if(mysqli_query($con,$sql)){
        echo "<script type='text/javascript'>alert('Đăng ký thành công.\nVui lòng đăng nhập bằng tài khoản mới! ');</script>";
        header("Refresh:1; url=index.php",true,303);
    }else{
        echo "<script type='text/javascript'>alert('Đã xảy ra lỗi. Mời thử lại!');</script>";
        header("Refresh:1; url=signup.php",true,303);
	}}
	
?>
</body>
</html>