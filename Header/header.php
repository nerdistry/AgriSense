<?php
if (isset($_SESSION['logged_in']) and $_SESSION['logged_in'] == 1) {
	$loginProfile = "My Profile: " . $_SESSION['Username'];
	$logo = "glyphicon glyphicon-user";
	if ($_SESSION['Category'] != 1) {
		$link = "Login/profile.php";
	} else {
		$link = "Profile/profileView.php";
	}
} else {
	$loginProfile = "";
	$link = "index.php";
	$logo = "glyphicon glyphicon-log-in";
}
?>

<!DOCTYPE html>
<header id="header">
	<h1><a href="index.php">AgriSense</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="/Profile/myCart.php" data-toggle="tooltip" data-placement="bottom" title="My Cart"><span class="glyphicon glyphicon-shopping-cart" style="font-size: 28px;"></span></a></li>
			<li><a href="market.php" data-toggle="tooltip" data-placement="bottom" title="Market"><span class="glyphicon glyphicon-apple" style="font-size: 28px;"></span></a></li>
			<li><a href="blogView.php" data-toggle="tooltip" data-placement="bottom" title="Farmer's Hub"><span class="glyphicon glyphicon-inbox" style="font-size: 28px;"></span></a></li>
			<li><a href="<?= $link; ?>" title="<?= $loginProfile; ?>"><span class="<?php echo $logo; ?>" style="font-size: 28px;"></span></a></li>
		</ul>
</header>

</body>

</html>