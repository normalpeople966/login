<?php
//Include GP config file && User class
include_once 'head.php';
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
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