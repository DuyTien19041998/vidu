<?php
    include("inc/connect.inc");
    $username = $_POST["name"];
    $password = $_POST["pwd"];
    session_start();
    $sql = "select * from accounts where userName='{$username}' and password='{$password}'";
    mysqli_query($con, "SET NAMES 'utf8'");
    $rs = mysqli_query($con, $sql);
    if (mysqli_num_rows($rs) > 0) {
        $row = mysqli_fetch_array($rs);
        $_SESSION["userName"] = $row['userName'];
        $_SESSION["fullName"] = $row['fullName'];
        echo $_SESSION["fullName"];
    } else {
        echo 'false';
    }
?>