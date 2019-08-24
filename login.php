<?php 
if (isset($_SESSION["userName"])) {
    ?>
    <script>
    $(document).ready(function(){
        $("#login-modal").remove();
        $("#loginZone > ul.navbar-nav").html("<li>"+
        "  <li><a href='viewcard.php' id='signup'><img src='images/icon_shop.png'/></a></li>"
                            +"<li><form action='search.php' method='get'>"
                            
                            +"<button type='submit' class='hidden'>Tìm</button>"
                            +"</form></li><li><a href='profile.php'><?php echo $_SESSION["fullName"]; ?></a></li><li><a href='logout.php'>Thoát</a></li>");
    });
    </script>
<?php 
} else { ?>
<div class="login-panel modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Đăng nhập hệ thống</h3>
            </div>
            <form action="./" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" id="username"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu" id="password"/>
                    </div>
                    <div class="login-status">
                        <span class="message"></span>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="login">Đăng nhập</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>  
</div>
<script>
    $(document).ready(function(){
        $('#login').click(function() {
            var username=$("#username").val();
            var password=$("#password").val();
            $.ajax({
                url: "checkLogin.php",
                type: "POST",
                data: "name="+username+"&pwd="+password,
                success: function(html){
                    if(html == 'false'){
                        $(".login-status").html("Bạn nhập sai tên đăng nhập hoặc mật khẩu.");
                    }else if(html != null){
                        $(".login-status").text("Đăng nhập thành công.");
                        $("#login-modal").modal("toggle");
                        setTimeout(function() {
                            $("#login-modal").remove();
                        }, 1500);
                        //$("#loginZone > ul.navbar-nav").empty();
                        $("#loginZone > ul.navbar-nav").html("<li><a href=#>"+html+"</a></li><li><a href=#>Thoát</a></li>");
                        window.location.href=window.location.href;
                    }
                },
                error: function (){
                    alert('Có lỗi xảy ra');
                }
            });
        });
    });

</script>

<?php 
} ?>