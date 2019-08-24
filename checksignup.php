<meta charset = utf-8>
<?php
	include "inc/connect.inc";
	session_start();
	$us = $_POST["username"];
	if ($us != "") {
		$sql = "SELECT userName FROM accounts where userName = '{$us}'";
		$rs = mysqli_query($con,$sql);
		if (mysqli_num_rows($rs) > 0) {
			echo "<div class='alert alert-warning'>Tên đăng nhập đã trùng. Vui lòng chọn tên khác!</div>";
		} else {
			echo "<div class='alert alert-success'>Bạn có thể sử dụng tên đăng nhập này!</div>";
		}
	}
	else echo "<div class='alert alert-warning'>Bạn chưa nhập tên đăng nhập</div>";
?>