 <?php
 foreach($penerima as $row);
 $nama = explode(' ',$row->penerimaName);
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Calon Penerima
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
              <h3 class="box-title">Update Calon Penerima</h3>
              <p class="pull-right">
                <a href="<?php echo base_url('calonpenerima'); ?>" class="btn btn-danger"><i class="fa fa-close"></i></a>
              </p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('calonpenerima/update/'.$row->penerimaID);?>" method="POST">
            <div class="box-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">No KK</label>
                  <input type="text" class="form-control" name="nokk" placeholder="Masukan No KK.." required value="<?php echo $row->penerimaNoKK; ?>">
                </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Depan</label>
                  <input type="text" class="form-control" name="namad" placeholder="Masukan Nama Depan.." required value="<?php echo $nama[0] ?>">
                </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Belakang</label>
                  <input type="text" class="form-control" name="namab" placeholder="Masukan Nama Belakang.." required value="<?php echo $nama[1] ?>">
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Dusun</label>
                  <input type="text" class="form-control" name="namadusun" placeholder="Masukan Nama Dusun" required value="<?php echo $row->penerimaDusun; ?>">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">RT</label>
                  <input type="text" class="form-control" name="rt" placeholder="Masukan RT" required value="<?php echo $row->penerimaRT; ?>">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">RW</label>
                  <input type="text" class="form-control" name="rw" placeholder="Masukan RW" required value="<?php echo $row->penerimaRW; ?>">
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">Keterangan</label>
                  <input type="text" class="form-control" name="ket" placeholder="Masukan Keterangan .. " value="-" required value="<?php echo $row->penerimaKet; ?>">
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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