<?php
$this->title = "MAP";
$this->registerCssFile('https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css', ['async' => false, 'defer' => true]);

$this->registerJsFile('https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js', ['position' => $this::POS_HEAD]);
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>บ้าน CASE</b>       
    </div>
    <div class="panel-body" >
        <div id="map" style="width: 100%;height: 75vh;"></div>   
    </div>
    <div class="panel-footer" id="info">

    </div>
</div>


<?php
$js = <<<JS
        

            
L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
var map = L.mapbox.map('map').setView([16,100], 9); 
var baseLayers = {
	"แผนที่ถนน": L.mapbox.tileLayer('mapbox.streets').addTo(map),        
        "แผนที่ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
        
    };
        
 var overlays = {  };
 var ic1   =L.mapbox.marker.icon({'marker-color': '#40ff00'});
 var ic2 = L.mapbox.marker.icon({'marker-color': '#0000FF'});
 var ic3 = L.mapbox.marker.icon({'marker-color': '#ff0033'});  
        
L.marker([16.619849, 100.107535], {icon:ic1}).addTo(map).bindPopup('นาย ก');
L.marker([16.617849, 100.127535], {icon:ic2}).addTo(map).bindPopup('นาย ข');
L.marker([16.607849, 100.117535], {icon:ic3}).addTo(map).bindPopup('นาย ค');
L.marker([16.707849, 100.317535], {icon:ic2}).addTo(map).bindPopup('นาง ง');
L.marker([16.627849, 100.117535], {icon:ic1}).addTo(map).bindPopup('นาง จ');
L.control.layers(baseLayers,overlays).addTo(map);
        
JS;
$this->registerJs($js);
?>