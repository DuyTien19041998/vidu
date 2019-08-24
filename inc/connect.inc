<?php
    $host=$_SERVER['SERVER_NAME'];
    //$host='35.198.251.235';
    //$host=$_SERVER['/cloudsql/project1-221316:asia-southeast1:qlsb'];
    $user="root";
    $pass="";
    $db="qlsb";
    $con=mysqli_connect($host,$user,$pass,$db) or die("Connect failed!");
    mysqli_query($con,"SET NAMES 'utf8'");



//$username = "root";
//$password = "";
//$dbname   = "qlsb";
//$servername = "/cloudsql/project1-221316:asia-southeast1:qlsb";
//$db = mysqli_connect(null, $username, $password, $dbname, 0 ,$servername);
//  mysqli_set_charset($db, 'UTF8');
// #$con = new mysqli(null, $USER, $PASS, $DB, 0, $socket_path);

//$con = new PDO("mysql:unix_socket=$servername;dbname=$dbname", $username, $password);
    
//   if (!$con) {
 //   die("Connection failed: " . mysqli_connect_error());
//}

?>