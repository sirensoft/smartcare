<?php
$this->title = "MAP";
$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.css', ['async' => false, 'defer' => true]);
//$this->registerCssFile('./lib-gis/leaflet-search.min.css',['async' => false, 'defer' => true]);
//$this->registerCssFile('./lib-gis/leaflet.label.css',['async' => false, 'defer' => true]);

//$this->registerCssFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css', ['async' => false, 'defer' => true]);
//$this->registerCssFile('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', ['async' => false, 'defer' => true]);

$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.js', ['position' => $this::POS_HEAD]);
//$this->registerJsFile('./lib-gis/leaflet-search.min.js',['position' => $this::POS_HEAD]);
//$this->registerJsFile('./lib-gis/leaflet.label.js',['position' => $this::POS_HEAD]);

//$this->registerJsFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js', ['position' => $this::POS_HEAD]);


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
       
           
L.mapbox.accessToken = 'pk.eyJ1IjoibHRjIiwiYSI6ImNpeWUya3NkcTAwdTEyd214N3R0MWt0dmoifQ.q7C6rPbI2hphy4yMIMW82w';
var map = L.mapbox.map('map').setView([16.74094277,100.27255121], 9); 

var baseLayers = {
	"แผนที่ถนน": L.mapbox.tileLayer('mapbox.streets').addTo(map),        
        "แผนที่ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
        
    };
 
        

L.control.layers(baseLayers,{}).addTo(map);
        

        
JS;

$this->registerJs($js);
?>