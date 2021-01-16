
<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

 <script src="<?=base_url()?>assets/laflet/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
 <script src="<?=base_url()?>assets/laflet/leaflet.ajax.js"></script>

   <script type="text/javascript">
    <?php     
    $jumlah = $this->Stunting_model->cari_d($tahun)->result();
    foreach ($jumlah as $value) {

        $data[$value->kode_wilayah]=$value->total;

    }
    ?>
    var HOTSPOT = <?=json_encode($data)?>; 

    var map = L.map('mapid').setView([-8.145076, 112.647458], 10);

    var LayerKita=L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.light',
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    });

    map.addLayer(LayerKita);

// control that shows state info on hover
    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function (props) {
        this._div.innerHTML = '<h4>Jumlah Penyebaran Stunting</h4>' +  (props ?
            '<b> KECAMATAN : ' + props.KECAMATAN + '</b><br />' + HOTSPOT[props.KODE] + ' Balita'
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

    var baseLayers = [
        {
            name: "OpenStreetMap",
            layer: LayerKita
        }
    ];

// feature
    function getColor(d) {
        return d > 900  ? '#BD0026' :
                d > 800  ? '#E31A1C' :
                d > 600  ? '#FC4E2A' :
                d > 400   ? '#FD8D3C' :
                d > 200   ? '#FEB24C' :
                d > 100   ? '#FED976' :
                            '#FFEDA0';
    }

var legend = L.control({position: 'bottomright'});


legend.onAdd = function (map) {

        var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 100, 200, 400, 600, 800, 900],
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


    function style(feature) {
        return {
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7,
            fillColor: getColor(HOTSPOT[feature.properties.KODE])
        };
    }

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
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
    
    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    function popUp(f,l){
        var html='';
        if (f.properties){
            l.bindTooltip(f.properties['KECAMATAN'],{
                permanent:true,
                direction:"center",
                className:"no-background"
            });
        }
    }

     <?php
     $getkecamatan=$this->Wilayah_model->get();
        foreach ($getkecamatan->result() as $key) {
            ?>

            <?php
            $arrayKec[]='{
            name: "'.$key->nama_wilayah.'",
            layer: new L.GeoJSON.AJAX(["'.base_url("assets/filegs/").$key->geojson.'"],{
                onEachFeature: popUp
            }).addTo(map)
            }';
        }
    ?>


    <?php
     $getkecamatan=$this->Wilayah_model->get();
        foreach ($getkecamatan->result() as $key) {
            ?>

            <?php
            $arrayKec[]='{
            name: "'.$key->nama_wilayah.'",
            icon: iconByName("'.$key->warna.'"),
            layer: new L.GeoJSON.AJAX(["assets/filegs/'.$key->geojson.'"],{
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
    //     collapsibleGroups: true,
    //     position:'bottomleft'
    // });

    map.addControl(panelLayers);
   </script>