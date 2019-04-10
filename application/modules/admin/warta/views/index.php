                <div class="row">

                    <div class="col-lg-12">

                        <div id="s_a">
                            <div id="s_a_in">
                                <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>

                            </div>
                        </div>

                        <a href="<?php echo backend_url().$this->modul ?>/form" class="btn btn-primary btn-rounded">Tambah Post Baru</a>

                        <form action="<?php echo backend_url().$this->modul ?>" method="get" accept-charset="utf-8">
                        <div class="top_table">
                            <div class="search-table">
                                <div style="position: absolute; right: 0;">
                                    <select class="select-o-tbl" name="month">
                                        <option value="">Semua bulan</option>
                                        <?php for($i=1; $i < 13; $i++) { ?>
                                            <option <?php echo $this->input->get('month')==$i?' selected':'' ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                    <select class="select-o-tbl" name="year">
                                        <option value="">Semua tahun</option>
                                        <?php foreach ($list_tahun as $value): ?>
                                            <option <?php echo $this->input->get('year')==$value?' selected':'' ?> value="<?php echo $value ?>"><?php echo $value ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="text" class="form-search-table" name="search" value="<?php echo $this->input->get('search') ?>">
                                    <button type="submit" class="btn-search-table">Filter</button>
                                </div>
                            </div>
                        </div>
                        </form>

                        <div class="card">
                            <div class="card-title">
                                <h4>Data </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered custom_hover_link">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Kategori</th>
                                                <th>File</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-color-csm">
                                        <?php $no_urut = $no_urut; ?>
                                        <?php foreach ($list_data as $key => $value): ?>
                                            <tr>
                                                <th scope="row"><?php echo $no_urut; $no_urut++; ?></th>
                                                <td>
                                                    <div class="cr_ti">
                                                        <?php echo $value['title'] ?>
                                                    </div>
                                                    <div class="action-table-link">
                                                        <a href="<?php echo backend_url().$this->modul ?>/form/<?php echo $value['id_warta'] ?>" id="edit_post" title="edit">Edit</a> | 
                                                        <a href="<?php echo backend_url().$this->modul ?>/to_draft/<?php echo $value['id_warta'] ?>" id="arsip_post" title="simpan ke draft">Draft</a> | 
                                                        <a href="<?php echo backend_url().$this->modul ?>/arsip/<?php echo $value['id_warta'] ?>" id="arsip_post" title="arsipkan">Hapus</a>
                                                    </div>
                                                </td>
                                                <td><?php echo $value['name'] ?></td>
                                                <td><?php echo $value['nama_pelayanan'] ?></td>
                                                <td>
                                                    <a target="_blank" href="<?php echo base_url() ?>public/warta/<?php echo $value['file'] ?>" title="">lihat</a>
                                                </td>
                                                <td><?php echo date('d/m/Y H:i:s', strtotime($value['date'])) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php if (!$list_data): ?>                                            
                                            <tr>
                                                <td colspan="6"><center>Tidak ada data</center></td>
                                            </tr>
                                        <?php endif ?>
                                        </tbody>
                                    </table>

                                    <div class="pgn-l-d">                                        
                                        <ul class="pagination">
                                          <?php echo $this->pagination->create_links(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

<!-- <script>
  $('a#arsip_post').confirm({
      title: 'Confirm?',
      content: 'Anda yakin akan menghapus yang dipilih?',
      buttons: {
          confirm: function () {
              location.href = this.$target.attr('href');
          },
          cancel: function () {
          },
      }
  });
</script> -->