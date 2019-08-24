<?php include("header.php"); ?>

<?php
include "inc/connect.inc";
if (isset($_SESSION["userName"])) {
    $username = $_SESSION['userName'];
} else {
    $username = "_guest";
}
if (isset($_GET["id"])) {
    $id = $_GET['id']; // location id
} else $id = 1;
$sql_getSpaceDetail = "SELECT space.name, address.street,address.precinct,address.district,address.city,detail.capcity,detail.pricePerHour,jpg
FROM spaceaddress as address INNER JOIN spacedetail as detail INNER JOIN image INNER JOIN space
ON address.id = {$id} AND detail.id = {$id} AND image.id = {$id} AND space.id = {$id}";
// "SELECT space.name, address.street,address.precinct,address.district,address.city,detail.capcity,detail.pricePerHour,detail.area,jpg
//                             FROM spaceaddress as address INNER JOIN spacedetail as detail INNER JOIN image INNER JOIN space
//                             ON address.id = {$id} AND detail.id = {$id} AND image.id = {$id} AND space.id = {$id}";
$rs_getSpaceDetail = mysqli_query($con, $sql_getSpaceDetail);
$row_getSpaceDetail = mysqli_fetch_assoc($rs_getSpaceDetail);
    //print_r($row);
$spacename = $row_getSpaceDetail['name'];
$street = $row_getSpaceDetail['street'];
$precinct = $row_getSpaceDetail['precinct'];
$district = $row_getSpaceDetail['district'];
$city = $row_getSpaceDetail['city'];
$capcity = $row_getSpaceDetail['capcity'];
$pricePerHour = $row_getSpaceDetail['pricePerHour'];
#$area = $row_getSpaceDetail['area'];
$img = $row_getSpaceDetail['jpg'];
$img_arr = explode("-", $img);
    //print_r($img_arr);
$sql_getOwnerOfSpace = "SELECT ownerUserName FROM space WHERE space.id = {$id}";
$rs_getOwnerOfSpace = mysqli_query($con, $sql_getOwnerOfSpace);
$row_getOwnerOfSpace = mysqli_fetch_assoc($rs_getOwnerOfSpace);
$ownerUserName = $row_getOwnerOfSpace['ownerUserName'];
$sql_getOwnerDetail = "SELECT fullName,email,phone,userName
                            FROM accounts INNER JOIN space
                            WHERE accounts.userName = '{$ownerUserName}'";
$rs_getOwnerDetail = mysqli_query($con, $sql_getOwnerDetail);
$row_getOwnerDetail = mysqli_fetch_assoc($rs_getOwnerDetail);
$fullname = $row_getOwnerDetail['fullName'];
$email = $row_getOwnerDetail['email'];
$phone = $row_getOwnerDetail['phone'];

?>

<div class="container">
    <!-- current path -->
    <div class="nav-current-path">
        <a href="index.php">Trang chủ</a> &gt; 
        Xem chi tiết
    </div>
    <!-- main -->
    <div class="row" id="placeDetailPanel">
        <!-- left side -->
        <div class="col-md-8">
            <h1><?php echo $spacename; ?></h1>
            <?php
            echo "<h2 class='place-address'><small><span class='glyphicon glyphicon-map-marker'></span>{$street}, {$district}, {$city}</small></h2>";
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">Thông tin chi tiết</div>
                <div class="panel-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <?php
                        $st = "<ol class='carousel-indicators'>";
                        $st .= "<li data-target='#myCarousel' data-slide-to='0' class='active'></li>";
                        for ($i = 1; $i < count($img_arr); $i++) {
                            $st .= "<li data-target='#myCarousel' data-slide-to='$i'></li>";
                        }
                        $st .= "</ol>";
                        echo $st;
                        ?>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $str = "<div class='item active'>
                                    <img src='images/sanbong/{$img_arr[0]}' alt='{$img_arr[0]}'>
                                    </div>";
                            for ($i = 1; $i < count($img_arr); $i++) {
                                $str .= "<div class='item'>
                                        <img src='images/sanbong/{$img_arr[$i]}' alt='{$img_arr[$i]}'>
                                        </div>";
                            }
                            echo $str;

                            ?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div id="place-detail">
                        <?php
                        echo "<table class='table table-hover'>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{$street},đường {$precinct}, quận {$district}, TP. {$city}</td>
                            </tr>
                           
                            <tr>
                                <th>Loại Sân</th>
                                <td>{$capcity}</td>
                            </tr>
                        </table>";
                        ?>
                    </div>
                </div>
            </div>
 
        </div>


        <!-- right side -->
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Giá thuê địa điểm</div>
                <div class="panel-body">
                    <?php echo "<span class='place-cost big-place-cost'>{$pricePerHour}<sup><u>đ</u></sup></span><span class='desc-span desc-span-block'>cho mỗi giờ</span>" ?>
                    <?php

                    echo "<button type='button' class='btn btn-lg btn-block btn-danger btn-multi-1' id='rentSpaceAction' data-toggle='modal' data-target='#rentSpaceOrLogin' ><img src='images/shop32.png'/> Đặt thuê ngay</button>
                           <button type='button' class='btn btn-lg btn-block btn-success btn-multi-2 col-md-6'>Liên hệ<br/ ><span class='glyphicon glyphicon-earphone'> {$phone}</span></button>";

                    ?>
                    
                </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">Thông tin chủ sỡ hữu</div>
               <div class="panel-body">
                    <?php
                    echo "<table class='table table-hover'>
                        <tr>
                            <th>Ông/bà</th>
                            <td>{$fullname}</td>
                        </tr>
                        <tr>
                            <th>SĐT</th>
                            <td>{$phone}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><a href='mailto:{$email}'>{$email}</a></td>
                        </tr>
                    </table>";
                    mysqli_free_result($rs_getSpaceDetail);
                    mysqli_free_result($rs_getOwnerDetail);
                    mysqli_free_result($rs_getOwnerOfSpace);
                    mysqli_close($con);
                    ob_flush();
                    ?>
                </div>


                </div> 
              
            </div>
            
        </div>

    </div>

    <?php 
    if (isset($_SESSION["userName"])) {
        ?>
    <div class="login-panel modal fade" id="rentSpaceOrLogin" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Yêu cầu thuê mặt bằng</h3>
                </div>
                <form action="rentSpace.php" method="POST" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="spaceid">Địa điểm thuê: </label>
                            <span class="text-primary"><?php echo $spacename; ?></span>
                            <input type="hidden" name="spaceid" value="<?php echo $id; ?>" required readonly />
                        </div>
                        <div class="form-inline">
                            <label>Bắt đầu</label><br>
                            <input type="date" name="dateStart" class="form-control" id="dateStart" required />
                            <input type="time" name="timeStart" class="form-control" id="timeStart" required />
                        </div>
                        <div class="form-inline">
                            <label>Kết thúc</label><br>
                            <input type="date" name="dateEnd" class="form-control" id="dateEnd" required />
                            <input type="time" name="timeEnd" class="form-control" id="timeEnd" required />
                        </div>
                        <div class="form-group">
                            <label>Lời nhắn</label><br>
                            <textarea name="message" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="rentSpaceRequest" id="rentSpace">Gửi yêu cầu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <?php

} else {
    ?>
    <script>$("#rentSpaceAction").attr("data-target","#login-modal");</script>
    <?php

}
?>
</div>
<?php include("footer.php"); ?>