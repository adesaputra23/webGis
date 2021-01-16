   <link rel="stylesheet" href="<?=base_url('assets/laflet/leaflet-search-master/dist/leaflet-search.src.css')?>" />
   <link rel="stylesheet" href="<?=base_url('assets/laflet/leaflet-routing-machine/dist/leaflet-routing-machine.css')?>" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <link rel="stylesheet" href="<?=base_url()?>assets/laflet/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/laflet/Leaflet.markercluster-master/dist/MarkerCluster.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/laflet/Leaflet.markercluster-master/dist/MarkerCluster.Default.css" />

  <link href="<?= base_url('assets/');?>jquery/jquery.min.js" rel="stylesheet">

   <style type="text/css">
    #mapid { height: 100vh; }
    .icon {
    display: inline-block;
    margin: 2px;
    height: 16px;
    width: 16px;
    background-color: #ccc;
    }
    .icon-bar {
        background: url('<?=base_url()?>assets/laflet/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
    }
    .info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
    .legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }

    .panelLayers {width: 18px; height: 20px;}

    .leaflet-tooltip.no-background{
      background: transparent;
      border:0;
      font-size: 8px;
      box-shadow: none;
      color: #fff;
      font-weight: bold;
      text-shadow: 1px 1px 1px #000,-1px 1px 1px #000,1px -1px 1px #000,-1px -1px 1px #000;
    }
   
   </style>
</head>
<body>