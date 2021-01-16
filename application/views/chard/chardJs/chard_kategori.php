<script type="text/javascript">
	
	var canvas = document.getElementById('Chart_k');
new Chart(canvas, {
  type: 'bar',
  data: {
    labels: [ <?php
                   // $jumlah = $this->Stunting_model->l_wilayah($tahun)->result();
                    
                      foreach ($name as $data) {
                            // $a=($data->total)*(32)/(100);
                        echo "'" .$data->nama_wilayah ."',";
                      
                    }
          ?>],
    datasets: [
      {
        label: "Pendek",
        yAxesGroup: 'A', 
        backgroundColor: '#00bfff',
        data: [ <?php
            // $jumlah = $this->Desa_model->chard1($tahun1)->result();
            
              foreach ($pendek as $data) {
                    // $a=($data->total)*(32)/(100);
                echo "'" .$data->total ."',";
              }
            
          ?>  ]
      },
      {
        label: "Sangat Pendek",
        yAxesGroup: 'B',
        backgroundColor: '#99ff99',
        data: [ <?php
            //$jumlah = $this->Desa_model->chard2($tahun2)->result();
            
              foreach ($s_pendek as $data) {
                    // $a=($data->total)*(32)/(100);
                echo "'" .$data->total ."',";
              
            }
          ?> ]
      }
    ]
  },
  options: {
    yAxes: [
      {
        name: 'A',
        type: 'linear',
        position: 'left',
        scalePositionLeft: true
      },
      {
        name: 'B',
        type: 'linear',
        position: 'right',
        scalePositionLeft: false,
        min: 0,
        max: 1
      }
    ]
  }
});



</script>