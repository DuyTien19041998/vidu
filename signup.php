<?php include("header.php"); ?>
<div id="body">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2>Đăng ký</h2>
            <form class="form-horizontal" id="form" method="POST" action="update.php" role="form">
                <div id="result"></div>
                <div class="form-group">
                    <label for="username">Tên Đăng Nhập</label>
                    <input type="text" name="username" id="us" class="form-control" placeholder="Tên đăng nhập" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" name="password" id="pw" class="form-control" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                </div>
                <div class="form-group">
                    <label for="retypepassword">Nhập lại mật khẩu</label>
                    <input type="password" name="retypepassword" class="form-control" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="rpw" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="em" class="form-control" placeholder="yourmail@example.com" required>
                </div>
                <div class="form-group">
                    <label for="fullname">Tên đầy đủ</label>
                    <input type="text" name="fullname" id="fn" class="form-control" placeholder="Nguyễn Văn A" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" id="ph" class="form-control" placeholder="0900-123-456">
                </div>
                <div class="form-group">
                    <input type="submit" id="submit" class="btn btn-success" value="Đăng ký">
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script>
	$(document).ready(function(){
		// Kiểm tra mật khẩu
		$("#rpw").blur(function(){
			if ($("#rpw").val() != $("#pw").val()) {
				alert("Mật khẩu nhập lại không đúng");
				$("#rpw").val("");
				$("#pw").val("");
			};
		});
		// Kiểm tra đã nhập đủ thông tin cần thiết chưa
		$("#submit").click(function(){
			if ($("#us").val() == "" || $("#pw").val() == "" || $("#rpw").val() == "" || $("#em").val() == "") {
				alert("Bạn chưa nhập đủ thông tin !");
				return false;
			};
		});
		// kiểm tra tên đăng nhập đã có chưa
		$("#us").blur(function(){
			$.ajax({
				type : "post",
				url : "checksignup.php",
				data :{
					username : $("#us").val()
				},
				success : function(result){
					$("#result").html(result);
					console.log($("#result").html(result));
				},
				dataType : "text"
			});
		});
	});
</script>
<?php include("footer.php"); ?>