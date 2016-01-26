<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Google map in a lightbox</title>
    <style>
      #map { height: 500px; visibility: hidden; width: 500px; }
    </style>
  </head>
  <body>
    <h1 id="title">view map</h1>
    <div id="map"></div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox_me.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var mapOptions = {
          center: new google.maps.LatLng(45.5236, -122.6750),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        window.setTimeout(function() {
          $('#map').css('display', 'none').css('visibility', 'visible');
        }, 500);
        $('#title').click(function() {
          $('#map').lightbox_me();
        });
      });
    </script>
  </body>
</html>