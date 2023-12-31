<?php
session_start();

if (!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You have to Login to view this page!";
    header("Location: Login/error.php");
}
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>Profile: <?php echo $_SESSION['Username']; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="bootstrap\js\bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="../css/style.css" />

    <style>
     
        .image-circle {
            border: 4px solid #127C56;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin: 20px auto;
            transition: border-color 0.3s;
        }

        .image-circle:hover {
            border-color: #1EE494;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .col-sm-3 {
            width: 25%;
            text-align: center;
        }

        .profile-info {
            margin: 10px;
        }

        .btn-danger {
            background-color: #127C56;
            border: 2px solid #127C56;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #1EE494;
            border-color: #1EE494;
        }
    </style>

</head>


<body>
<header id="header" style="background-color: #fff; color: white; text-align: center; padding:  0;">
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

    <section id="one" class="style1 align">
        <div class="inner">
            <div class="box">
                <header>
                    <center>
                        <span><img src="<?php echo '../images/profileImages/' . $_SESSION['picName'] . '?' . mt_rand(); ?>" class="image-circle" class="img-responsive" height="200%"></span>
                        <br>
                        <h2><?php echo $_SESSION['Name']; ?></h2>
                        <h4 style="color: black;"><?php echo $_SESSION['Username']; ?></h4>
                        <br>
                    </center>
                </header>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <b>
                            <font size="+1" color="black">RATINGS : </font>
                        </b>
                        <font size="+1"><?php echo $_SESSION['Rating']; ?></font>
                    </div>
                    <div class="col-sm-3">
                        <b>
                            <font size="+1" color="black">Email ID : </font>
                        </b>
                        <font size="+1"><?php echo $_SESSION['Email']; ?></font>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <br />
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <b>
                            <font size="+1" color="black">Mobile No : </font>
                        </b>
                        <font size="+1"><?php echo $_SESSION['Mobile']; ?></font>
                    </div>
                    <div class="col-sm-3">
                        <b>
                            <font size="+1" color="black">ADDRESS : </font>
                        </b>
                        <font size="+1"><?php echo $_SESSION['Addr']; ?></font>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <div class="12u$">
                    <center>
                        <div class="row uniform">
                            <div class="3u 12u$(large)">
                                <a href="changePassPage.php" class="btn btn-danger" style="text-decoration: none;">Change Password</a>
                            </div>
                            <div class="3u 12u$(large)">
                                <a href="profileEdit.php" class="btn btn-danger" style="text-decoration: none;">Edit Profile</a>
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <a href="../Product/uploadProduct.php" class="btn btn-danger" style="text-decoration: none;">Upload Product</a>
                            </div>
                            <div class="3u 12u$(xsmall)">
                                <a href="../GenerativeAI/questions.php" class="btn btn-danger" style="text-decoration: none;">GROW!</a>
                            </div>
                            <div class="3u 12u$(large)">
                                <a href="../Login/logout.php" class="btn btn-danger" style="text-decoration: none;">Log Out</a>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>



</body>

</html>