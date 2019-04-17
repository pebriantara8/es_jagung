
<style>
    .form-wrapper{
        min-width: 800px;
        margin:0px;
    }
    .table{
        border: 1px solid #763498;
    }
    .container{
        color: black;
    }

    h4{
        color: black;
    }
    .p{
        padding: 0px;
        margin:0px;
        font-size: 16px; important!
    }
</style>
		  <div class="container">
			  <div class="form-wrapper">
                <div class="text-center">
                    <h2><strong>Hasil Diagnosa</strong></h2>
                    <h4>Gejala-gelaja yang dipilih</h4>
                </div>
                <br>
                    <table>
                        <tr>
                            <td>Gejala</td>
                            <td>Keterangan</td>
                        </tr>
                        <?php foreach ($gejala as $key => $value) { ?>
                            <tr>
                                <td><?=$value['nama_premis_kategori']?></td>
                                <td><?=$value['nama_premis']?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
		  </div>

            <div class="container">
			  <div class="form-wrapper">
                <div class="text-center">
                    <h4>Diagnosa Penyakit</h4>
                </div>
                <br>
                    <p class="p"><strong>Nama Penyakit:</strong></p>
                    <p><?=$list_penyakit['nama_konklusi']?></p>

                    <br>
                    <p class="p"><strong>Saran:</strong></p>
                </div>
            </div>
            <div class="text-center">
                <a href="<?=base_url()?>diagnosa/sesdes" class="btn btn-secondary">Ulangi Diagnosa</a>
            </div>