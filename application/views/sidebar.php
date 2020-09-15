<?php foreach($log as $log);?>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <br><br>
        </div>
        <div class="pull-left info">
          <p><?php echo $log->userFullName;?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> <span>Halaman Utama</span></a></li>
        <?php
        if($this->session->userdata('userLevel')=='A'){
        ?>
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-user"></i> <span>Admin</span></a></li>
        <li class="treeview" class="active">
          <a href="#"><i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('kriteria'); ?>">Kriteria</a></li>
            <li><a href="<?php echo base_url('subkriteria'); ?>">Sub Kriteria</a></li>
            <li><a href="<?php echo base_url('priode'); ?>">Priode</a></li>
            <li><a href="<?php echo base_url('calonpenerima'); ?>">Calon Penerima</a></li>
          </ul>
        </li>
        <?php
        }
        ?>
        <li><a href="<?php echo base_url('penilaian'); ?>"><i class="fa fa-calculator"></i> <span>Penilaian</span></a></li>
        <li><a href="<?php echo base_url('analisa'); ?>"><i class="fa fa-hourglass-1"></i> <span>Analisa</span></a></li>
        <li><a href="<?php echo base_url('laporan'); ?>"><i class="fa fa-file-pdf-o"></i> <span>Laporan</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>