<?php
error_reporting(E_ALL ^ E_DEPRECATED);

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Buyer Search Filter</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="shortcut icon" href="" type="image/ico" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css' />
</head>

<body>

<div class="mainDiv">
<br />
<h3 align="center" style="font-size:28px;font-family: 'Cabin Condensed', sans-serif;"><a href="#" target="_blank" style=" color:#F09;">Pin Your Abode</a></h3>

    <div class="divbox divbox1">
        <div style="display:none;" class="productCategoryLeftPanel"></div>
        Top Ones<br>
		All the Top <br>
		Viewed Flats
    </div>
        <?php include 'products.php';  ?>
        <div style="clear:both;">
	</div>      
</div>
<script type="application/javascript" src="js/productfilter.js"></script>
</body>
</html>