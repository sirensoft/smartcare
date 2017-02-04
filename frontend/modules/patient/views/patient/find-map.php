<?php
$this->title = "FIND MAP";

use yii\helpers\Html;

$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.js', ['position' => $this::POS_HEAD]);
$this->registerJsFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js', ['position' => $this::POS_HEAD]);
?>

<div class="panel panel-info">

    <div class="panel-body" >
        <div id="map" style="width: 100%;height: 75vh;"></div>  
        <div>
            
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="lat" name="lat" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="lon" name="lon" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button id="btnLocate" class="form-control"> พิกัด </button>
                    </div>
                </div>
           
        </div>
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
        
    var pos = [16,100];
        
     var marker = L.marker(pos, {
            draggable: true
     });
     marker.bindPopup("อยู่ที่นี่..")
     marker.addTo(map);
        
     marker.on("dragend", function(e) {
        var m = e.target;
        var position = m.getLatLng();
        map.panTo(new L.LatLng(position.lat, position.lng));
        $('#lat').val(position.lat); 
        $('#lon').val(position.lng); 
    });
    marker.on("drag", function(e) {
        var m = e.target;
        var position = m.getLatLng();        
        $('#lat').val(position.lat); 
        $('#lon').val(position.lng); 
    });
        
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }
    function showPosition(position) {
        lat = position.coords.latitude;
        lng = position.coords.longitude
        map.setView([lat, lng], 16);
        //map.panTo(new L.LatLng(lat,lng));
        $('#lat').val(lat); 
        $('#lon').val(lng); 
        
        var newLatLng = new L.LatLng(lat, lng);
        marker.setLatLng(newLatLng); 
        marker.openPopup();
    }
    $('#btnLocate').on('click',function(){
        getLocation();
    });
        
JS;

$this->registerJs($js);

