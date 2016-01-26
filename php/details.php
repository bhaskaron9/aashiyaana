<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login_page.php?stat=5');
}
$lat=$_GET['lat'];
$lng=$_GET['lng'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Flat Finder</title>
		<link rel="icon" 
			type="image/png" 
			href="../images/1.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--including files from CDN for the formatting to work-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script 
			src="http://maps.googleapis.com/maps/api/js">
		</script>
		<style>
		#googlemaps{
			position:absolute;
			right:10px;
		}
		a:link{
		color:white;
		}
		a:visited{
		color:purple;
		}
		</style>
		<script type="text/javascript">

function view()
{
	var my_lat=<?php echo $lat; ?>;
	var my_lng=<?php echo $lng; ?>;
	var url="fetch_details.php?lat="+my_lat+"&lng="+my_lng+"";
	load_my_URL(url,function(data){
	var xml=parse_my_XMLdata(data);
	var mnodes=xml.documentElement.getElementsByTagName("flat");
	var html="";
	var i;
	if(mnodes.length==0)
	{
	html="No Links!!";
	}
	else
	{
	for(i=0;i<mnodes.length;i++)
	{
		var j=i+1;
		var addr=mnodes[i].getAttribute("addr");
		html+=addr+"<br>";
	}
	}
	document.getElementById("list").innerHTML=html;
});
}

//the function requests XMLHttpRequest and calls a callback function, it open the given url and returns the response through responseText
function load_my_URL(url,do_func)
{
	var my_req=window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
	 my_req.onreadystatechange = function() {
        if (my_req.readyState == 4) {
		  do_func(my_req.responseText, my_req.status);
          my_req.onreadystatechange = no_func();
          
        }
      };
	my_req.open('GET',url,true);
	my_req.send(null);
}
function parse_my_XMLdata(data)
{
	if(window.ActiveXObject)
	{
		var doc=new ActiveXObject('Microsoft.XMLDOM');
		doc.loadXML(data);
		return doc;
	}
	else if(window.DOMParser)
	{
		return (new DOMParser).parseFromString(data,'text/xml');
	}

}
function no_func(){}
window.onload=view;
</script>
</head>
<body style="background-image:url(../images/2.jpg);">
	<div id="grad">
	</div>
    
	<div class="container">
	<p style="color:white; font-size:xx-large; font-weight:bolder;">You have added:</p>
	<div id="list" style="color:white; font-size:x-large; font-weight:bolder;" class="container">
	</div>
	</div>
</body>
</html>