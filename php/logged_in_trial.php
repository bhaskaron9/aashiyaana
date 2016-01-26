<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('Location:login_page.php?stat=5');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LINKSTOCK</title>
		<link rel="icon" 
			type="image/png" 
			href="../images/4.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--including files from CDN for the formatting to work-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script 
			src="http://maps.googleapis.com/maps/api/js">
		</script>
		<style>
		#googlemaps{
			position:absolute;
			right:10px;
		}
		</style>
		<script>
		var map;
		var marker;
		var geo;
		var bounds;
			//initial function(it loads along with the page)-it loads the map initially
	function my_initial()
	{
	geo=new google.maps.Geocoder();
	var mymap={
	center:new google.maps.LatLng(28.613939,77.209021),
	zoom:3,
	mapTypeId:google.maps.MapTypeId.ROADMAP
	}
	map=new google.maps.Map(document.getElementById("googlemaps"),mymap);
    setmarkers();
	google.maps.event.addListener(map,'click',function(event){
	marker=new google.maps.Marker({
	position:event.latLng,
	draggable:true,
	map:map,
	animation:google.maps.Animation.DROP
	
	});
	});
	
}
var my_url_only;
function setmarkers()
{
	var url="fetch_my_acc.php";
	load_my_URL(url,function(data){
	var xml=parse_my_XMLdata(data);
	var mnodes=xml.documentElement.getElementsByTagName("marker");
	if(mnodes.length!=0)
	{
	bounds=new google.maps.LatLngBounds();
	for(var i=0;i<mnodes.length;i++)
	{
		
		var link=mnodes[i].getAttribute("link");
		var latlng=new google.maps.LatLng(parseFloat(mnodes[i].getAttribute("lat")),parseFloat(mnodes[i].getAttribute("lng")));
		
		var my_lat=parseFloat(mnodes[i].getAttribute("lat"));
		var my_lng=parseFloat(mnodes[i].getAttribute("lng"));
		my_url_only='remove.php?lat='+my_lat+'&lng='+my_lng+'';
		var html="<a href="+link+">Go to link</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:remove()' title='Remove'><small><span id='dont_need' class='glyphicon glyphicon-trash'></span></small></a>&nbsp;&nbsp;<a href='javascript:editit("+my_lat+","+my_lng+")'><small><span class='glyphicon glyphicon-pencil'></span></small></a>";
		createmarker(parseFloat(mnodes[i].getAttribute('lat')),parseFloat(mnodes[i].getAttribute('lng')),html);
		bounds.extend(latlng);
		
	}
	map.fitBounds(bounds);
	//map.setCentre(bounds.getCentre());
	}
	});
	//map.fitBounds(bounds);

}
function remove()
{
	var r=confirm("Are you sure you want to delete?");
	if(r==true)
	{
		window.location=my_url_only;
	}
}
function update(lat,lng,ans)
{
	window.location="update.php?lat="+lat+"&lng="+lng+"&ans="+ans+"";
}

function editit(lat,lng)
{
var my_link;
var url='fetch_this.php?lat='+lat+'&lng='+lng+'';
	load_my_URL(url,function(data){
	var xml=parse_my_XMLdata(data);
	var mnodes=xml.documentElement.getElementsByTagName("marker");
	var ans=prompt("Say something",mnodes[0].getAttribute('link'));
if(ans!=null)
{
update(lat,lng,ans);
}
});
}

function createmarker(lat,lng,cont)
{
	 var mypin=new google.maps.LatLng(lat,lng);
	 var newpin = new google.maps.Marker({
        position: mypin,
        map: map,
        title: cont
		});
		bounds.extend(mypin);
    newpin['infowindow'] = new google.maps.InfoWindow({
        content: cont
        });
    google.maps.event.addListener(newpin, 'click', function() {//opens an infowindow with the given info for the corresponding marker
        this['infowindow'].open(map, this);
    });
}
//it geocodes the searched place into lat and lng and creates a marker with them
function doit(){
	var myadr = document.getElementById('search').value;
	geo.geocode( { 'address':myadr}, function(results, status){
		if (status == google.maps.GeocoderStatus.OK){
		map.setCenter(results[0].geometry.location);
		map.setZoom(14);
		marker=new google.maps.Marker({
		map:map,
		position:results[0].geometry.location,
		animation:google.maps.Animation.BOUNCE,
		draggable:true
		});
	}
	else{
		alert('Invalid entry!!! Kindly enter again');
		
    }
	});
}
//it saves the data in the database
function savedata()
{
	
	var link=escape(document.getElementById("link").value);
	if(link=="")
	{
	alert("Enter the link and submit again");
	}
	else
	{
	var latlng=marker.getPosition();
	var url="insert_in_db.php?link=" + link + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();
	load_my_URL(url, function(data, responseCode) {
        if (responseCode == 200 ) {
			//alert("hi");
          alert("Location added.");
		  go();
        }
      });
	}
}
function go()
{
	location.reload();
}
//the function requests XMLHttpRequest and calls a callback function, it open the given url and returns the response through responseText
function load_my_URL(url,do_func)
{
	var my_req=window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
	 my_req.onreadystatechange = function() {
        if (my_req.readyState == 4) {
		  document.getElementById("link").value="";
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
google.maps.event.addDomListener(window,'load',my_initial);
</script>
</head>
<body style="background-image:url(../images/2.jpg);">
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">LinkStock</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<!--<li><a href="main.php">Home</a></li>-->
					<li><a href="search.php">Search</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact_us.php">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="<?php
					if(!isset($_SESSION['user']))
					{
						echo "sign_up_page.php";
					}
					else
					{
						echo "logged_in.php";
					}
					?>"><span class="glyphicon glyphicon-user"></span>
					<?php
					//session_start();
					if(!isset($_SESSION['user']))
					{
						echo "Sign Up";
					}
					else
					{
						echo $_SESSION['user'];
					}
					?>
					</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="grad">
	</div>
	<div id="googlemaps" style="height:650px; width:930px" >
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="form-group">
					<h3 style="color:white;">Mark your place and save your link!</h3>
					<label for="search">Find your place</label>
					<input type="text" class="form-control" id="search" placeholder="Search" onchange="doit()" style="width:50%">
				</div>
				<div class="form-group">
					<label for="link">Place your link here</label>
					<input type="text" class="form-control" id="link" placeholder="http://example.com" style="width:50%">
				</div>
				<button type="submit" class="btn btn-default" onclick="savedata()">Submit</button>
				<div class="form-group">
					<label for="link"><br><a href="view_list.php" style="font-size:20px;">View </a> your list of links.</label>
				</div>
			</div>
		</div>
	</div>
</body>
</html>