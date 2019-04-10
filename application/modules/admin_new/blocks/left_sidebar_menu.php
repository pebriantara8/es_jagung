  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('nama')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo backend_url() ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-red">3</small> -->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Artikel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo backend_url() ?>posts/form"><i class="fa fa-circle-o"></i> Buat Artikel Baru</a></li>
            <li><a href="<?php echo backend_url() ?>posts"><i class="fa fa-circle-o"></i> Artikel</a></li>
            <li><a href="<?php echo backend_url() ?>posts/draft"><i class="fa fa-circle-o"></i> Draft Artikel</a></li>
            <li><a href="<?php echo backend_url() ?>posts/archive"><i class="fa fa-circle-o"></i> Arsip Artikel</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Warta</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo backend_url() ?>warta"><i class="fa fa-circle-o"></i> Warta</a></li>
            <li><a href="<?php echo backend_url() ?>warta/archive"><i class="fa fa-circle-o"></i> Arsip Artikel</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo backend_url() ?>gallery">
            <i class="fa fa-folder"></i> <span>Gallery</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-red">3</small> -->
            </span>
          </a>
        </li>

        <?php if ($this->session->userdata('akses')==1) { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cog"></i>
              <span>Pengaturan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo backend_url() ?>slider_home"><i class="fa fa-circle-o"></i> Slider Halaman Depan</a></li>
              <!-- <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Informasi Kontak</a></li> -->
              <!-- <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Umum</a></li> -->
            </ul>
          </li>
          <li>
            <a href="<?= backend_url().'pengguna' ?>">
                <i class="fa fa-users"></i> <span>Pengguna</span>
                <span class="pull-right-container">
                  <!-- <small class="label pull-right bg-red">3</small> -->
                </span>
              </a>
            </li>
          <?php }?>

        <li class="header">Informasi Pribadi</li>
        <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li> -->
        <li><a href="<?=base_url()?>admin_new/profile"><i class="fa fa-circle-o text-aqua"></i> <span>Profil</span></a></li>
        <li><a href="<?=base_url()?>admin_new/profile/logout"><i class="fa fa-circle-o text-yellow"></i> <span>Keluar</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>