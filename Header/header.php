<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
    $loginProfile = "My Profile: " . $_SESSION['Username'];
    $logo = "glyphicon glyphicon-user";
    if ($_SESSION['Category'] != 1) {
        $link = "Login/profile.php";
    } else {
        $link = "profileView.php";
    }
} else {
    $loginProfile = "Login";
    $link = "index.php";
    $logo = "glyphicon glyphicon-log-in";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- --------------IGNORE THIS LINKS -------------------- -->
    <!-- <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script> -->


    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<body>

<header id="header">
    <h1><a href="index.php">AgriSense</a></h1>
    <nav id="nav">
        <ul>
            <li><a href="/Profile/myCart.php" data-toggle="tooltip" data-placement="bottom" title="My Cart"><span class="glyphicon glyphicon-shopping-cart" style="font-size: 28px;"></span></a></li>
            <li><a href="/market.php" data-toggle="tooltip" data-placement="bottom" title="Market"><span class="glyphicon glyphicon-apple" style="font-size: 28px;"></span></a></li>
            <li><a href="blogView.php" data-toggle="tooltip" data-placement="bottom" title="Farmer's Hub"><span class="glyphicon glyphicon-inbox" style="font-size: 28px;"></span></a></li>
            <li><a href="<?= $link; ?>"><span class="<?php echo $logo; ?>" style="font-size: 28px;"></span><?php echo " " . $loginProfile; ?></a></li>
        </ul>
    </nav>
</header>

</body>
</html>
