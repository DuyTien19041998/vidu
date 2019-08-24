<?php
if(isset($_POST["status"]) && isset($_POST["spaceId"])){
    $status = $_POST["status"];
    if($status == "agree"){
        $status = '1';
    }else if($status == "disagree"){
        $status = '2';
    }else{
        $status = '0';
    }
    $spaceId = $_POST["spaceId"];
    require ("connect.inc");
    $sql = "UPDATE renting SET acceptStatus = {$status} WHERE spaceId = {$spaceId}";
    if(mysqli_query($con,$sql)===TRUE){
        echo "1";
    }else{
        echo "0";
    }
}else{
    echo "-1";
}

?>