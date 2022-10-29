<?php
//Include GP config file && User class
include_once 'head.php';
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php
    if (isset($_GET['message'])) {
        ?>
        <div style="padding: 20px 30px;color:#fff; background: rgb(243, 156, 18); z-index: 999999; font-size: 16px; font-weight: 600;"><a class="pull-right" href="#" data-toggle="tooltip" data-placement="left" title="" style="color: rgb(255, 255, 255); font-size: 20px;" data-original-title="Never show me this again!">×</a><?php echo $_GET['message'] ?></div>
        <?php
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Data from Database
        <small>it all shows here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Show Data</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <!-- MYSQL Table KRS -->
            <div class="col-md-12 col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table KRS</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>KODE MATA KULIAH</b></td>
                                    <td><b>KELAS</b></td>
                                    <td><b>OPERATOR</b></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>KODE MATA KULIAH</b></td>
                                    <td><b>KELAS</b></td>
                                    <td><b>OPERATOR</b></td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $query_krs = "select * from krs_16n10003";
                                $row_krs = $conn_mysql->query($query_krs);
                                while ($result_krs = mysqli_fetch_array($row_krs,MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result_krs["NIM"]; ?></td>
                                        <td><?php echo $result_krs["TAHUNAJARAN"]; ?></td>
                                        <td><?php echo $result_krs["KD_MSUJI"]; ?></td>
                                        <td><?php echo $result_krs['KODEMATAKULIAH']; ?></td>
                                        <td><?php echo $result_krs['KELAS']; ?></td>
                                        <td><?php echo $result_krs['OPERATOR']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="delete.php?table=krs" class="btn btn-danger pull-right">Delete</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
          <!-- Ibase Table Mahasiswa -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table Mahasiswa</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>ANGKATAN</b></td>
                                    <td><b>JURUSAN</b></td>
                                    <td><b>NAMA</b></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>ANGKATAN</b></td>
                                    <td><b>JURUSAN</b></td>
                                    <td><b>NAMA</b></td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php

                                $check = "SELECT * FROM T_MAHASISWA_16N10003";
                                $koko = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                                $kokos = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                                while (ibase_fetch_row($kokos)) {
                                  echo "<tr>";
                                  foreach (ibase_fetch_assoc($koko) as $row) {
                                      ?>
                                          <td><?php echo $row; ?></td>
                                      <?php
                                  }
                                  echo "</tr>";
                                }

                            ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="delete.php?table=mahasiswa" class="btn btn-danger pull-right">Delete</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
          <!-- MYSQL Table Pembayaran KRS -->
            <div class="col-md-6 col-xs-12">

                <div class="box box-success">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table Pembayaran</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>UANG SKS</b></td>
                                    <td><b>KET</b></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>UANG SKS</b></td>
                                    <td><b>KET</b></td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $query_krs = "select * from pembayarankrs_16n10003";
                                $row_krs = $conn_mysql->query($query_krs);
                                while ($result_krs = mysqli_fetch_array($row_krs,MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result_krs["TAHUNAJARAN"]; ?></td>
                                        <td><?php echo $result_krs["KD_MSUJI"]; ?></td>
                                        <td><?php echo $result_krs["NIM"]; ?></td>
                                        <td><?php echo $result_krs["UANGSKS"]; ?></td>
                                        <td><?php echo $result_krs["KET"]; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="delete.php?table=pembayaran" class="btn btn-danger pull-right">Delete</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
          <!-- MYSQL Table History Pembayaran KRS -->
            <div class="col-md-6 col-xs-12">

                <div class="box box-success">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table History Pembayaran</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>UANG SKS</b></td>
                                    <td><b>KET</b></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>UANG SKS</b></td>
                                    <td><b>KET</b></td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $query_krs = "select * from history_pembayarankrs_16n10003";
                                $row_krs = $conn_mysql->query($query_krs);
                                while ($result_krs = mysqli_fetch_array($row_krs,MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result_krs["TAHUNAJARAN"]; ?></td>
                                        <td><?php echo $result_krs["KD_MSUJI"]; ?></td>
                                        <td><?php echo $result_krs["NIM"]; ?></td>
                                        <td><?php echo $result_krs["UANGSKS"]; ?></td>
                                        <td><?php echo $result_krs["KET"]; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="delete.php?table=historypembayaran" class="btn btn-danger pull-right">Delete</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
          <!-- MYSQL Table Hasil Studi KRS -->
            <div class="col-md-12 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table Hasil Studi</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>KDMK_PUS</b></td>
                                    <td><b>NILAI</b></td>
                                    <td><b>OPERATOR</b></td>
                                    <td><b>KD_JUR</b></td>
                                    <td><b>DOSEN</b></td>
                                    <td><b>KETERANGAN</b></td>
                                    <td><b>TUGAS</b></td>
                                    <td><b>UTS</b></td>
                                    <td><b>UAS</b></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>KDMK_PUS</b></td>
                                    <td><b>NILAI</b></td>
                                    <td><b>OPERATOR</b></td>
                                    <td><b>KD_JUR</b></td>
                                    <td><b>DOSEN</b></td>
                                    <td><b>KETERANGAN</b></td>
                                    <td><b>TUGAS</b></td>
                                    <td><b>UTS</b></td>
                                    <td><b>UAS</b></td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $query_krs = "select * from hasilstudy_16n10003";
                                $row_krs = $conn_mysql->query($query_krs);
                                while ($result_krs = mysqli_fetch_array($row_krs,MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result_krs["THNAJAR"]; ?></td>
                                        <td><?php echo $result_krs["KD_MSUJI"]; ?></td>
                                        <td><?php echo $result_krs["NIM"]; ?></td>
                                        <td><?php echo $result_krs["KDMK_PUS"]; ?></td>
                                        <td><?php echo $result_krs["NILAI"]; ?></td>
                                        <td><?php echo $result_krs["OPERATOR"]; ?></td>
                                        <td><?php echo $result_krs["KD_JUR"]; ?></td>
                                        <td><?php echo $result_krs["DOSEN"]; ?></td>
                                        <td><?php echo $result_krs["KETERANGAN"]; ?></td>
                                        <td><?php echo $result_krs["TUGAS"]; ?></td>
                                        <td><?php echo $result_krs["UTS"]; ?></td>
                                        <td><?php echo $result_krs["UAS"]; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="delete.php?table=hasilstudy" class="btn btn-danger pull-right">Delete</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
          <!-- MYSQL Table History Hasil Studi -->
            <div class="col-md-12 col-xs-12">

                <div class="box box-danger">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table History Hasil Studi</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>KDMK_PUS</b></td>
                                    <td><b>NILAI</b></td>
                                    <td><b>OPERATOR</b></td>
                                    <td><b>KD_JUR</b></td>
                                    <td><b>DOSEN</b></td>
                                    <td><b>KETERANGAN</b></td>
                                    <td><b>TUGAS</b></td>
                                    <td><b>UTS</b></td>
                                    <td><b>UAS</b></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><b>TAHUN AJARAN</b></td>
                                    <td><b>KD_MSUJI</b></td>
                                    <td><b>NIM</b></td>
                                    <td><b>KDMK_PUS</b></td>
                                    <td><b>NILAI</b></td>
                                    <td><b>OPERATOR</b></td>
                                    <td><b>KD_JUR</b></td>
                                    <td><b>DOSEN</b></td>
                                    <td><b>KETERANGAN</b></td>
                                    <td><b>TUGAS</b></td>
                                    <td><b>UTS</b></td>
                                    <td><b>UAS</b></td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $query_krs = "select * from history_hasilstudy_16n10003";
                                $row_krs = $conn_mysql->query($query_krs);
                                while ($result_krs = mysqli_fetch_array($row_krs,MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result_krs["THNAJAR"]; ?></td>
                                        <td><?php echo $result_krs["KD_MSUJI"]; ?></td>
                                        <td><?php echo $result_krs["NIM"]; ?></td>
                                        <td><?php echo $result_krs["KDMK_PUS"]; ?></td>
                                        <td><?php echo $result_krs["NILAI"]; ?></td>
                                        <td><?php echo $result_krs["OPERATOR"]; ?></td>
                                        <td><?php echo $result_krs["KD_JUR"]; ?></td>
                                        <td><?php echo $result_krs["DOSEN"]; ?></td>
                                        <td><?php echo $result_krs["KETERANGAN"]; ?></td>
                                        <td><?php echo $result_krs["TUGAS"]; ?></td>
                                        <td><?php echo $result_krs["UTS"]; ?></td>
                                        <td><?php echo $result_krs["UAS"]; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="delete.php?table=historyhasilstudy" class="btn btn-danger pull-right">Delete</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>

          <!-- Ibase Table Matakuliah -->
            <div class="col-md-12 col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table Matakuliah</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-stripped datatable display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><b>KDMK_JUR</b></td>
                                    <td><b>MK</b></td>
                                    <td><b>SEMESTER</b></td>
                                    <td><b>MK_ENG</b></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><b>KDMK_JUR</b></td>
                                    <td><b>MK</b></td>
                                    <td><b>SEMESTER</b></td>
                                    <td><b>MK_ENG</b></td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php

                                $check = "SELECT * FROM T_MATAKULIAH_16N10003";
                                $koko = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                                $kokos = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                                while (ibase_fetch_row($kokos)) {
                                  echo "<tr>";
                                  foreach (ibase_fetch_assoc($koko) as $row) {
                                      ?>
                                          <td><?php echo $row; ?></td>
                                      <?php
                                  }
                                  echo "</tr>";
                                }

                            ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="delete.php?table=matkul" class="btn btn-danger pull-right">Delete</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>





        </div>
      <!-- Default box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php
include_once 'foot.php';
?>
