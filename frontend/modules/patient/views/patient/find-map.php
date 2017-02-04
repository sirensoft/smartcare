<?php
$this->title = "FIND MAP";


$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.js', ['position' => $this::POS_HEAD]);
$this->registerJsFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js', ['position' => $this::POS_HEAD]);
?>

<div class="panel panel-info">
    
    <div class="panel-body" >
        <div id="map" style="width: 100%;height: 75vh;"></div>   
    </div>    
</div>
<?php

$js = <<<JS
    L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
    var map = L.map('map');
    var baseLayers = {
	"แผนที่ถนน": L.mapbox.tileLayer('mapbox.streets').addTo(map),        
        "แผนที่ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
        
    }; 
     map.setView(new L.LatLng(16,100), 8);
     
     L.control.locate().addTo(map);
     L.control.layers(baseLayers,{}).addTo(map);
JS;

$this->registerJs($js);

