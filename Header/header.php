<?php
session_start();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<body>

<header id="header">
    <h1><a href="index.php">AgriSense</a></h1>
    <nav id="nav">
        <ul>
             <li><a href="/market.php" data-toggle="tooltip" data-placement="bottom" title="Market"><i class="fa-regular fa-shop" style="color: #36ab3e; font-size: 28px;"></i></a></li>
            <li><a href="/Profile/myCart.php" data-toggle="tooltip" data-placement="bottom" title="My Cart"><i class="fas fa-shopping-cart" style="font-size: 28px;"></i></a></li>
            
            <li><a href="blogView.php" data-toggle="tooltip" data-placement="bottom" title="Farmer's Hub"><i class="fas fa-inbox" style="font-size: 28px;"></i></a></li>
            <!-- <li><a href="<?= $link; ?>"><i class="<?php echo $logo; ?>" style="font-size: 28px;"></i><?php echo " " . $loginProfile; ?></a></li> -->
        </ul>
</nav>

</header>

</body>
</html>
