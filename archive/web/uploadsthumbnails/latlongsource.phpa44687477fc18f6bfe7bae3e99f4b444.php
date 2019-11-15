<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

    <title>Places Searchbox</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
     body {
  background: #222;
}

h3 {
  margin: 4px 0;
  padding: 5px 0;
  font-family: arial, sans-serif;
  width: 100%;
  color: #fff;
}

a {
  font-family: arial, sans-serif;
  color: #00B2EE;
  text-decoration: none;
}
a:hover {
  color: #55d4ff;
}

#map-canvas {
  width: auto;
  height: 500px;
}

#info {
  color: #222;
}

.lngLat {
  color: #fff;
  margin-bottom: 5px;
}
.lngLat .one {
  padding-left: 250px;
}
.lngLat .two {
  padding-left: 34px;
}

#clipboard-btn {
  float: left;
  margin-right: 10px;
  padding: 6px 8px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}

#info {
  height: 140px;
  float: left;
  margin-bottom: 30px;
  border: solid 2px #eee;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -moz-box-shadow: inset 0 2px 5px #444;
  -webkit-box-shadow: inset 0 2px 5px #444;
  box-shadow: inset 0 2px 5px #444;
}

#info, .lngLat {
  font-family: arial, sans-serif;
  font-size: 12px;
  padding-top: 10px;
  width: 270px;
}

    </style>
    
  </head>
  
  <body onload="initialize()">
 <input id="searchTextField" type="text" size="50">
  <div id="map-canvas"></div>
  <div class="lngLat"><span class="one">Lat</span><span class="two">,Lng</span></div>
</body>
<button id="clipboard-btn" onclick="copyToClipboard(document.getElementById('info').innerHTML)">Copy to Clipboard</button>
<textarea id="info"></textarea>
</html>

<script>
    
 
 function initialize() {
  // Map Center
  var input = document.getElementById('searchTextField');
  var autocomplete = new google.maps.places.Autocomplete(input);
  var myLatLng = new google.maps.LatLng(28.4595, 77.0266);
  
  // General Options
  var mapOptions = {
    zoom: 12,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.RoadMap
  };
  var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          draggable: true,
          anchorPoint: new google.maps.Point(57, 94),
          scaledSize: new google.maps.Size(25, 25)


       });
       
       var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
       
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var geocoder = new google.maps.Geocoder();
        
       
        autocomplete.bindTo('bounds', map);
        
         var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });
  
        
        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }
      
            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
//                alert(place[geometry]);
//               alert(JSON.stringify(place.geometry.location));
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
           
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);          
        
           
            infowindow.setContent(place.formatted_address);
            infowindow.open(map, marker);
           
        });     
       
       
       
  
  // Polygon Coordinates
  var triangleCoords = [
    new google.maps.LatLng(28.3595,77.6266),
    new google.maps.LatLng(28.2595,77.8266),
    new google.maps.LatLng(28.6595,77.2266)
  ]
  // Styling & Controls
  myPolygon = new google.maps.Polygon({
    paths: triangleCoords,
    draggable: true, // turn off if it gets annoying
    editable: true,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });

  myPolygon.setMap(map);
  //google.maps.event.addListener(myPolygon, "dragend", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
  //google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);
}

//Display Coordinates below map
function getPolygonCoords() {
  var len = myPolygon.getPath().getLength();
  var htmlStr = "";
  for (var i = 0; i < len; i++) {
    htmlStr += "new google.maps.LatLng(" + myPolygon.getPath().getAt(i).toUrlValue(5) + "), ";
    //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
    //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
  }
  document.getElementById('info').innerHTML = htmlStr;
}

function copyToClipboard(text) {
  window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}   
  
    google.maps.event.addDomListener(window, 'load', initialize);  
    
</script>
    
