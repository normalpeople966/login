<?php
//Include GP config file && User class
include_once 'head.php';
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report page
        <small>it all showns here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Report page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Laporan 1</h3>
                <small>NIM - NAMA - BAYAR SKS</small>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-stripped laporan">
                  <thead>
                    <tr>
                      <td>NIM</td>
                      <td>TAHUN AJARAN</td>
                      <td>NAMA</td>
                      <td>KODE MATKUL</td>
                      <td>UANG SKS</td>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td>NIM</td>
                      <td>TAHUN AJARAN</td>
                      <td>NAMA</td>
                      <td>KODE MATKUL</td>
                      <td>UANG SKS</td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $sql = mysqli_query($conn_mysql,"SELECT * FROM pembayarankrs_16n10003");
                      while ($row1 = mysqli_fetch_assoc($sql)) {
                      $nim = $row1['NIM'];
                      $check = "SELECT * FROM T_MAHASISWA_16N10003 WHERE NIM = '$nim'";
                      $koko = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                      $nama = ibase_fetch_assoc($koko);
                    ?>
                      <tr>
                        <td><?php echo $row1['NIM']; ?></td>
                        <td><?php echo $row1['TAHUNAJARAN']; ?></td>
                        <td><?php echo $nama["NAMA"]; ?></td>
                        <td><?php echo $row1['KD_MSUJI']; ?></td>
                        <td><?php echo $row1['UANGSKS']; ?></td>
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-footer-->
            </div>
            <!-- /.box -->



            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Laporan 2</h3>
                <small>NIM - NAMA - NILAI - MATAKULIAH</small>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-stripped laporan">
                  <thead>
                    <tr>
                      <td>NIM</td>
                      <td>NAMA</td>
                      <td>NILAI</td>
                      <td>KODE MK</td>
                      <td>MATAKULIAH</td>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td>NIM</td>
                      <td>NAMA</td>
                      <td>NILAI</td>
                      <td>KODE MK</td>
                      <td>MATAKULIAH</td>
                    </tr>
                  </tfoot>
                  <tbody>

                    <?php
                      $nim_prev = null;

                      $sql = mysqli_query($conn_mysql,"SELECT * FROM hasilstudy_16n10003 AS tb1 INNER JOIN pembayarankrs_16n10011 AS tb2 ON tb1.THNAJAR = tb2.TAHUNAJARAN AND tb1.KD_MSUJI = tb2.KD_MSUJI AND tb1.NIM = tb2.NIM");
                      while ($row1 = mysqli_fetch_assoc($sql)) {
                      //Mahasiswa
                      $nim = $row1['NIM'];
                      $check = "SELECT * FROM T_MAHASISWA_16N10011 WHERE NIM = '$nim'";
                      $koko = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                      $nama = ibase_fetch_assoc($koko);
                      //Matkul
                      $matkul = $row1['KDMK_PUS'];
                      $check = "SELECT * FROM T_MATAKULIAH_16N10011 WHERE KDMK_JUR = '$matkul'";
                      $kokoku = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                      $name_matkul = ibase_fetch_assoc($kokoku);
                    ?>
                      <tr>
                        <td><?php echo $nim; ?></td>
                        <td><?php echo $nama['NAMA']; ?></td>
                        <td><?php echo $row1['NILAI']; ?></td>
                        <td><?php echo $matkul; ?></td>
                        <td><?php echo $name_matkul["MK"]; ?></td>
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-footer-->
            </div>
            <!-- /.box -->



            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Laporan 3</h3>
                <small>NIM - NAMA - MATAKULIAH - SKS - NILAI ANGKA - NILAI HURUF</small>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-stripped laporan">
                  <thead>
                    <tr>
                      <td>NIM</td>
                      <td>NAMA</td>
                      <td>MATAKULIAH</td>
                      <td>SKS</td>
                      <td>NILAI ANGKA</td>
                      <td>NILAI HURUF</td>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td>NIM</td>
                      <td>NAMA</td>
                      <td>MATAKULIAH</td>
                      <td>SKS</td>
                      <td>NILAI ANGKA</td>
                      <td>NILAI HURUF</td>
                    </tr>
                  </tfoot>
                  <tbody>

                    <?php
                      $nim_prev = null;

                      $sql = mysqli_query($conn_mysql,"SELECT * FROM hasilstudy_16n10003 AS tb1 INNER JOIN pembayarankrs_16n10011 AS tb2 ON tb1.THNAJAR = tb2.TAHUNAJARAN AND tb1.KD_MSUJI = tb2.KD_MSUJI AND tb1.NIM = tb2.NIM");
                      while ($row1 = mysqli_fetch_assoc($sql)) {
                      //Mahasiswa
                      $nim = $row1['NIM'];
                      $check = "SELECT * FROM T_MAHASISWA_16N10011 WHERE NIM = '$nim'";
                      $koko = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                      $nama = ibase_fetch_assoc($koko);
                      //Matkul
                      $matkul = $row1['KDMK_PUS'];
                      $check = "SELECT * FROM T_MATAKULIAH_16N10011 WHERE KDMK_JUR = '$matkul'";
                      $kokoku = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                      $name_matkul = ibase_fetch_assoc($kokoku);
                    ?>
                      <tr>
                        <td><?php echo $nim; ?></td>
                        <td><?php echo $nama['NAMA']; ?></td>
                        <td><?php echo $name_matkul["MK"]; ?></td>
                        <td>-</td>
                        <td><?php echo $row1['NILAI']; ?></td>
                        <td><?php echo $row1['KETERANGAN']; ?></td>
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-footer-->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
<!-- <iframe id='st_632ddef1ee3a496494a8624e316521e1' frameBorder='0' scrolling='no' width='100%' height='100%' src='https://api.stockdio.com/visualization/financial/charts/v1/Ticker?app-key=FC307F30A7AE450484776A7C7D8877B7&stockExchange=IDX&symbols=TLKM;HMSP;UNVR;BBCA;ASII;BBNI;BMRI;BBRI;GGRM;INDF;&palette=Financial-Light&layoutType=8&onload=st_632ddef1ee3a496494a8624e316521e1'></iframe> -->
<!-- <iframe frameBorder='0' scrolling='no' width='800' height='420' src='https://api.stockdio.com/visualization/financial/charts/v1/HistoricalPrices?app-key=FC307F30A7AE450484776A7C7D8877B7&stockExchange=IDX&symbol=TLKM&dividends=true&splits=true&palette=Financial-Light'></iframe> -->

  </div>
  <!-- /.content-wrapper -->



<?php
include_once 'foot.php';
?>
