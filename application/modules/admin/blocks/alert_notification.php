          <?php if ($this->session->flashdata('alert_success')): ?>
                                    <div class="alert alert-primary alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> <?php echo $this->session->flashdata('alert_success'); ?>
                                    </div>
          <?php endif ?>

          <?php if ($this->session->flashdata('alert_danger')): ?>
          <div id="error_login" class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> <?php echo $this->session->flashdata('alert_danger'); ?>
          </div>
          <?php endif ?>

          <?php if ($this->session->flashdata('alert_warning')): ?>
          <div id="error_login" class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('alert_warning'); ?>
          </div>
          <?php endif ?>

          <?php if ($this->session->flashdata('alert_info')): ?>
          <div id="error_login" class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> <?php echo $this->session->flashdata('alert_info'); ?>
          </div>
          <?php endif ?>

<!--           <div id="gerror_notif" class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> <?php echo $this->session->flashdata('alert_info'); ?>
          </div> -->