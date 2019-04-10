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

        <li>
          <a href="<?= backend_url().'konklusi' ?>">
            <i class="fa fa fa-files-o"></i> <span>Penyakit</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-red">3</small> -->
            </span>
          </a>
        </li>

        <li>
          <a href="<?= backend_url().'premis_kategori' ?>">
            <i class="fa fa-user"></i> <span>Kategori Gejala</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-red">3</small> -->
            </span>
          </a>
        </li>

        <li>
          <a href="<?= backend_url().'premis' ?>">
            <i class="fa fa-th"></i> <span>Gejala</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-red">3</small> -->
            </span>
          </a>
        </li>

        <li>
          <a href="<?= backend_url().'pengguna' ?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-red">3</small> -->
            </span>
          </a>
        </li>

        <li class="header">Informasi Pribadi</li>
        <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li> -->
        <li><a href="<?=base_url()?>admin_new/profile"><i class="fa fa-circle-o text-aqua"></i> <span>Profil</span></a></li>
        <li><a href="<?=base_url()?>admin_new/profile/logout"><i class="fa fa-circle-o text-yellow"></i> <span>Keluar</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>