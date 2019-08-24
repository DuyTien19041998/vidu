<!DOCTYPE html>
<html>
    <head>
        <meta charset = utf-8 >
    </head>
    <body>
        <?php
        session_start();
        if(isset($_SESSION["userName"])){
            $username = $_SESSION['userName'];
        }else{
            header("Location: index.php");
        }
        if(isset($_POST["postSpaceAction"])){
            $spacename = $_POST["spacename"];
            $street = $_POST["street"];
            $precinct = $_POST["precinct"];
            $district = $_POST["district"];
            $city = $_POST["city"];
            $capcity = $_POST["capcity"];
            $priceperhour = $_POST["priceperhour"];
            $area = $_POST["area"];
            if($_FILES["fileupload"]["name"] != NULL) {
                if($_FILES["fileupload"]["type"] == "image/jpeg"
                   || $_FILES["fileupload"]["type"] == "image/png"
                   || $_FILES["fileupload"]["type"] == "image/gif") {
                    if($_FILES["fileupload"]["size"] > 3145728) {
                        echo "<script>alert('File tải lên không được lớn hơn 3MB.');</script>";
                    }
                    else{
                        $path = "images/sanbong/".$_FILES["fileupload"]["name"];
                        $tmp_name = $_FILES["fileupload"]["tmp_name"];
                        $filename = $_FILES["fileupload"]["name"];
                        $type = $_FILES["fileupload"]["type"];
                        $size = $_FILES["fileupload"]["size"];
                        move_uploaded_file($tmp_name, $path);
                        echo "Đã tải ảnh lên <br />";
                        echo "Tên file: " .$filename."<br />";
                    }
                }
                else{
                    echo "<script>alert('File không hợp lệ');</script>";
                }
            }
            include "inc/connect.inc";
            $sql_updateSpace = "INSERT INTO space (name,ownerUserName)
                                    VALUES ('{$spacename}','{$username}');";
            $sql_updateSpace .=	"INSERT INTO spaceaddress (id,street,precinct,district,city)
                                    VALUES ((SELECT space.id FROM space WHERE space.name = '{$spacename}'),'{$street}','{$precinct}','{$district}','{$city}');";
            $sql_updateSpace .= "INSERT INTO spacedetail (id,capcity,priceperhour,area)
                                    VALUES((SELECT space.id FROM space WHERE space.name = '{$spacename}' AND space.ownerUserName = '{$username}'),'{$capcity}','{$priceperhour}','{$area}');";
            $sql_updateSpace .= "INSERT INTO image (id,jpg,thumbnail)
                                    VALUES((SELECT space.id FROM space WHERE space.name = '{$spacename}' AND space.ownerUserName = '{$username}'),'{$filename}','{$filename}');";
            $sql_updateSpace .= "INSERT INTO spacerating (id,star1,star2,star3,star4,star5)
                                    VALUES((SELECT space.id FROM space WHERE space.name = '{$spacename}' AND space.ownerUserName = '{$username}'),1,0,0,0,0);"; // hông có thời gian fix lỗi chia cho 0
            if(mysqli_multi_query($con,$sql_updateSpace)){
                echo "<script>alert('Đã thêm địa điểm thành công.');</script>";
                header("Refresh:1; url=profile.php",true,303);
            }else{
                echo "<script type='text/javascript'>alert('Đã xảy ra lỗi. Mời thử lại!');</script>";
                header("Refresh:1; url=postSpace.php",true,303);
            }
        }else{
            header("Location: profile.php");
        }
        ?>
    </body>
</html>