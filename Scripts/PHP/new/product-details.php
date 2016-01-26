<?php
include('includes/dbfunctions.php');

$ProductID = $_GET['id'];
$db = new DB_FUNCTIONS();
$ProductMap = $db->getProductmap($ProductID);//idher
$ProductDetails = $db->getProductDetails($ProductID);
//$getAllProductPhotos = $db->_getAllProductPhotos($ProductID);
//$getPSizes = $db->getAvailableSize($ProductID);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css' />
<script 
			src="http://maps.googleapis.com/maps/api/js">
		</script>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<style type="text/css">
.button {
		padding: 5px 10px;
		display: inline;
		background: #777 url(images/button.png) repeat-x bottom;
		border: none;
		color: #fff;
		cursor: pointer;
		font-weight: bold;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		text-shadow: 1px 1px #666;
		font-family:'Cabin Condensed', serif;
		}
	.button:hover {
		background-position: 0 center;
		}
	.button:active {
		background-position: 0 top;
		position: relative;
		top: 1px;
		padding: 6px 10px 4px;
		}
	.button.red { background-color: #e50000; }
	.button.purple { background-color: #9400bf; }
	.button.green { background-color: #58aa00; }
	.button.orange { background-color: #ff9c00; }
	.button.blue { background-color: #2c6da0; }
	.button.black { background-color: #333; }
	.button.white { background-color: #fff; color: #000; text-shadow: 1px 1px #fff; }
	.button.small { font-size: 75%; padding: 3px 7px; }
	.button.small:active { padding: 4px 7px 2px; background-position: 0 top; }
	.button.large { font-size: 125%; padding: 7px 12px; }
	.button.large:active { padding: 8px 12px 6px; background-position: 0 top; }
	
	.ordernow {
	-moz-box-shadow:inset -3px 1px 10px -11px #caefab;
	-webkit-box-shadow:inset -3px 1px 10px -11px #caefab;
	box-shadow:inset -3px 1px 10px -11px #caefab;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #77d42a), color-stop(1, #5cb811) );
	background:-moz-linear-gradient( center top, #77d42a 5%, #5cb811 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77d42a', endColorstr='#5cb811');
	background-color:#77d42a;
	-moz-border-radius:23px;
	-webkit-border-radius:23px;
	border-radius:23px;
	border:1px solid #268a16;
	display:inline-block;
	color:#306108;
	font-family:arial;
	font-size:28px;
	font-weight:bold;
	padding:10px 36px;
	text-decoration:none;
	text-shadow:0px 1px 0px #aade7c;
	cursor:pointer;
}.ordernow:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5cb811), color-stop(1, #77d42a) );
	background:-moz-linear-gradient( center top, #5cb811 5%, #77d42a 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cb811', endColorstr='#77d42a');
	background-color:#5cb811;
	cursor:pointer;
}.ordernow:active {
	position:relative;
	top:1px;
	cursor:pointer;
}
</style>
<script type="text/javascript">
function my_initial() {
			var temp=new google.maps.LatLng(<?php echo $ProductMap['Lat']; ?> , <?php echo $ProductMap['Lat']; ?> );
		    var geo = new google.maps.Geocoder();
		    var mymap = {
		        center: new google.maps.LatLng(28.613939, 77.209021),
		        zoom: 9,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    }
		    map = new google.maps.Map(document.getElementById("googlemaps"), mymap);
			 var marker = new google.maps.Marker({
		            position: temp;
		            map: map,

		        });
				marker.setMap(map);
		}
	google.maps.event.addDomListener(window, 'load', my_initial);
	</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".smallImage").click(function() {
		var ID = $(this).attr("simid");
		/*var total = <?=count($getAllProductPhotos)?>;
		for(var i=1;i<=total;i++) {
			if(i == ID) { 				
				$("#bigImage"+ID).fadeTo("slow",1);				
			} 
			else { 				
				$("#bigImage"+i).css("display","none"); 
			}			
		}*/
 
	});
	
	
	$(".button.blue").click(function() {
		var ID = $(this).attr("sid");		
 		/*var stotal = <?=count($getPSizes)?>;
		for(var i=1;i<=stotal;i++) {
			if(i == ID) { 				
				$("#spansize"+ID).removeClass('button blue');
				$("#spansize"+ID).addClass('button green');		
			} 
			else { 				
				$("#spansize"+i).addClass('button blue');	
			}			
		}*/
	});
});

</script>
</head>

<body>
<div style="width:900px; height:480px; border:0px solid red;">

	<div style="padding-top:2px; padding-left:2px; float:left;">
	<?php	
	//$k=1;	
	//foreach($getAllProductPhotos as $p) {
	?>
			<div class="smallImage" style="padding-top:1px; cursor:pointer;">
				<img src="../uploads/<?php echo $ProductDetails['ID'];?>.jpg"  height="400" width="500" />				
			</div>
			
			
			<div style="clear:both;"></div>
	</div>
    <?php
	$j=1;
    //foreach($getAllProductPhotos as $p) {
	?>	
	<div id="bigImage<?=$j?>" style="width:360px;border:0px solid red; float:left;margin-left:5px;  display:none;">
			<img src="../uploads/<?php echo $ProductDetails['ID'];?>.jpg" />
			<div style="clear:both;"></div>
	</div>
	
	<div style="border:0px solid red; margin-left:441px;" align="center">
	
		<span style="font-family:'Cabin Condensed', serif; font-size:30px;color:#0099FF;"><?=$ProductDetails['FlatTitle']?></span><br /><br />
		<span style="font-family:'Cabin Condensed', serif; font-size:25px; color:#903;">Rs . <?=$ProductDetails['Price']?></span><br /><br />
		
		<p style="font-family:'Cabin Condensed', serif; font-size:15px; color:#000000; text-align:left;">
		<?php 
			echo 'Uploaded On: '.$ProductDetails['Time'].'<br>';
			echo 'Area: '.$ProductDetails['Area'].' sq.fts<br>';
			echo 'Landmark: '.$ProductDetails['Landmark'].'<br>';
			echo 'Type: '.$ProductDetails['Type'].'<br>';
			echo 'Pay Term: '.$ProductDetails['PayTerm'].'<br>';
			echo 'Pay Method: '.$ProductDetails['PayMethod'].'<br>';
			echo 'Views: '.$ProductDetails['Views'].'<br>';
			echo 'Seller: '.$ProductDetails['Username'].'<br>';
			echo 'State: <b>'.$ProductDetails['State'].'</b><br>';
			include '../Scripts/mysqlconnect.php';
			$idhere=$ProductDetails['ID'];
			$view=$ProductDetails['Views'];
			$view=$view+1;
			$query1="UPDATE `flat_finder`.`flatdetails` SET `Views`='$view' WHERE `ID`= $idhere;";
			mysql_query($query1,$conn);
			
		?>
		</p>
		<div id="googlemaps" style="height:200px; width:200px;"></div>
		<a href="../Chat/index.php?rec=<?php echo $ProductDetails['Username'];?>"><input type="button" value="Chat with <?php echo $ProductDetails['Username'];?>"></a>
		<br /><br /><br /><br /><br /><br />
		
		<a href="../clickonbuynow.php?code=<?php echo $ProductDetails['ID'];?>"><div class="ordernow">BUY NOW</div></a>
	
	</div>
	
	
	
	<!--<div id="showcase" class="showcase">
		
		<div class="showcase-slide">			
			<div class="showcase-content">
				<img src="images/products/big/adidas-brown-1.jpg" alt="01" />
			</div>			
			<div class="showcase-thumbnail">
				<img src="images/products/thumbs/adidas-brown-1_R.jpg"  />
				<div class="showcase-thumbnail-cover"></div>
			</div>			
			
		</div>
		
		<div class="showcase-slide">			
			<div class="showcase-content">
				<img src="images/products/big/adidas-brown-2.jpg" alt="01" />
			</div>			
			<div class="showcase-thumbnail">
				<img src="images/products/thumbs/adidas-brown-2_R.jpg"  />
				<div class="showcase-thumbnail-cover"></div>
			</div>			
			
		</div>
		
		
		
	</div>-->


</div>
</body>
</html>