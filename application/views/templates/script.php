<script type="text/javascript">
  
    $('.tambahData').on('click', function() {

        $('#judulModal').html('Tambah Data Tahun');

        $('.simpanData button[type=submit]').html('Simpan');
                $('#id').val('');
                $('#tahun').val('');

    });



    $('.ubahData').on('click', function() {

        $('#judulModal').html('Ubah Data Tahun');

        $('.simpanData button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/Web_gis/tahun/ubah/')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Web_gis/tahun/getubah',
            data: { id: id },
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#tahun').val(data.tahun);

            }
        });
    });

</script>
