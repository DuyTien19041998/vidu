<?php include("header.php"); ?>
<!-- ============= BODY ============== -->
<div id="body">
    <!-- INTRODUCTION & SEARCH -->
    <section class="big-container">
        <div class="container big-section row">
            <div class="big-introduction col-sm-8">
                <h2>ĐẶT SÂN BÓNG ONLINE 
NHANH CHÓNG VÀ DỄ DÀNG</h2>
                <p>Địa điểm, giá sân, giờ mở cửa,... các sân bóng trong khu vực gần nơi bạn ở? </p>
                <p>Lựa chọn sân gần vị trí của bạn nhất, đặt sân online, tiện lợi, dễ dàng.</p>
                <a class="btn btn-primary" href="" data-toggle="modal" data-target="#login-modal">Đăng nhập</a> <a href="signup.php" id="signup">Đăng ký</a>
            </div>
           
        </div>
    </section>


    <!-- TOP & NEW -->
    <section>
        <div class="container">
            <h2>Địa điểm hot</h2>
            <div id="homeRoll-hot" class="carousel slide" data-interval="false">

                <!-- Left and right controls -->
                <a href="#homeRoll-hot" class="home-roll-slider left" role="button" data-slide="prev">&lt;</a><a href="#homeRoll-hot" class="home-roll-slider right" role="button" data-slide="next">&gt;</a>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <ul class="home-roll row">

                            <?php
                            require("inc/connect.inc");
                            $sql = "SELECT space.id,
                                    space.name,
                                    spaceaddress.street,
                                    spaceaddress.district,
                                    spaceaddress.city,
                                    spacedetail.pricePerHour,
                                    image.thumbnail 
                                    FROM ((space inner join spaceaddress on space.id = spaceaddress.id)
                                    inner join spacedetail on space.id = spacedetail.id)
                                    inner join image on space.id = image.id
                                    ORDER BY space.id ASC LIMIT 6 OFFSET 0";
                            $result = mysqli_query($con,$sql);
                            $count = 0;
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $count++;
                                    if($count==4){
                                        ?>
                                    </ul>
                                </div>
                                <!-- end 1 page -->
                                <div class="item">
                                    <ul class="home-roll row">
                                        <?php
                                    }
                            ?>
                                    <li class="col-sm-3">
                                        <a href="detail.php?id=<?php echo $row["id"]; ?>">
                                            <img src="images/sanbong/<?php echo $row["thumbnail"]; ?>">
                                            <div class="place-info">
                                                <h5 class="place-name place-hot"><?php echo $row["name"]; ?></h5>
                                                <span class="place-desc"><?php echo $row["street"].", ".$row["district"].", ".$row["city"]; ?></span>
                                                <span class="place-cost"><?php echo $row["pricePerHour"]; ?> VNĐ/giờ</span>
                                            </div></a>
                                    </li>
                            <?php 
                                    
                                }
                            }else{
                                echo "Error";
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div><!-- end carousel -->

            <h2>Mới cập nhật</h2>
            <div id="homeRoll-new" class="carousel slide" data-ride="carousel">

                <!-- Left and right controls -->
                <a href="#homeRoll-new" class="home-roll-slider left" role="button" data-slide="prev">&lt;</a><a href="#homeRoll-new" class="home-roll-slider right" role="button" data-slide="next">&gt;</a>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <ul class="home-roll row">
                            
                            <?php
                            require("inc/connect.inc");
                            $sql = "SELECT space.id,
                                    space.name,
                                    spaceaddress.street,
                                    spaceaddress.district,
                                    spaceaddress.city,
                                    spacedetail.pricePerHour,
                                    image.thumbnail 
                                    FROM ((space inner join spaceaddress on space.id = spaceaddress.id)
                                    inner join spacedetail on space.id = spacedetail.id)
                                    inner join image on space.id = image.id
                                    ORDER BY space.id DESC LIMIT 6 OFFSET 0";
                            $result = mysqli_query($con,$sql);
                            $count = 0;
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $count++;
                                    if($count==4){
                                        ?>
                                    </ul>
                                </div>
                                <!-- end 1 page -->
                                <div class="item">
                                    <ul class="home-roll row">
                                        <?php
                                    }
                            ?>
                                    <li class="col-sm-3">
                                        <a href="detail.php?id=<?php echo $row["id"]; ?>">
                                            <img src="images/sanbong/<?php echo $row["thumbnail"]; ?>">
                                            <div class="place-info">
                                                <h5 class="place-name place-hot"><?php echo $row["name"]; ?></h5>
                                                <span class="place-desc"><?php echo $row["street"].", ".$row["district"].", ".$row["city"]; ?></span>
                                                <span class="place-cost"><?php echo $row["pricePerHour"]; ?> VNĐ/giờ</span>
                                            </div></a>
                                    </li>
                            <?php 
                                    
                                }
                            }else{
                                echo "Error";
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div><!-- end carousel -->

        </div>
    </section>

</div><!--end body-->
<script>$('#homeRoll-hot').carousel('pause');</script>
<script>
    $("#homeQuickSearch").click(function(){
        var qs = $("#QuickDistrict").val();
        if(qs != "0" || qs != null || qs != ""){
            window.location.href="search.php?str="+qs;
        }
    });
</script>
<?php include("footer.php"); ?>