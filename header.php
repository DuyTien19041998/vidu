<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link REL="SHORTCUT ICON" HREF="images/iconfinder_sports-apparel-19_809679.png">
        <script src="js/jquery.js" type="text/javascript"></script>
        <title>Thuê Sân</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
    </head>
    <body>
        <!-- ============= HEAER ============== -->
        <div id="header">
            <!-- NAVBAR-->
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">Thuê Sân</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div id="loginZone" class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="viewcard.php" id=""><img src="images/icon_shop.png"/></a></li>
                            <li><a href="signup.php" id="signup">Đăng ký</a></li>
                            <a class="btn btn-primary navbar-btn navbar-right" href="" data-toggle="modal" data-target="#login-modal">Đăng nhập</a>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div> <!--end container-->
            </nav>

            <!-- NAVBAR-->
        </div><!--end header-->
        
<?php

/**
 * Global function *
 */
function starsDisplay($_num)
{
    $stars = "";
    for ($_s = 1; $_s <= $_num; $_s++) {
        $stars .= "<span class='glyphicon glyphicon-star'></span>";
        if ($_s == $_num) {
            if ($_s < 5) {
                $_ls = 5 - $_s;
                for ($_l = 1; $_l <= $_ls; $_l++) {
                    $stars .= "<span class='glyphicon glyphicon-star-empty'></span>";
                }
            }
        }
    }
    echo $stars;
}
?>