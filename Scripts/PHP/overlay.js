		var map;
		var marker;
		var geo;
		var bounds;
		var res;
		//initial function(it loads along with the page)-it loads the map initially
		function my_initial() {
			//alert("1");
		    geo = new google.maps.Geocoder();
		    var mymap = {
		        center: new google.maps.LatLng(28.613939, 77.209021),
		        zoom: 3,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    }
		    map = new google.maps.Map(document.getElementById("googlemaps"), mymap);
		    /*google.maps.event.addListener(map, 'click', function (event) {
		        marker = new google.maps.Marker({
		            position: event.latLng,
		            draggable: true,
		            map: map,
		            animation: google.maps.Animation.DROP

		        });
		    });*/
			doit();

		}
		//it geocodes the searched place into lat and lng and creates a marker with them
		function doit() {
		    var myadr = document.getElementById('add1').value;
			alert(myadr);
		    geo.geocode({
		        'address': myadr
		    }, function (results, status) {
		        if (status == google.maps.GeocoderStatus.OK) {
					//alert("1");
		            map.setCenter(results[0].geometry.location);
		            map.setZoom(14);
		            marker = new google.maps.Marker({
		                map: map,
		                position: results[0].geometry.location,
		                animation: google.maps.Animation.BOUNCE,
		                draggable: true
		            });
		        } else {
					//alert("2");
		            alert('Invalid entry in the address line 1!!! Kindly enter again');

		        }
		    });
		}

		/*function go() {
		    location.reload();
		}
		//the function requests XMLHttpRequest and calls a callback function, it open the given url and returns the response through responseText
		function load_my_URL(url, do_func) {
		    var my_req = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
		    my_req.onreadystatechange = function () {
		        if (my_req.readyState == 4) {
		            document.getElementById("search").value = "";
		            do_func(my_req.responseText, my_req.status);
		            my_req.onreadystatechange = no_func();

		        }
		    };
		    my_req.open('GET', url, true);
		    my_req.send(null);
		}

		function parse_my_XMLdata(data) {
		    if (window.ActiveXObject) {
		        var doc = new ActiveXObject('Microsoft.XMLDOM');
		        doc.loadXML(data);
		        return doc;
		    } else if (window.DOMParser) {
		        return (new DOMParser).parseFromString(data, 'text/xml');
		    }

		}*/
		function change_url() {
			var latlng = marker.getPosition();
			var addr=document.getElementById('add1').value;
			//alert("Changing... "+latlng.lat()+" "+latlng.lng());
		    var url = "saveflat.php?addr=" + addr + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();
			document.getElementById('form1').action=url;
			url=document.getElementById('form1').action;
			//alert(url);
		}
		//function no_func() {}
		//google.maps.event.addDomListener(window, 'load', my_initial);