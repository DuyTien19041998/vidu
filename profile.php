
<?php
include("header.php");
include("inc/connect.inc");
?>
<?php

if (isset($_SESSION["userName"])) {
    $username = $_SESSION["userName"];
    if ($username == "admin") {
        header("Location: admin/index.php");
    }
    $sql_getProfile = "SELECT fullName,email,phone,userName
                            FROM accounts INNER JOIN space
                            WHERE accounts.userName = '{$username}'";
    $rs_getProfile = mysqli_query($con, $sql_getProfile);
    $row_getProfile = mysqli_fetch_assoc($rs_getProfile);
    $fullname = $row_getProfile['fullName'];
    $email = $row_getProfile['email'];
    $phone = $row_getProfile['phone'];
    ?>

<div class="container">
    <h2>Trang cá nhân</h2>
    <ul class="nav nav-tabs">
        <!-- <li> <a data-toggle="tab" href="#prosfile">Thông tin cơ bản</a></li> -->
        <li class="active"><a data-toggle="tab"  href="#menu0">Thông tin cá nhân</a></li>
        <li><a data-toggle="tab" href="#menu1">Quản lý mặt bằng</a></li>
       
    </ul>

    <div class="tab-content">
        <div id="menu0" class="tab-pane fade in active">
            <div class="panel panel-default">
                <div class="panel-heading">Thông tin chủ sở hữu</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Họ và Tên</th>
                            <td><?php echo $fullname; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <th>Điện Thoại</th>
                            <td><?php echo $phone; ?></a></td>
                    </tr>
                </table>
        </div>
    </div>
</div>

<div id="menu1" class="tab-pane fade">
    <h3>Quản lý mặt bằng</h3>
    
    <a href="postSpace.php" class="btn btn-primary text-right">+ Thêm mặt bằng mới</a>
    <?php
    $sql = "SELECT a.id,a.name,b.street,b.precinct,b.district,b.city
                FROM space as a INNER JOIN spaceaddress as b ON a.id = b.id
                WHERE a.ownerUserName='{$username}'";

    $rs = @mysqli_query($con, $sql);
    if ($rs && mysqli_num_rows($rs) > 0) {
        include("inc/manage.inc");
    } else {
        echo "<div class='alert alert-info'>Bạn chưa có mặt bằng nào cả.</div>";
    }
    ?>
</div>

</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $(".rentingAction").click(function(){
            var status = $(this).data("status");
            var spaceId = $(this).data("spaceId");
            console.log(status + " " + spaceId);
            var agree = confirm("Xác nhận?");
            if (agree == true) {
                $.ajax({
                    method: "POST",
                    url: "inc/rentingConfirm.php",
                    data: { status: status, spaceId: spaceId }
                })
                    .done(function( msg ) {
                    alert("Hoàn tất.");
                });
            }
        });
    });
    $('.nav-tabs a').click(function(){
        $(this).tab('show');;
    })

    // Select tab by name
    $('.nav-tabs a[href="#menu0"]').tab('show');

    // Select first tab
    $('.nav-tabs a:first').tab('show');

    // Select last tab
    $('.nav-tabs a:last').tab('show');

    // Select fourth tab (zero-based)
    $('.nav-tabs li:eq(3) a').tab('show');

</script>


<?php
include("footer.php");
?>
<?php

} else {
    echo "Lỗi";
}
?>
