<?php
session_start();
$id = $_GET['id'];
include("inc/connect.inc");



$sql = "DELETE FROM renting WHERE rentingId={$id}";

mysqli_query($con, $sql) or die("Delete failse!");
header('location:viewcard.php');
?>

