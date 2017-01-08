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
        
 var overlays = {   
       
        
               
    };
L.control.layers(baseLayers,overlays).addTo(map);
        
JS;
$this->registerJs($js);
?>