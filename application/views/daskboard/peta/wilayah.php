<!-- Make sure you put this AFTER Leaflet's CSS -->
 	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer></script>
	 <script src="<?=base_url()?>assets/laflet/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
	 <script src="<?=base_url()?>assets/laflet/Leaflet.markercluster-master/dist/leaflet.markercluster-src.js"></script>
	 <script src="<?=base_url()?>assets/laflet/leaflet.ajax.js"></script>
	 <script src="<?=base_url('api/data/kecamatan')?>"></script>
	<script src="<?=base_url('api/data/hotspot/point')?>"></script>

   <script type="text/javascript">

   	<?php     
    // $jumlah = $this->Stunting_model->i()->result();
    foreach ($v_kec->result() as $value) {

        $data[strtoupper($value->alamat)]=$value->total;

    }
    ?>
    var HOTSPOT = <?=json_encode($data)?>; 

   	let latLng=[<?=$v_wilayah->lat?>,<?=$v_wilayah->lng?>];
   	var map = L.map('mapwilayah').setView(latLng, 12);

   	var Layer=L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	    maxZoom: 18,
	    id: 'mapbox.light',
	    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
	});

	map.addLayer(Layer);

	// control that shows state info on hover
    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function (props) {
        this._div.innerHTML = '<h4>Jumlah Penyebaran Stunting</h4>' +  (props ?
            '<b> DESA : ' + props.DESA + '</b><br />' + HOTSPOT[props.DESA] + ' Balita'
            : 'Dekatkan mouse untuk melihat');
    };

    info.addTo(map);



    function iconByName(name) {
        return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
    }

    function featureToMarker(feature, latlng) {
        return L.marker(latlng, {
            icon: L.divIcon({
                className: 'marker-'+feature.properties.amenity,
                html: iconByName(feature.properties.amenity),
                iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            })
        });
    }

// feature
    function getColor(d) {
        return d > 100  ? '#BD0026' :
                d > 90  ? '#E31A1C' :
                d > 80  ? '#FC4E2A' :
                d > 60   ? '#FD8D3C' :
                d > 40   ? '#FEB24C' :
                d > 20   ? '#FED976' :
                            '#FFEDA0';
    }

var legend = L.control({position: 'bottomright'});


legend.onAdd = function (map) {

        var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 20, 40, 60, 80, 90, 100],
            labels = [],
            from, to;

        for (var i = 0; i < grades.length; i++) {
            from = grades[i];
            to = grades[i + 1];

            labels.push(
                '<i style="background:' + getColor(from + 1) + '"></i> ' +
                from + (to ? '&ndash;' + to : '+'));
        }

        div.innerHTML = labels.join('<br>');
        return div;
    };

    legend.addTo(map);

	var myIcon = L.Icon.extend({
        options: {
            iconSize: [0, 0]
        }
    });

	function popUp(f,l){
	    var html='';
	    if (f.properties){
	    	html+='<table>';
	    	html+='<tr>';
		    	html+='<td>KECAMATAN</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['KECAMATAN']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td>DESA</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['DESA']+'</td>';
	    	html+='</tr>';
	    	html+='</table>';
	        l.bindPopup(html);
	        l.bindTooltip(html='<p text-color:black; style="font-size: 9px;">'+f.properties['DESA'],{
	        	permanent:true,
	        	direction:"center",
	        	className:"no-background"
	        });
	    }
	}

	// legend

	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
				iconSize: [20, 38],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}

	var baseLayers = [
		{
			name: "OpenStreetMap",
			layer: Layer
		}
	];

	function style(feature) {
        return {
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7,
            fillColor: getColor(HOTSPOT[feature.properties.DESA])
        };
    }

	function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#ccff33',
            dashArray: '',
            fillOpacity: 0.7
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }

        info.update(layer.feature.properties);

    }

    function resetHighlight(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3'
        });

        info.update();

    } 

    //console.log();

	function zoomToFeature(e,feature, properties) {
        map.fitBounds(e.target.getBounds());

     var desa = e.target.feature.properties.DESA;
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

     var myStyle = {
                "weight": 0,
                "opacity": 0
            };

    <?php
		//$getKecamatan=$this->Wilayah_model->get();
		// $lihat = $this->Desa_model->get()->result();

		foreach ($v_desa->result() as $row) {
			?>
			<?php
			$arrayKec[]='{
			name: "'.$row->nama_desa.'",
			icon: iconByName("'.$row->warna.'"),
			layer: new L.GeoJSON.AJAX(["'.base_url('assets/filegsdesa/').$row->de_geojson.'"],{
				style: myStyle,
				onEachFeature: popUp
			}).addTo(map)
			}';
		}
	?>

	<?php
		//$getKecamatan=$this->Wilayah_model->get();
		// $lihat = $this->Desa_model->get()->result();

		foreach ($v_desa->result() as $row) {
			?>
			<?php
			$arrayKec[]='{
			name: "'.$row->nama_desa.'",
			icon: iconByName("'.$row->warna.'"),
			layer: new L.GeoJSON.AJAX(["'.base_url('assets/filegsdesa/').$row->de_geojson.'"],{
				style: style,
				onEachFeature: onEachFeature
			}).addTo(map)
			}';
		}
	?>

	var overLayers = [{
		group: "Layer Kecamatan",
		layers: [
			<?=implode(',', $arrayKec);?>
		]
	}
	];

	// var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
	// 	collapsibleGroups: true
	// });

	// map.addControl(panelLayers);

	// marker
	var myIcon = L.Icon.extend({
	    options: {
	    	iconSize: [30, 40]
	    }
	});

	var myIcon2 = L.Icon.extend({
	    options: {
	    	iconSize: [20, 30]
	    }
	});


	



	// var myArr = 
	// console.log(myArr);
	 


	



   </script>