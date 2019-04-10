    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div>
            Filter
          </div>
          <form action="<?php echo backend_url().$this->modul ?>" method="get" accept-charset="utf-8">
            <div style="margin-bottom: 20px;">
              <input type="text" class="form-control" name="search" placeholder="keyword search.." value="<?php echo $this->input->get('search') ?>">
              <button class="btn bg-maroon btn-flat btn-sm" type="submit">Filter</button>
            </div>
          </form>

          <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>

          <a href="<?php echo backend_url().this_module() ?>/form" class="btn bg-primary btn-flat btn-sm" title="Tambah Pengguna Baru">Tambah Kategori Baru</a>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori</h3>


            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th style="width: 150px">Tangal</th>
                  <th style="width: 120px">Action</th>
                </tr>

                <?php $no_urut = $no_urut; ?>
                <?php foreach ($list_data as $key => $value): ?>
                <tr>
                  <td><?php echo $no_urut; $no_urut++; ?>.</td>
                  <td><?php echo $value['nama_premis_kategori'] ?></td>
                  <td><?php echo $value['created_at']; ?></td>
                  <td>
                    <a href="<?php echo backend_url().$this->modul ?>/form/<?php echo $value['id'] ?>" class="badge bg-green" title="Edit">Edit</a>
                    <a href="<?php echo backend_url().$this->modul ?>/delete/<?php echo $value['id'] ?>" class="badge bg-red jc_delete_self" title="Edit">Hapus</a>
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