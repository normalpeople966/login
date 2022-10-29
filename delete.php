<?php

include_once 'head.php';

$delete = $_GET['table'];

switch ($delete) {
  case 'krs':
    //DELETE SQL
    $sql = "truncate table krs_16n10003";
    $conn_mysql->query($sql);
    break;

  case 'mahasiswa':
    //DELETE IBASE
    $sql = "delete from T_MAHASISWA_16N10003";
    echo ibase_query($conn_fire,$sql) or die(ibase_errmsg());
    break;

  case 'pembayaran':
    //DELETE SQL
    $sql = "truncate table pembayarankrs_16n10003";
    $conn_mysql->query($sql);
    break;

  case 'historypembayaran':
    //DELETE SQL
    $sql = "truncate table history_pembayarankrs_16n10003";
    $conn_mysql->query($sql);
    break;

  case 'hasilstudy':
    //DELETE SQL
    $sql = "truncate table hasilstudy_16n10003";
    $conn_mysql->query($sql);
    break;

  case 'historyhasilstudy':
    //DELETE SQL
    $sql = "truncate table history_hasilstudy_16n10011";
    $conn_mysql->query($sql);
    break;

  case 'matkul':
    //DELETE IBASE
    $sql = "delete from T_MATAKULIAH_16N10003";
    echo ibase_query($conn_fire,$sql) or die(ibase_errmsg());
    break;

  default:
    // code...
    break;
}

header("Location: show.php");

?>
