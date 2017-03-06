<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Library System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/pagenation.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="js/jquery.validate.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php 
				$curpagename = basename($_SERVER['PHP_SELF']); 
				if(@$_SESSION["userData"]["id"] !="") {
				?>
                   Welcome <?php echo $_SESSION["userData"]["first_name"];?> | <a href="logout.php?mode=fb">Logout</a>
				<?php } ?>
                </div>
				

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<h2>Library System</h2>
            </div>

            <div class="left-div">
               
        </div>
            </div>
        </div>
    <!-- LOGO HEADER END-->
	<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a <?php if($curpagename=="index.php") { ?>class="menu-top-active"<?php } ?> href="index.php">Dashboard</a></li>
                            <li><a href="add-books.php" <?php if($curpagename=="add-books.php") { ?>class="menu-top-active"<?php } ?>>Add books</a></li>
                            <li><a <?php if($curpagename=="search-books.php") { ?>class="menu-top-active"<?php } ?> href="search-books.php">Search Books</a></li>
                         </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>