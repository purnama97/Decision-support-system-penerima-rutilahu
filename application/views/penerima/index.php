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
        <li><a href="<?php echo base_url('calonpenerima'.$this->uri->segment(2)); ?>"></i> <?php echo ucwords($this->uri->segment(2));?></a></li>
        <li class="active"></i> <?php echo ucwords($this->uri->segment(3));?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="cols col-md-3">
                        <a href="<?php echo base_url('calonpenerima/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                        <a href="<?php echo base_url('calonpenerima/cetak'); ?>" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>Nama Dusun</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>Ket</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($penerima as $row)
                {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->penerimaNoKK; ?></td>
                  <td><?php echo $row->penerimaName; ?></td>
                  <td><?php echo $row->penerimaDusun; ?></td>
                  <td><?php echo $row->penerimaRT; ?></td>
                  <td><?php echo $row->penerimaRW; ?></td>
                  <td><?php echo $row->penerimaKet; ?></td>
                  <td width="100px">
                      <a href="<?php echo  base_url('calonpenerima/edit/'.$row->penerimaID); ?>" class="btn btn-sm btn btn-success"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo  base_url('calonpenerima/hapus/'.$row->penerimaID); ?>" class="btn btn-sm btn btn-danger"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <?php
                $no++;
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>Nama Dusun</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>Ket</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->