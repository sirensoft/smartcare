<?php
$this->title = "FIND MAP";

$lat = \Yii::$app->request->get('lat');
$lon = \Yii::$app->request->get('lon');
$z = 16;
if (empty($lat) or empty($lon)) {
    $lat = 16;
    $lon = 100;
    $z = 8;
}

use yii\helpers\Html;

$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.js', ['position' => $this::POS_HEAD]);
$this->registerJsFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js', ['position' => $this::POS_HEAD]);
?>

<div class="panel panel-info">

    <div class="panel-body" >
        <div id="map" style="width: 100%;height: 80vh;"></div>  


        <table style="margin-top: 3px">
            <tr>
                <td>
                    <input type="text" id="lat" name="lat" class="form-control" value="<?= $lat ?>">
                </td>
                <td>
                    <input type="text" id="lon" name="lon" class="form-control" value="<?= $lon ?>">
                </td>
                <td>
                    <button id="btnLocate" class="form-control"> <i class="glyphicon glyphicon-map-marker"></i> </button>
                </td>
                <td>
                    <button id="btnOk" class="form-control" style="margin-left: 10px"> ตกลง </button>
                </td>
            </tr>
        </table>


    </div>

</div>
<?php
$js = <<<JS
    L.mapbox.accessToken = 'pk.eyJ1IjoidGVobm5uIiwiYSI6ImNpZzF4bHV4NDE0dTZ1M200YWxweHR0ZzcifQ.lpRRelYpT0ucv1NN08KUWQ';
    var map = L.map('map');
    var baseLayers = {
	"แผนที่ถนน": L.mapbox.tileLayer('mapbox.streets'),        
        "แผนที่ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite').addTo(map),
       
        
    }; 
     map.setView(new L.LatLng($lat,$lon), $z);
     
     //L.control.locate().addTo(map);
     L.control.layers(baseLayers,{}).addTo(map);
      
   
    var marker = L.marker([$lat,$lon], {
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
    
    var options = { enableHighAccuracy: true, maximumAge: 100, timeout: 50000 };
        
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition,showErr,options);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }
    function showErr(err){
        alert('err');
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
        
    $('#btnOk').click(function(){
         window.opener.$('#patient-lat').val($('#lat').val());
         window.opener.$('#patient-lon').val($('#lon').val());
         window.close();
    });
        
JS;

$this->registerJs($js);

