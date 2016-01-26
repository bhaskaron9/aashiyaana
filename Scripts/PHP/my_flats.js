		
	var map;
	var marker;
	var geo;
	var bounds;
	var remove_url;
	var detail_url;
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
}

function setmarkers()
{
	var url="fetch_my_acc.php";
	//alert("1");
	load_my_URL(url,function(data){
		//alert("2");
	var xml=parse_my_XMLdata(data);
	//alert("hi");
	var mnodes=xml.documentElement.getElementsByTagName("flat");
	if(mnodes.length!=0)
	{
		//alert("hi");
	bounds=new google.maps.LatLngBounds();
	for(var i=0;i<mnodes.length;i++)
	{
		
		var latlng=new google.maps.LatLng(parseFloat(mnodes[i].getAttribute("lat")),parseFloat(mnodes[i].getAttribute("lng")));
		
		var my_lat=parseFloat(mnodes[i].getAttribute("lat"));
		var my_lng=parseFloat(mnodes[i].getAttribute("lng"));
		remove_url='remove.php?lat='+my_lat+'&lng='+my_lng+'';
		detail_url='detail.php?lat='+my_lat+'&lng='+my_lng+'';
		var html="<a href='"+detail_url+"'>Go to link</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:remove()' title='Remove'><small><span id='dont_need' class='glyphicon glyphicon-trash'></span></small></a>&nbsp;&nbsp;<a href='javascript:editit("+my_lat+","+my_lng+")'><small><span class='glyphicon glyphicon-pencil'></span></small></a>";
		//alert(i);
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
		window.location=remove_url;
	}
}
function editit(lat,lng)
{

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
google.maps.event.addDomListener(window,'load',my_initial);