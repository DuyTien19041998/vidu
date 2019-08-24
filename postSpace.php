<?php include("header.php"); ?>
<div id="body">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2>Đăng thông tin mặt bằng mới</h2>
        <?php
        if(isset($_SESSION["userName"])){
            
            
        }else{
            echo "<div class='alert alert-danger'>Bạn phải đăng nhập trước.</div>";
        }
        ?>
        <form id="form" method="POST" action="updateSpace.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="spacename">Tên mặt bằng</label>
                    <input type="text" name="spacename" class="form-control" placeholder="Tên mặt bằng" required>
                </div>
                <div class="form-group">
                    <label for="street">Địa chỉ đường</label>
                    <input type="text" name="street" class="form-control" placeholder="Vd: 13 Điện Biên Phủ" required>
                </div>
                <div class="form-group">
                    <label for="precinct">Phường</label>
                    <input type="text" name="precinct" class="form-control" placeholder="Vd: Hải Châu 2, An Hải Tây..." required>
                </div>
                <div class="form-group">
                    <label for="district">Quận</label>
                    <input type="text" name="district" class="form-control" placeholder="Vd: Sơn Trà, Thanh Khê..." required>
                </div>
                <div class="form-group">
                    <label for="city">Thành phố</label>
                    <input type="text" name="city" class="form-control" placeholder="Vd: Đà Nẵng" required>
                </div>
                <div class="form-group">
                    <label for="capcity">Sức chứa</label>
                    <input type="number" name="capcity" class="form-control" placeholder="Đơn vị: người" required>
                </div>
                <div class="form-group">
                    <label for="priceperhour">Giá theo giờ</label>
                    <input type="number" name="priceperhour" class="form-control" placeholder="Đơn vị: USD" required>
                </div>
                <div class="form-group">
                    <label for="area">Diện tích mặt bằng</label>
                    <input type="number" name="area" class="form-control" placeholder="Đơn vị: m2" required>
                </div>
                <div class="form-group">
                    <label for="fileupload">Tải lên hình ảnh</label>
                    <input type="file" name="fileupload" id="uploadfile" accept=".gif, .jpg, .png" required>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="postSpaceAction" id="submit" class="btn btn-success btn-large" value="Đăng">
                </div>
        </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php include("footer.php"); ?>