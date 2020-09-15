 <?php
 foreach($subkriteria as $row);
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Priode
        <small>Sistem Penunjang Keputusan Pemberian Bantuan Rutiahu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><i class="fa fa-user"></i> <?php echo ucwords($this->uri->segment(1));?></a></li>
        <li><a href="<?php echo base_url('priode/'.$this->uri->segment(2)); ?>"></i> <?php echo ucwords($this->uri->segment(2));?></a></li>
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
              <h3 class="box-title">Update Priode Penilaian</h3>
              <p class="pull-right">
                <a href="<?php echo base_url('subkriteria'); ?>" class="btn btn-danger"><i class="fa fa-close"></i></a>
              </p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('subkriteria/update/'.$row->subID);?>" method="POST">
            <div class="box-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">Pilih Kriteria</label>
                  <select class="form-control select2" name="criteriaID" required>
                  <option Value='<?php echo $row->criteriaID; ?>'><?php echo $row->criteriaID.' | '.$row->criteriaName; ?></option>
                    <?php
                    foreach($kriteria AS $rows){
                    ?>
                    <option Value='<?php echo $rows->criteriaID; ?>'><?php echo $rows->criteriaID.' | '.$rows->criteriaName; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Sub Kriteria</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Priode.." required value="<?php echo $row->subName; ?>">
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai</label>
                  <input type="text" class="form-control" name="nilai" placeholder="Masukan Nilai Aspek.." required value="<?php echo $row->subNilai; ?>">
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