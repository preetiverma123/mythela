<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA-OBGAXvwI7wTNLbNT1l57Kjno8B8PK6Q&sensor=false"></script>
  <script type="text/javascript">
    var directionDisplay, map;
    var directionsService = new google.maps.DirectionsService();
    var geocoder = new google.maps.Geocoder();
    function initialize() {
// set the default center of the map
var latlng = new google.maps.LatLng(51.764696,5.526042);
// set route options (draggable means you can alter/drag the route in the map)
var rendererOptions = { draggable: true };
directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
// set the display options for the map
var myOptions = {
  zoom: 18,
  center: latlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  mapTypeControl: false
};
// add the map to the map placeholder
map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
// bind the map to the directions
directionsDisplay.setMap(map);
// point the directions to the container for the direction details
directionsDisplay.setPanel(document.getElementById("directionsPanel"));
// start the geolocation API
if (navigator.geolocation) {
// when geolocation is available on your device, run this function
navigator.geolocation.getCurrentPosition(foundYou, notFound);
} else {
// when no geolocation is available, alert this message
alert('Geolocation not supported or not enabled.');
}
}
function foundYou(position) {
// convert the position returned by the geolocation API to a google coordinate object
var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
// then try to reverse geocode the location to return a human-readable address
geocoder.geocode({'latLng': latlng}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
// if the geolocation was recognized and an address was found
if (results[0]) {
// add a marker to the map on the geolocated point
marker = new google.maps.Marker({
  position: latlng,
  map: map
});
// compose a string with the address parts
var address = results[0].address_components[1].long_name+' '+results[0].address_components[0].long_name+', '+results[0].address_components[3].long_name
// set the located address to the link, show the link and add a click event handler
$('.autoLink span').html(address).parent().show().click(function(){
// onclick, set the geocoded address to the start-point formfield
$('#routeStart').val(address);
// call the calcRoute function to start calculating the route
calcRoute();
});
}
} else {
// if the address couldn't be determined, alert and error with the status message
alert("Geocoder failed due to: " + status);
}
});
}
function calcRoute() {
// get the travelmode, startpoint and via point from the form  
var travelMode = $('input[name="travelMode"]:checked').val();
var start = $("#routeStart").val();
var end = $("#routeEnd").val();
// compose a array with options for the directions/route request
var request = {
  origin: start,
  destination: end,
  unitSystem: google.maps.UnitSystem.IMPERIAL,
  travelMode: google.maps.DirectionsTravelMode[travelMode]
};
// call the directions API
directionsService.route(request, function(response, status) {
  if (status == google.maps.DirectionsStatus.OK) {
// directions returned by the API, clear the directions panel before adding new directions
$('#directionsPanel').empty();
// display the direction details in the container
directionsDisplay.setDirections(response);
} else {
// alert an error message when the route could nog be calculated.
if (status == 'ZERO_RESULTS') {
  alert('No route could be found between the origin and destination.');
} else if (status == 'UNKNOWN_ERROR') {
  alert('A directions request could not be processed due to a server error. The request may succeed if you try again.');
} else if (status == 'REQUEST_DENIED') {
  alert('This webpage is not allowed to use the directions service.');
} else if (status == 'OVER_QUERY_LIMIT') {
  alert('The webpage has gone over the requests limit in too short a period of time.');
} else if (status == 'NOT_FOUND') {
  alert('At least one of the origin, destination, or waypoints could not be geocoded.');
} else if (status == 'INVALID_REQUEST') {
  alert('The DirectionsRequest provided was invalid.');        
} else {
  alert("There was an unknown error in your request. Requeststatus: nn"+status);
}
}
});
}
</script>
</head>
<body onload="initialize()">
  <div id="map_canvas" style="width:400px; height:300px"></div>
  <form action="#" onSubmit="calcRoute();return false;" id="routeForm">
    <label>
      From: <br />
      <input type="text" id="routeStart" value="kruisstraat 50, oss">
      <a href="#" class="autoLink" style="display: none;">Use current location: <span>not found</span></a>
    </label>
    <label>
      To: <br />
      <input type="text" id="routeEnd" value="ridderhof 69, oss">
    </label>
    <label style="display:none"><input type="radio" name="travelMode" value="DRIVING" checked /> Driving</label>
<!--    <label><input type="radio" name="travelMode" value="BICYCLING" /> Bicylcing</label>
    <label><input type="radio" name="travelMode" value="TRANSIT" /> Public transport</label>
    <label><input type="radio" name="travelMode" value="WALKING" /> Walking</label>-->
    <input type="submit" value="Calculate route">
  </form>
  <div id="directionsPanel">
    Enter a starting point and click "Calculate route".
  </div>
</body>
</html>
