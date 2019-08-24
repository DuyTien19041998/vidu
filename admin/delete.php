<?php

    session_start();
    include("../inc/connect.inc");

echo $_GET['userName'];

$sql = "DELETE FROM accounts WHERE 'userName'='{$_GET['userName']}'";
                #$rs = mysqli_query($con, $sql);
                mysqli_query($con, $sql) or die("Delete failse!");
                header('location:index.php');
               
?>