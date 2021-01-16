
<script type="text/javascript">

var canvas = document.getElementById('myChart');
new Chart(canvas, {
  type: 'line',
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
        label: <?= "'" .$tahun1 ."',"; ?>
        yAxesGroup: 'A',
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        lineTension: 0.3,
        data: [ <?php
            // $jumlah = $this->Desa_model->chard1($tahun1)->result();
            
              foreach ($chard1 as $data) {
                    // $a=($data->total)*(32)/(100);
                echo "'" .$data->total ."',";
              }
            
          ?>  ]
      },
      {
        label: <?= "'" .$tahun2 ."',"; ?>
        yAxesGroup: 'B',
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        lineTension: 0.3,
        data: [ <?php
            //$jumlah = $this->Desa_model->chard2($tahun2)->result();
            
              foreach ($chard2 as $data) {
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

function saveAsPDF() {
   html2canvas(document.getElementById("chart-container"), {
      onrendered: function(canvas) {
         var img = canvas.toDataURL(); //image data of canvas
         var doc = new jsPDF();
         doc.addImage(img, 10, 10);
         doc.save('Grafik.pdf');
      }
   });
}



</script>