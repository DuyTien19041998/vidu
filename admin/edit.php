
<?php
include "../inc/connect.inc";
if (isset($_SESSION["userName"])) {
    $username = $_SESSION['userName'];
    echo $username;
} else {
    $username = "_guest";echo $username;
}

$username=$_GET['userName'];
?>






	<h1>Thông tin người dùng</h1>
    <form class="form-horizontal" id="form" method="POST" action="../update.php" role="form">
	<table style="border=1;">
		<tr>
			<th>UserName</th>
			<th>FullName</th>
			<th>PassWord</th>
			<th>Email</th>
            <th>Phone</th>
			
			
		</tr>


<?php

if (! $con) {
    die('false to connect DB');
} else {
    // truy vaasn co so du lieu
    $sql="SELECT * FROM `accounts` WHERE userName='{$username}'";
    // hien thi utf-8

    mysqli_query($con, 'SET NAMES UTF8');
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['userName'];
            $fullname = $row['fullName'];
            $pass = $row['password'];
            $email = $row['email'];
            $phone= $row['phone'];
            echo "<tr>";
            echo "<td><input type='text' value={$username} name='username'></td>";
            echo "<td><input type='text' value={$fullname} name='fullname'></td>";
            echo "<td><input type='text' value={$pass} name='password'></td>";
            echo "<td><input type='text' value={$email} name='email'></td>";
            echo "<td><input type='text' value={$phone} name='phone'></td>";
            
            echo "</tr>";
        }
    } else {
        echo "0 result";
    }
    
    echo "	</table>";
    echo " <input type='submit' id='submit' class='btn btn-success' value='Edit'>";
    echo "  </form>";

}


?>
	
	




