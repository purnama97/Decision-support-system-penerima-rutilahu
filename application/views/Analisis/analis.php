 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hasil Analisis
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
    <?php
      foreach($kriteria As $rowk)
      {
        $CK[] = $rowk->criteriaWeight;
      }
    ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cari Priode Penilaian</h3>
              <p class="pull-right">
                <a href="<?php echo base_url('analisis'); ?>" class="btn btn-danger"><i class="fa fa-close"></i></a>
              </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <h4>1. Hasil Penilaian</h4>
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($penilaian as $row)
                {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->penerimaNoKK; ?></td>
                  <td><?php echo $row->penerimaName; ?></td>
                  <td><?php echo $row->C1; ?></td>
                  <td><?php echo $row->C2; ?></td>
                  <td><?php echo $row->C3; ?></td>
                  <td><?php echo $row->C4; ?></td>
                  <td><?php echo $row->C5; ?></td>
                  <td><?php echo $row->C6; ?></td>
                  <td><?php echo $row->C7; ?></td>
                </tr>
                <?php
                $no++;
                $C1[] = $row->C1;
                $C2[] = $row->C2;
                $C3[] = $row->C3;
                $C4[] = $row->C4;
                $C5[] = $row->C5;
                $C6[] = $row->C6;
                $C7[] = $row->C7;
                }
                
                ?>
                </tbody>
                <tfoot>
                  <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                </tr>
                </tfoot>
              </table>
              <h4>2. Normalisasi</h4>
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($penilaian as $row)
                {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->penerimaNoKK; ?></td>
                  <td><?php echo $row->penerimaName; ?></td>
                  <td><?php echo ($row->C1-min($C1)) / (max($C1)-min($C1)); ?></td>
                  <td><?php echo ($row->C2-min($C2)) / (max($C2)-min($C2)); ?></td>
                  <td><?php echo ($row->C3-min($C3)) / (max($C3)-min($C3)); ?></td>
                  <td><?php echo ($row->C4-min($C4)) / (max($C4)-min($C4)); ?></td>
                  <td><?php echo ($row->C5-min($C5)) / (max($C5)-min($C5)); ?></td>
                  <td><?php echo ($row->C6-min($C6)) / (max($C6)-min($C6)); ?></td>
                  <td><?php echo ($row->C7-min($C7)) / (max($C7)-min($C7)); ?></td>
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
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                </tr>
                </tfoot>
              </table>
              <h4>3. Perkalian Matrik Normalisasi</h4>
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($penilaian as $row)
                {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->penerimaNoKK; ?></td>
                  <td><?php echo $row->penerimaName; ?></td>
                  <td><?php echo $HC1 = $CK[0] * (($row->C1-min($C1)) / (max($C1)-min($C1))); ?></td>
                  <td><?php echo $HC2 = $CK[1] * (($row->C2-min($C2)) / (max($C2)-min($C2))); ?></td>
                  <td><?php echo $HC3 = $CK[2] * (($row->C3-min($C3)) / (max($C3)-min($C3))); ?></td>
                  <td><?php echo $HC4 = $CK[3] * (($row->C4-min($C4)) / (max($C4)-min($C4))); ?></td>
                  <td><?php echo $HC5 = $CK[4] * (($row->C5-min($C5)) / (max($C5)-min($C5))); ?></td>
                  <td><?php echo $HC6 = $CK[5] * (($row->C6-min($C6)) / (max($C6)-min($C6))); ?></td>
                  <td><?php echo $HC7 = $CK[6] * (($row->C7-min($C7)) / (max($C7)-min($C7))); ?></td>
                </tr>
                <?php
                $no++;
                $NA[] = $HC1 + $HC2 + $HC3 + $HC4 + $HC5 + $HC6 + $HC7;  
                }
                ?>
                </tbody>
                <tfoot>
                  <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>C5</th>
                  <th>C6</th>
                  <th>C7</th>
                </tr>
                </tfoot>
              </table>
              <h4>4. Hasil Perhitungan</h4>
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>HASIL</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                $i=0;
                
                $maxN = max($NA);
                
                foreach($penilaian as $row)
                {
                ?>
                <tr <?php if($NA[$i] == $maxN){ echo "class='bg-success'";}?> >
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->penerimaNoKK; ?></td>
                  <td><?php echo $row->penerimaName; ?></td>
                  <td><?php echo $NA[$i]; ?></td>
                </tr>
                <?php
                $i++;
                $no++;
                }
                ?>
                </tbody>
                <tfoot>
                  <tr>
                  <th width="20px">No</th>
                  <th>No K.K</th>
                  <th>Nama</th>
                  <th>Hasil</th>
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