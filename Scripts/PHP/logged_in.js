		var map;
		var marker;
		var geo;
		var bounds;
		//initial function(it loads along with the page)-it loads the map initially
		function my_initial() {
		    geo = new google.maps.Geocoder();
		    var mymap = {
		        center: new google.maps.LatLng(28.613939, 77.209021),
		        zoom: 3,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    }
		    map = new google.maps.Map(document.getElementById("googlemaps"), mymap);
		    google.maps.event.addListener(map, 'click', function (event) {
		        mark_it(event.latLng);
		        marker = new google.maps.Marker({
		            position: event.latLng,
		            draggable: true,
		            map: map,
		            animation: google.maps.Animation.DROP

		        });
		    });

		}
		//it geocodes the searched place into lat and lng and creates a marker with them
		function doit() {
		    var myadr = document.getElementById('search').value;
		    geo.geocode({
		        'address': myadr
		    }, function (results, status) {
		        if (status == google.maps.GeocoderStatus.OK) {
		            map.setCenter(results[0].geometry.location);
		            map.setZoom(14);
		            marker = new google.maps.Marker({
		                map: map,
		                position: results[0].geometry.location,
		                animation: google.maps.Animation.BOUNCE,
		                draggable: true
		            });
		            reverse_it(results[0].geometry.location);
		        } else {
		            alert('Invalid entry!!! Kindly enter again');

		        }
		    });
		}

		function reverse_it(latlng) {
		    geo.geocode({
		        'location': latlng
		    }, function (results, status) {
		        if (status == google.maps.GeocoderStatus.OK) {
		            if (results[0]) {
		                var x = document.getElementsByClassName('details');
		                var i;
		                for (i = 0; i < x.length; i++) {
		                    x[i].value = "";
		                }
		                var array = results[0].address_components;
		                document.getElementsByClassName('details').value = "";
		                for (var i = 0; i < results.length; i++) {
		                    if (results[i].types[0] === "locality") {
		                        document.getElementById('city').value = results[i].address_components[0].long_name;
		                        document.getElementById('state').value = results[i].address_components[2].long_name;

		                    }
		                    if (results[i].types[0] === "country") {
		                        document.getElementById('country').value = results[i].address_components[0].long_name;
		                    }
		                    if (results[i].types[0] === "neighborhood") {
		                        document.getElementById('neighborhood').value = results[i].address_components[0].long_name;
		                    }
		                    if (results[i].types[0] === "postal_code") {
		                        document.getElementById('postal_code').value = results[i].address_components[0].long_name;
		                    }
		                }
		            }
		        }
		    });
		}

		function mark_it(latlng) {
		    geo.geocode({
		        'location': latlng
		    }, function (results, status) {
		        if (status == google.maps.GeocoderStatus.OK) {
		            if (results[0]) {
		                var x = document.getElementsByClassName('details');
		                var i;
		                for (i = 0; i < x.length; i++) {
		                    x[i].value = "";
		                }
		                var array = results[0].address_components;
		                document.getElementById('search').value = results[0].formatted_address;
		                for (var i = 0; i < results.length; i++) {

		                    if (results[i].types[0] === "locality") {
		                        document.getElementById('city').value = results[i].address_components[0].long_name;
		                        document.getElementById('state').value = results[i].address_components[2].long_name;

		                    }
		                    if (results[i].types[0] === "country") {
		                        document.getElementById('country').value = results[i].address_components[0].long_name;
		                    }
		                    if (results[i].types[0] === "neighborhood") {
		                        document.getElementById('neighborhood').value = results[i].address_components[0].long_name;
		                    }
		                    if (results[i].types[0] === "postal_code") {
		                        document.getElementById('postal_code').value = results[i].address_components[0].long_name;
		                    }

		                }
		            }
		        }
		    });
		}

		function savedata() {

		    var addr = escape(document.getElementById("search").value);
		    var latlng = marker.getPosition();
		    var url = "insert_in_db.php?addr=" + addr + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();
		    load_my_URL(url, function (data, responseCode) {
		        if (responseCode == 200) {
		            //alert("hi");
		            alert("Property added.");
		            go();
		        }
		    });
		}

		function go() {
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

		}

		function no_func() {}
		google.maps.event.addDomListener(window, 'load', my_initial);