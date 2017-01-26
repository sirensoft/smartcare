<?php
$this->title = "MAP";
$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('./lib-gis/leaflet-search.min.css',['async' => false, 'defer' => true]);
$this->registerCssFile('./lib-gis/leaflet.label.css',['async' => false, 'defer' => true]);
$this->registerCssFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css', ['async' => false, 'defer' => true]);
$this->registerCssFile('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', ['async' => false, 'defer' => true]);
$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.0.1/mapbox.js', ['position' => $this::POS_HEAD]);
$this->registerJsFile('./lib-gis/leaflet-search.min.js',['position' => $this::POS_HEAD]);
$this->registerJsFile('./lib-gis/leaflet.label.js',['position' => $this::POS_HEAD]);
$this->registerJsFile('//domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js', ['position' => $this::POS_HEAD]);
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
var map = L.mapbox.map('map').setView([16.74094277,100.27255121], 9); 
L.control.locate().addTo(map);
var baseLayers = {
	"แผนที่ถนน": L.mapbox.tileLayer('mapbox.streets').addTo(map),        
        "แผนที่ดาวเทียม": L.mapbox.tileLayer('mapbox.satellite'),
        
    };
 var _group1 = L.layerGroup().addTo(map);
        
 
 var ic_y   =L.mapbox.marker.icon({'marker-color': '#ffff00'});//y
 var ic_b = L.mapbox.marker.icon({'marker-color': '#0000FF'});//b
 var ic_r = L.mapbox.marker.icon({'marker-color': '#ff0033'});//r
 var ic_w = L.mapbox.marker.icon({'marker-color': '#FFFFFF'});//w
 var ic_bk = L.mapbox.marker.icon({'marker-color': '#333333'});//bk
        
 var pt_layer =L.geoJson($pt_json,{                
            
           onEachFeature:function(feature,layer){   
               
                 //layer.setIcon(L.mapbox.marker.icon({'marker-color': '#0000FF','marker-symbol':'h'}));
                switch(feature.properties.RAPID){
                    case 'blue':
                        layer.setIcon(ic_b);
                        break;
                    case 'yellow':
                        layer.setIcon(ic_y);
                        break;
                    case 'red':
                        layer.setIcon(ic_r);
                        break;
                    case 'black':
                        layer.setIcon(ic_bk);
                        break;
                    default:
                        layer.setIcon(ic_w);
                }
        
                layer.bindPopup(feature.properties.NAME);
                //layer.bindLabel(feature.properties.NAME);              
               
           },
        
           
    }).addTo(_group1);
 map.fitBounds(pt_layer.getBounds());
        
 var overlays = { 
     "ผู้สูงอายุ": _group1, 
 };
        
        
L.control.layers(baseLayers,overlays).addTo(map);
        
        
 //search
    var searchControl = new L.Control.Search({
		layer: pt_layer,
		propertyName: 'SEARCH_TEXT',
		circleLocation: false,
		
    });
    searchControl.on('search:locationfound', function(e) {
				
		if(e.layer._popup)e.layer.openPopup();
    }).on('search:collapsed', function(e) {
		pt_layer.eachLayer(function(layer) {	
			pt_layer.resetStyle(layer);
		});	
    });
    map.addControl( searchControl );  
 //end-search
        
JS;
$this->registerJs($js);
?>