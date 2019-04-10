
          <?php if ($this->session->flashdata('alert_success')): ?>
          <div class="alert alert-success alert-dismissible" id="alert_warning_message">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Message</h4>
            <span><?php echo $this->session->flashdata('alert_success'); ?></span>
          </div>
          <?php endif ?>

          <?php if ($this->session->flashdata('alert_danger')): ?>
          <div class="alert alert-danger alert-dismissible" id="alert_warning_message">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Message</h4>
            <span><?php echo $this->session->flashdata('alert_danger'); ?></span>
          </div>
          <?php endif ?>

          <?php if ($this->session->flashdata('alert_warning')): ?>
          <div class="alert alert-warning alert-dismissible" id="alert_warning_message">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Message</h4>
            <span><?php echo $this->session->flashdata('alert_warning'); ?></span>
          </div>
          <?php endif ?>

          <?php if ($this->session->flashdata('alert_info')): ?>
          <div class="alert alert-info alert-dismissible" id="alert_warning_message">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Message</h4>
            <span><?php echo $this->session->flashdata('alert_info'); ?></span>
          </div>
          <?php endif ?>