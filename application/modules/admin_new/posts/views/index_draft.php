  <!-- Select2 -->
  <script src="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

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

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Artikel</h3>


            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  <th style="width: 100px">Status</th>
                  <th style="width: 180px">Penulis</th>
                  <th style="width: 50px">Tanggal</th>
                  <th style="width: 120px">Action</th>
                </tr>

                <?php $no_urut = $no_urut; ?>
                <?php foreach ($list_data as $key => $value): ?>
                <tr>
                  <td><?php echo $no_urut; $no_urut++; ?>.</td>
                  <td><?php echo $value['title'] ?></td>
                  <td>publish</td>
                  <td><?php echo $value['name'] ?></td>
                  <td><?php echo date('d/m/Y', strtotime($value['date'])) ?></td>
                  <td>
                    <a href="<?php echo backend_url().$this->modul ?>/form/<?php echo $value['id_post'] ?>/draft" class="badge bg-green" title="Edit">Edit</a>
                    <a href="<?php echo backend_url().$this->modul ?>/arsip/<?php echo $value['id_post'] ?>/draft" class="badge bg-red" title="Edit">Hapus</a>
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