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
        <form name="frm_filter" id="frm_filter" method="post" action="">
        <div class="productCategoryLeftPanel" id="productCategoryLeftPanel">
            
			<?php //include_once 'pageportion/search-box.php';  ?>
			
					<div class="pro_cat_title">                   
				   		<h1 style="cursor:pointer;"><a>Area</a><span class="spanbrandcls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>						
            		</div>
                    <div id="branddivID"><?php include 'pageportion/area.php';  ?></div>
                                     
					<div class="pro_cat_title">
						<h1 style="cursor:pointer;"><a>Type</a><span class="spansizecls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
					</div>                     
					 <?php include 'pageportion/type.php';  ?>                    
                                        
					<div class="pro_cat_title">
						<h1 style="cursor:pointer;"><a>Landmark</a><span class="spancolorcls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
					</div>					
					<?php include 'pageportion/landmark.php';  ?>
					
					<div class="pro_cat_title">
						<h1 style="cursor:pointer;"><a>Price</a><span class="spanpricecls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
					</div>					
					<?php include 'pageportion/prices.php';  ?>
          </div>
          </form>
    </div>
    <div class="container">
		<?php include 'pageportion/show-filters.php';  ?>        
        <?php include 'products.php';  ?>
        <div style="clear:both;"></div>
	</div>      
</div>
<script type="application/javascript" src="js/productfilter.js"></script>
</body>
</html>