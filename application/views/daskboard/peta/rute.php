<!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer></script>
     <script src="<?=base_url()?>assets/laflet/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
     <script src="<?=base_url()?>assets/laflet/leaflet.ajax.js"></script>
      <script src="<?=base_url('assets/laflet/leaflet-search-master/dist/leaflet-search.src.js')?>"></script>
     <script src="<?=base_url('assets/laflet/leaflet-routing-machine/dist/leaflet-routing-machine.js')?>"></script>
     <script src="<?=base_url('assets/laflet/leaflet-routing-machine/examples/Control.Geocoder.js')?>"></script>
   <script type="text/javascript">
     var data = [
    
    <?php
          foreach ($v_tampil as $key) { 
            if ($key->lat < 0) {
            ?>
           
           {"lokasi":[<?=$key->lat?>,<?=$key->lng?>],
            "nama":"<?=$key->nama?>",
             "btn":"<button class='btn btn-primary text-white mt-2 btn-sm' onclick='return keSini(<?=$key->lat?>,<?=$key->lng?>)'>Ke sini</button>",
             "desa":"<?=$key->alamat?>",
             "kecamatan":"<?=$key->nama_wilayah?>",
             "kategori":"<?=$key->ketegori?>",
             "umur":"<?=$key->umur?>",
             "jk":"<?=$key->jk?>"
             },
        <?php 
                }
         } 

         ?>
    ];

    let latLng=[-8.138695, 112.571943];

    var map = L.map('rute_h').setView(latLng, 14);

    map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')); //base layer

    var markersLayer = new L.LayerGroup();  //layer contain searched elements
    
     map.addLayer(markersLayer);

    var controlSearch = new L.Control.Search({
    position:'topleft',    
    layer: markersLayer,
    initial: false,
    zoom: 16,
  });


 map.addControl(controlSearch);

  ////////////populate map with markers from sample data
  for(i in data) {
    var nama = data[i].nama;  //value searched
    var lokasi = data[i].lokasi;    //position found
    var btn = data[i].btn;    //position found
    var desa = data[i].desa;    //position found
    var kecamatan = data[i].kecamatan;    //position found
    var kategori = data[i].kategori;    //position found
    var umur = data[i].umur;    //position found
    var jk = data[i].jk;  //position found
    var marker1 = new L.Marker(new L.latLng(lokasi), {title: nama} );//se property searched
           marker1.bindPopup( innerHTML = 'Nama : ' + nama +'<br>' +
                                          'Umur : ' + umur + ' Bulan' +'<br>' +
                                          'Jenis Kelamin : ' + jk +'<br>' +
                                          'Kategori : ' + kategori +'<br>' +
                                          'Desa : ' + desa + '<br>' +
                                          'Kecamatan : ' + kecamatan + '<br>' +
                                           btn
            );
        markersLayer.addLayer(marker1);
  }


    // marker
    var myIcon = L.Icon.extend({
        options: {
            iconSize: [34, 42]
        }
    });

    // ambil titik
    getLocation();
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      $("[name=latNow]").val(position.coords.latitude);
      $("[name=lngNow]").val(position.coords.longitude);
    }

   
 

    //rute
    var control = L.Routing.control({
        waypoints: [
            latLng
        ],
        geocoder: L.Control.Geocoder.nominatim(),
        routeWhileDragging: true,
        reverseWaypoints: true,
        showAlternatives: true,
        altLineOptions: {
            styles: [
                {color: 'black', opacity: 0.15, weight: 9},
                {color: 'white', opacity: 0.8, weight: 6},
                {color: 'blue', opacity: 0.5, weight: 5}
            ]
        },
        createMarker: function (i, waypoint, n) {
            let urlIcon;
            console.log(i+", "+n);
            var pos=i+1;
            if(pos==1){
                urlIcon='<?=base_url('assets/icons/icon-user.png')?>';
            }
            else if(pos==n){
                urlIcon='<?=base_url('assets/icons/icon-dest.png')?>';
            }
            else{
                urlIcon='<?=base_url('assets/icons/icon-step.png')?>';
            }

            const marker = L.marker(waypoint.latLng, {
              draggable: true,
              bounceOnAdd: false,
              bounceOnAddOptions: {
                function() {
                  (bindPopup(myPopup).openOn(map))
                }
              },
              icon: L.icon({
                iconUrl: urlIcon,
                iconSize: [38, 48]
              })
            });
            return marker;
          }
    })
    control.addTo(map);

    function keSini(lat,lng){
        var latLng=L.latLng(lat, lng);
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);

    }

   </script>