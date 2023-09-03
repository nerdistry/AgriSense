<?php
session_start();
require '../Connection/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AgroCulture</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<link rel="stylesheet" href="../css/style.css">
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="../js/skel.min.js"></script>
    <script src="../js/skel-layers.min.js"></script>
    <script src="../js/init.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <noscript>
        <link rel="stylesheet" href="../css/skel.css" />
        <link rel="stylesheet" href="../css/style.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <style>
        /* Body Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
       

        /* Main Section Styles */
        #main {
            padding: 30px 0;
        }

        #main h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #127C56;
        }

        #two {
            background-color: #fff;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .select-wrapper {
            width: auto;
        }

        select {
            background-color: white;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button.special {
            background-color: #127C56;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button.special:hover {
            background-color: #1EE494;
        }

        .row {
            margin: 0 -15px;
        }

        .col-md-4 {
            padding: 0 15px;
            text-align: center;
        }

        .title {
            color: black;
        }

        .image.fit {
            height: 220px;
        }

        blockquote {
            text-align: left;
            color: #127C56;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header id="header">
        <h1><a href="..index.php">AgriSense</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="../Profile/myCart.php" data-toggle="tooltip" data-placement="bottom" title="My Cart"><i class="fas fa-shopping-cart" style="font-size: 28px;"></i></a></li>
                <li><a href="market.php" data-toggle="tooltip" data-placement="bottom" title="Market"><i class="fas fa-apple-alt" style="font-size: 28px;"></i></a></li>
                <li><a href="blogView.php" data-toggle="tooltip" data-placement="bottom" title="Farmer's Hub"><i class="fas fa-inbox" style="font-size: 28px;"></i></a></li>
                <li><a href="<?= $link; ?>" title="<?= $loginProfile; ?>"><i class="fas fa-user" style="font-size: 28px;"></i></a></li>
            </ul>
        </nav>
    </header>

	<?php
	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<!-- One -->
	<section id="main" class="wrapper style1 align-center">
		<div class="container">
			<h2>Welcome to digital market</h2>

			<?php
			if (isset($_GET['n']) and $_GET['n'] == 1) :
			?>
				<h3>Select Filter</h3>
				<form method="GET" action="productMenu.php?">
					<input type="text" value="1" name="n" style="display: none;" />
					<center>
						<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-2">
								<div class="select-wrapper" style="width: auto">
									<select name="type" id="type" required style="background-color:white;color: black;">
										<option value="all" style="color: black;">List All</option>
										<option value="fruit" style="color: black;">Fruit</option>
										<option value="vegetable" style="color: black;">Vegetable</option>
										<option value="grain" style="color: black;">Grains</option>
									</select>
								</div>
							</div>
							<div class="col-sm-2">
								<input class="button special" type="submit" value="Go!" />
							</div>
							<div class="col-sm-4"></div>
						</div>
					</center>
				</form>
			<?php endif; ?>

			<section id="two" class="wrapper style2 align-center">
				<div class="container">
					<?php
					if (!isset($_GET['type']) or $_GET['type'] == "all") {
						$sql = "SELECT * FROM fproduct WHERE 1";
					}
					if (isset($_GET['type']) and $_GET['type'] == "fruit") {
						$sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit'";
					}
					if (isset($_GET['type']) and $_GET['type'] == "vegetable") {
						$sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'";
					}
					if (isset($_GET['type']) and $_GET['type'] == "grain") {
						$sql = "SELECT * FROM fproduct WHERE pcat = 'Grains'";
					}
					$result = mysqli_query($conn, $sql);

					?>
					<div class="row">
						<?php

						while ($row = $result->fetch_array()) :
							$picDestination = "../images/productImages/" . $row['pimage'];
						?>
							<div class="col-md-4">
								<section>
									<strong>
										<h2 class="title" style="color:black; "><?php echo $row['product'] . ''; ?></h2>
									</strong>
									<a href="../Reviews/review.php?php echo $row['pid']; ?>"> <img class="image fit" src="<?php echo $picDestination; ?>" height="220px;" /></a>

									<div style="align:left">
										<blockquote><?php echo "Type : " . $row['pcat'] . ''; ?><br><?php echo "Price : " . $row['price'] . ' /-'; ?><br></blockquote>

								</section>
							</div>

						<?php endwhile;	?>


					</div>

			</section>
			</header>

	</section>

</body>

</html>