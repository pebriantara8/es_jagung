    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div>
            Filter
          </div>
          <form action="<?php echo backend_url().$this->modul ?>" method="get" accept-charset="utf-8">
            <div style="margin-bottom: 20px;">
              <input type="text" class="form-control" name="search" placeholder="keyword search.." value="<?php echo $this->input->get('search') ?>">
              <select class="select2" name="month" data-minimum-results-for-search="Infinity">
                  <option value="">Semua bulan</option>
                  <?php for($i=1; $i < 13; $i++) { ?>
                      <option <?php echo $this->input->get('month')==$i?' selected':'' ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php } ?>
              </select>
              <select class="select2" name="year" >
                  <option value="">Semua tahun</option>
                  <?php foreach ($list_tahun as $value): ?>
                      <option <?php echo $this->input->get('year')==$value?' selected':'' ?> value="<?php echo $value ?>"><?php echo $value ?></option>
                  <?php endforeach ?>
              </select>
              <button class="btn bg-maroon btn-flat btn-sm" type="submit">Filter</button>
            </div>
          </form>

          <a href="<?php echo backend_url() ?>warta/form" class="btn bg-primary btn-flat btn-sm" title="Upload Warta Baru">Upload Warta Baru</a>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Warta</h3>


            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  <th style="width: 100px">File</th>
                  <th style="width: 50px">Tanggal</th>
                  <th style="width: 50px">Views</th>
                  <th style="width: 50px">Downlaod</th>
                  <th style="width: 120px">Action</th>
                </tr>

                <?php $no_urut = $no_urut; ?>
                <?php foreach ($list_data as $key => $value): ?>
                <tr>
                  <td><?php echo $no_urut; $no_urut++; ?>.</td>
                  <td><?php echo $value['title'] ?></td>
                  <td><a href="<?php echo base_url() ?>public/warta/<?php echo $value['file'] ?>" title="">lihat</a></td>
                  <td><?php echo date('d/m/Y', strtotime($value['date'])) ?></td>
                  <td><?php echo $value['views'] ?></td>
                  <td><?php echo $value['download'] ?></td>
                  <td>
                    <a href="<?php echo backend_url().$this->modul ?>/form/<?php echo $value['id_warta'] ?>" class="badge bg-green" title="Edit">Edit</a>
                    <a href="<?php echo backend_url().$this->modul ?>/arsip/<?php echo $value['id_warta'] ?>" class="badge bg-red jc_delete_self" title="Edit">Hapus</a>
                  </td>
                </tr>
                <?php endforeach ?>

              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php echo $this->pagination->create_links(); ?>
              </ul>
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <?php include 'index_js.php'; ?>