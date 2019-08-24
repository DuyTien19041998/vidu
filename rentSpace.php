<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <?php
        session_start();
        if(isset($_POST["rentSpaceRequest"])){
            if(isset($_SESSION["userName"])){
                if($_SESSION["userName"]!=""){
                    $username = $_SESSION["userName"];
                    // select to get user id
                    $spaceid = $_POST["spaceid"];
                    $timeStart = $_POST["dateStart"]." ".$_POST["timeStart"];
                    $timeEnd = $_POST["dateEnd"]." ".$_POST["timeEnd"];
                    $messagee = $_POST["message"];
                    if($spaceid != ""
                       && $timeStart != " "
                       && $timeEnd != " "){
                        require("inc/connect.inc");
                        $sql = "INSERT INTO renting 
                    (spaceId,userName,timeStart,timeEnd) 
                    VALUES 
                    ('".$spaceid."','".$username."','".$timeStart."','".$timeEnd."') 
                    ";
                  
                        #if(mysqli_query($con,$sql) === TRUE){
                         if(mysqli_query($con, $sql)!=0){
                            echo '<script>alert("Đã gửi yêu cầu thuê thành công!");</script>';
                            header("Refresh:1;url=index.php",true,303);
                        }else{
                            echo '<script>alert("Đã xảy ra lỗi!");</script>';
                            #header("Refresh:1;url=index.php",true,303);
                        }

                    }else{
                        echo "No data";
                    }
                }else{
                    echo "No session";
                }
            }else{
                echo "No session set";
            }
        }else{
            header("Location:index.php");
        }

        ?>
    </body>
</html>