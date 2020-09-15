 <?php
 foreach($admin as $row);
 $nama = explode(' ',$row->userFullName);
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Admin
        <small>Sistem Penunjang Keputusan Pemberian Bantuan Rutiahu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-user"></i> <?php echo ucwords($this->uri->segment(1));?></a></li>
        <li><a href="<?php echo base_url('admin/'.$this->uri->segment(2)); ?>"></i> <?php echo ucwords($this->uri->segment(2));?></a></li>
        <li class="active"></i> <?php echo ucwords($this->uri->segment(3));?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Pengelola Sistem</h3>
              <p class="pull-right">
                <a href="<?php echo base_url('admin'); ?>" class="btn btn-danger"><i class="fa fa-close"></i></a>
              </p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/update/'.$row->userID);?>" method="POST">
              <div class="box-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">NIP / NIK Pegawai</label>
                  <input type="text" class="form-control" name="nip" placeholder="Masukan NIP.." required value="<?php echo $row->userNIP; ?>">
                </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Depan</label>
                  <input type="text" class="form-control" name="namad" placeholder="Masukan Nama Depan.." required value="<?php echo $nama[0]; ?>">
                </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Belakang</label>
                  <input type="text" class="form-control" name="namab" placeholder="Masukan Nama Belakang.." required value="<?php echo $nama[1]; ?>">
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">No Telepon</label>
                  <input type="text" class="form-control" name="Notelp" placeholder="Masukan no telp / HP" required value="<?php echo $row->userPhone; ?>">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">User Level</label>
                  <select class="form-control select2" name="level" required>
                    <option Value=''>Pilih Opsi</option>
                    <option Value='A' <?php if($row->userLevel='A') { echo "selected";} ?>>Administrator</option>
                    <option Value='U' <?php if($row->userLevel='U') { echo "selected";} ?>>User</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">User Blocked</label>
                  <select class="form-control select2" name="blok" required>
                    <option Value=''>Pilih Opsi</option>
                    <option Value='N' <?php if($row->userBlocked='N') { echo "selected";} ?>>Aktif</option>
                    <option Value='Y' <?php if($row->userBlocked='Y') { echo "selected";} ?>>Blokir</option>
                  </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">User Name</label>
                  <input type="text" class="form-control" name="username" placeholder="Masukan Username .. " required value="<?php echo $row->userName; ?>">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Masukan Password .." required value="<?php echo $row->userPassword; ?>">
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Update</label>
                  <input type="text" class="form-control" id="datepicker" name="update" placeholder="Tanggal update" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Reset</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->