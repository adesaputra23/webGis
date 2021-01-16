
<script type="text/javascript">
  var ctx = document.getElementById('myChart_h').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php
                    $jumlah = $this->Stunting_model->l_wilayah($tahun)->result();
                    if (count($jumlah)>0) {
                      foreach ($jumlah as $data) {
                            // $a=($data->total)*(32)/(100);
                        echo "'" .$data->nama_wilayah ."',";
                      }
                    }
          ?>],
        datasets: [{
            label: <?= "'" .$tahun ."',"; ?>
            backgroundColor: '#ADD8E6',
            borderColor: '##93C3D2',
            data: [<?php
            $jumlah = $this->Stunting_model->l_wilayah($tahun)->result();
            if (count($jumlah)>0) {
              foreach ($jumlah as $data) {
                    // $a=($data->total)*(32)/(100);
                echo "'" .$data->total ."',";
              }
            }
          ?>]
        }],
    },
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