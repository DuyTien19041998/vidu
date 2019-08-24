<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
    session_start();
    session_unset();
    session_destroy(); 
    echo "<script>alert('Đăng xuất thành công.');</script>";
    header("Refresh:0;url=index.php");
    ?>
</body>
</html>