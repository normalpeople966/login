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
        Upload Data from Excel
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Upload Data</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">
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
                    <form action="post.php" method="post" enctype='multipart/form-data'>
                    <div class="box-body">
                            <input type="hidden" name="type" value="table_krs">
                            <input type="file" name="excel">

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                    </form>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6 col-xs-12">
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
                        <form action="post.php" method="post" enctype='multipart/form-data'>

                    <div class="box-body">
                            <input type="hidden" name="type" value="table_mahasiswa">
                            <input type="file" name="excel">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                        </form>

                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
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
                    <form action="post.php" method="post" enctype='multipart/form-data'>
                    <div class="box-body">
                            <input type="hidden" name="type" value="table_pembayaran">
                            <input type="file" name="excel">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                    </form>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6 col-xs-12">
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
                        <form action="post.php" method="post" enctype='multipart/form-data'>

                    <div class="box-body">
                            <input type="hidden" name="type" value="table_hasil_study">
                            <input type="file" name="excel">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                        </form>

                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Table Mata Kuliah</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    </div>
                    <form action="post.php" method="post" enctype='multipart/form-data'>
                    <div class="box-body">
                            <input type="hidden" name="type" value="table_matkul">
                            <input type="file" name="excel">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                    </form>
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
