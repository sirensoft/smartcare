<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Driving directions</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='//api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
<link href='//api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css" />


<script src="//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%; }
</style>
</head>
<body>
<style>
#inputs,
#errors,
#directions {
    position: absolute;
    width: 33.3333%;
    max-width: 300px;
    min-width: 200px;
}

#inputs {
    z-index: 10;
    top: 10px;
    left: 10px;
}

#directions {
    z-index: 99;
    background: rgba(0,0,0,.8);
    top: 0;
    right: 0;
    bottom: 100;
    overflow: auto;
}

#errors {
    z-index: 8;
    opacity: 0;
    padding: 10px;
    border-radius: 0 0 3px 3px;
    background: rgba(0,0,0,.25);
    top: 90px;
    left: 10px;
}

</style>

<script src='https://api.mapbox.com/mapbox.js/plugins/mapbox-directions.js/v0.4.0/mapbox.directions.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox.js/plugins/mapbox-directions.js/v0.4.0/mapbox.directions.css' type='text/css' />

<div id='map'></div>
<div id='inputs'></div>
<div id='errors'></div>
<div id='directions'>
  <div id='routes'></div>
 
</div>
<script>
L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
var map = L.mapbox.map('map', 'mapbox.streets', {
    zoomControl: false
}).setView([16, 100], 9);

// move the attribution control out of the way
map.attributionControl.setPosition('bottomleft');

// create the initial directions object, from which the layer
// and inputs will pull data.
var directions = L.mapbox.directions({units: 'metric'});

var directionsLayer = L.mapbox.directions.layer(directions)
    .addTo(map);

var directionsInputControl = L.mapbox.directions.inputControl('inputs', directions)
    .addTo(map);

var directionsErrorsControl = L.mapbox.directions.errorsControl('errors', directions)
    .addTo(map);

var directionsRoutesControl = L.mapbox.directions.routesControl('routes', directions)
    .addTo(map);
    
 var lc = L.control.locate({
    position: 'topright',
    strings: {
        title: "Show me where I am, yo!"
    }
}).addTo(map);


</script>
</body>
</html>