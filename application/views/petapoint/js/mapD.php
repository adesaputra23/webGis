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

   	let latLng=[<?=$t_desa->lat?>,<?=$t_desa->lng?>];
   	var map = L.map('mapD').setView(latLng, 14);

   	var Layer=L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    });

    map.addLayer(Layer);

	var myStyle2 = {
	    "color": "#ffff00",
	    "weight": 1,
	    "opacity": 0.9
	};

	function popUp(f,l){
	    var html='';
	    if (f.properties){
	    	html+='<table>';
	    	html+='<tr>';
		    	html+='<td>Provinsi</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['PROVINSI']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td>Kecamatan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['KECAMATAN']+'</td>';
	    	html+='</tr>';
	    	html+='</table>';
	        l.bindPopup(html);
	        l.bindTooltip(f.properties['DESA'],{
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


			var myStyle<?=$t_desa->id_desa?> = {
			    "color": "#ffff00",
			    "weight": 2,
			    "opacity": 3
			};

			<?php
			$arrayKec[]='{
			name: "'.$t_desa->nama_desa.'",
			icon: iconByName("'.$t_desa->warna.'"),
			layer: new L.GeoJSON.AJAX(["'.base_url('assets/filegsdesa/').$t_desa->de_geojson.'"],{onEachFeature:popUp,style: myStyle'.$t_desa->id_desa.',pointToLayer: featureToMarker }).addTo(map)
			}';

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
	    	iconSize: [15, 20]
	    }
	});

     var markers = L.markerClusterGroup();

    <?php
	// $jumlah = $this->Stunting_model->p_p_home()->result();
	    foreach ($v_tanda->result() as $value) { ?>
	    		var tanda = L.marker([<?= $value->lat ?>,<?= $value->lng ?>,{icon:myIcon}])
	    		.bindPopup("Nama :<?= $value->nama; ?><br> Alamat : <?= $value->alamat ?><br>Jenis Kelamin : <?= $value->jk ?><br>Umur : <?= $value->umur ?><br>Kategori : <?= $value->ketegori ?><br>Tanggal : <?= $value->tanggal ?><br>" 

				);
				markers.addLayer(tanda);
			

    <?php } ?>
    			
	map.addLayer(markers);


	// var zom = document.querySelector('.zom-in');
	// zom.addEventListener('click', function (){
	// 	map.setView([-8.145076, 112.647458], 5)
	// });

	// -8.127502, 112.573332

	// function keSini(lat,lng){
 //        var latLng=L.latLng(lat, lng);
 //        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);

 //    }


   </script>