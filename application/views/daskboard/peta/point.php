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

	    		$ab = $this->Tahun_model->get_status(); 
	    		foreach ($ab->result() as $key) { 
	    			 $this->db->select('kode_wilayah,tahun, COUNT(kode_wilayah) as total');
			        $this->db->from('tb_stunting');
			        $this->db->group_by('kode_wilayah');
			        $this->db->group_by('tahun');
			        $this->db->where('tahun', $key->tahun);
			        $this->db->order_by('total', 'desc');
			       $db = $this->db->get();
		      	 foreach ($db->result() as $row_2018) { 
		      	 $data_2018[$row_2018->kode_wilayah]=$row_2018->total;
		      	 } 

		     }

		     ?>

		var hospot_2018= <?=json_encode($data_2018,JSON_PRETTY_PRINT);?>

   	var map = L.map('map_h').setView([-8.104401, 112.645528], 10);

   	var Layer=L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	    maxZoom: 18,
	    id: 'mapbox.light',
	    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
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
	    	html+='<table border="1">';
	    	html+='<tr>';
		    	html+='<td> PROVINSI </td>';
		    	html+='<td> '+f.properties['PROVINSI']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td> KECAMATAN</td>';
		    	html+='<td> '+f.properties['KECAMATAN']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td align="center"><b>Tahun</b></td>';
		    	html+='<td align="center"><b>Jumlah Penderita</b></td>';
		   	html+='</tr>';
	    	<?php
	    		$ab = $this->Tahun_model->get_status(); 
	    		foreach ($ab->result() as $key) { ?>
	    		html+='<tr>';
		      	html+='<td align="center">'+'<?=$key->tahun?>'+'</td>';
		      	<?php if ($key->tahun == true) {?>
				html+='<td align="center">'+hospot_2018[f.properties.KODE]+' Balita'+'</td>';
				<?php	} else {?>
				html+='<td align="center">'+'Tidak ada data'+'</td>';
	    	<?php } ?>
	    	html+='</tr>';
	    	<?php } ?>
	    	html+='</table>';

	        l.bindPopup(html);
	        l.bindTooltip(html='<p text-color:black; style="font-size: 9px;">'+f.properties['KECAMATAN'],{
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

	<?php
		$getKecamatan=$this->Wilayah_model->get();
		foreach ($getKecamatan->result() as $row) {
			?>

			var myStyle<?=$row->id_wilayah?> = {
			    "color": "<?=$row->warna?>",
			    "weight": 1,
			    "opacity": 1
			};

			<?php
			$arrayKec[]='{
			name: "'.$row->nama_wilayah.'",
			icon: iconByName("'.$row->warna.'"),
			layer: new L.GeoJSON.AJAX(["'.base_url('assets/filegs/').$row->geojson.'"],{onEachFeature:popUp,style: myStyle'.$row->id_wilayah.',pointToLayer: featureToMarker }).addTo(map)
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

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
		collapsibleGroups: true
	});

	map.addControl(panelLayers);

	// marker
	var myIcon = L.Icon.extend({
	    options: {
	    	iconSize: [15, 20]
	    }
	});


   // var markers = L.markerClusterGroup();

    			
	//map.addLayer(markers);


   
   </script>