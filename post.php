<?php

require 'vendor/autoload.php';
//Ambil libraryku buat excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include_once 'connection.php';
session_start();
$post = $_POST['type'];

switch ($post) {
    //Set password pertama kali
    case 'change_pass':
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_SESSION['userData']['email'];
        $sql = "UPDATE users SET password = '$pass' WHERE email = '$email'";
        $conn_mysql->query($sql);
        header('Location: index.php');
        break;

    //Login dengan password & email
    case 'login':
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $somehaw = $conn_mysql->query($sql);
        $row = mysqli_fetch_assoc($somehaw);
        if ($somehaw->num_rows) {
            if (password_verify($pass,$row['password'])) {
                $_SESSION['userData'] = $row;

                header('Location: index.php');
            }else{
                header('Location: login.php?error=2rr5');
            }
        }else{
            header('Location: login.php?error=2t4');
        }
        break;

    case 'table_krs':
        $target='upload-excel/'.basename($_FILES['excel']['name']);
        $file = $_FILES['excel']['tmp_name'];
        if(move_uploaded_file($_FILES['excel']['tmp_name'],$target)) {
            $inputFileName = $target;
            //  Read your Excel workbook
            try {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            $message = "Jumlah data yg sudah ada ";
            $jml = 0;
            //  Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++){
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                // Cek kalau ada row yg sama
                $select = "SELECT * FROM krs_16n10011 WHERE NIM='".$rowData[0][0]."' AND TAHUNAJARAN='".$rowData[0][1]."' AND KD_MSUJI='".$rowData[0][2]."' AND KODEMATAKULIAH='".$rowData[0][3]."' AND KELAS='".$rowData[0][4]."' AND OPERATOR='".$rowData[0][5]."'";
                $cek    = $conn_mysql->query($select);

                if ($cek->num_rows) {
                    $jml++;
                }else{
                    // Save kalau tidak ada
                    $values = "( '".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."')";
                    $sql = "INSERT INTO krs_16n10011 (`NIM`, `TAHUNAJARAN`, `KD_MSUJI`, `KODEMATAKULIAH`, `KELAS`, `OPERATOR`) VALUES";
                    $full =  $sql.$values;
                    $conn_mysql->query($full);
                }
            }

            header("Location: upload.php?message=".$message.$jml);
        }
        break;

    case 'table_pembayaran':
        $target='upload-excel/'.basename($_FILES['excel']['name']);
        $file = $_FILES['excel']['tmp_name'];
        if(move_uploaded_file($_FILES['excel']['tmp_name'],$target)) {
            $inputFileName = $target;
            //  Read your Excel workbook
            try {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            $message = "Jumlah data kedalam pembayaran ";
            $jml = 0;
            $jml2 = 0;
            //  Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++){
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                // Cek kalau ada row yg sama
                $select = "SELECT * FROM krs_16n10011 WHERE NIM='".$rowData[0][2]."' AND TAHUNAJARAN='".$rowData[0][0]."' AND KD_MSUJI='".$rowData[0][1]."'";
                $cek    = $conn_mysql->query($select);
                $select_2 = "SELECT * FROM pembayarankrs_16n10011 WHERE NIM='".$rowData[0][2]."' AND TAHUNAJARAN='".$rowData[0][0]."' AND KD_MSUJI='".$rowData[0][1]."'";
                $cek_2    = $conn_mysql->query($select_2);
                $select_3 = "SELECT * FROM history_pembayarankrs_16n10011 WHERE NIM='".$rowData[0][2]."' AND TAHUNAJARAN='".$rowData[0][0]."' AND KD_MSUJI='".$rowData[0][1]."'";
                $cek_3 = $conn_mysql->query($select_3);

                if ($cek->num_rows) {
                  if ($cek_2->num_rows) {
                  }else{
                    // Save ke pembayaran kalau ada
                    $values = "( '".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."')";
                    $sql = "INSERT INTO pembayarankrs_16n10011 (`TAHUNAJARAN`, `KD_MSUJI`, `NIM`, `UANGSKS`, `KET`) VALUES";
                    $full =  $sql.$values;
                    $conn_mysql->query($full);
                    $jml++;
                  }
                }else{
                  if ($cek_3->num_rows) {
                  }else{
                    // Save ke history pembayaran kalau tidak ada
                    $values = "( '".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."')";
                    $sql = "INSERT INTO history_pembayarankrs_16n10011 (`TAHUNAJARAN`, `KD_MSUJI`, `NIM`, `UANGSKS`, `KET`) VALUES";
                    $full =  $sql.$values;
                    $conn_mysql->query($full);
                    $jml2++;
                  }
                }
            }

            header("Location: upload.php?message=".$message.$jml." serta kedalam history pembayaran ".$jml2);
        }
        break;


    case 'table_hasil_study':
        $target='upload-excel/'.basename($_FILES['excel']['name']);
        $file = $_FILES['excel']['tmp_name'];
        if(move_uploaded_file($_FILES['excel']['tmp_name'],$target)) {
            $inputFileName = $target;
            //  Read your Excel workbook
            try {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            $message = "Jumlah data kedalam hasil studi ";
            $jml = 0;
            $jml2 = 0;
            //  Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++){
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                // Cek kalau ada row yg sama
                $select = "SELECT * FROM krs_16n10011 WHERE NIM='".$rowData[0][2]."' AND TAHUNAJARAN='".$rowData[0][0]."' AND KD_MSUJI='".$rowData[0][1]."' AND KODEMATAKULIAH='".$rowData[0][3]."'";
                $cek    = $conn_mysql->query($select);
                $select_2 = "SELECT * FROM hasilstudy_16n10011 WHERE NIM='".$rowData[0][2]."' AND THNAJAR='".$rowData[0][0]."' AND KD_MSUJI='".$rowData[0][1]."' AND KDMK_PUS='".$rowData[0][3]."'";
                $cek_2    = $conn_mysql->query($select_2);
                $select_3 = "SELECT * FROM history_hasilstudy_16n10011 WHERE NIM='".$rowData[0][2]."' AND THNAJAR='".$rowData[0][0]."' AND KD_MSUJI='".$rowData[0][1]."' AND KDMK_PUS='".$rowData[0][3]."'";
                $cek_3 = $conn_mysql->query($select_3);
                $rowData[0][4] = (($rowData[0][10]*0.3)+($rowData[0][11]*0.3)+($rowData[0][9]*0.3));

                if($rowData[0][4] >= 80){
                    $rowData[0][8] = "A";
                } elseif ($rowData[0][4] >= 70 && $rowData[0][4] < 80) {
                    $rowData[0][8] = "B";
                } elseif ($rowData[0][4] >= 60 && $rowData[0][4] < 70) {
                    $rowData[0][8] = "C";
                } elseif ($rowData[0][4] >= 50 && $rowData[0][4] < 60) {
                    $rowData[0][8] = "D";
                }else{
                    $rowData[0][8] = "E";
                }

                if ($cek->num_rows) {
                  if ($cek_2->num_rows) {
                  }else{
                    // Save ke pembayaran kalau ada
                    $values = "( '".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."','".$rowData[0][6]."','".$rowData[0][7]."','".$rowData[0][8]."','".$rowData[0][9]."','".$rowData[0][10]."','".$rowData[0][11]."')";
                    $sql = "INSERT INTO hasilstudy_16n10011 (`THNAJAR`, `KD_MSUJI`, `NIM`, `KDMK_PUS`, `NILAI`,`OPERATOR`,`KD_JUR`,`DOSEN`,`KETERANGAN`,`TUGAS`,`UTS`,`UAS`) VALUES";
                    $full =  $sql.$values;
                    $conn_mysql->query($full);
                    $jml++;
                  }
                }else{
                  if ($cek_3->num_rows) {
                  }else{
                    // Save ke history pembayaran kalau tidak ada
                    if ($rowData[0][0] != 0) {
                      $values = "( '".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."','".$rowData[0][6]."','".$rowData[0][7]."','".$rowData[0][8]."','".$rowData[0][9]."','".$rowData[0][10]."','".$rowData[0][11]."')";
                      $sql = "INSERT INTO history_hasilstudy_16n10011 (`THNAJAR`, `KD_MSUJI`, `NIM`, `KDMK_PUS`, `NILAI`,`OPERATOR`,`KD_JUR`,`DOSEN`,`KETERANGAN`,`TUGAS`,`UTS`,`UAS`) VALUES";
                      $full =  $sql.$values;
                      $conn_mysql->query($full);
                      $jml2++;
                    }
                  }
                }
            }

            header("Location: upload.php?message=".$message.$jml." serta kedalam history hasil study ".$jml2);
        }
        break;

    case 'table_mahasiswa':
        $target='upload-excel/'.basename($_FILES['excel']['name']);
        $file = $_FILES['excel']['tmp_name'];
        if(move_uploaded_file($_FILES['excel']['tmp_name'],$target)) {
            $inputFileName = $target;
            //  Read your Excel workbook
            try {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            $message = "Jumlah data kedalam mahasiswa ";
            $jml = 0;
            $jml2 = 0;
            //  Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++){
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                    $check = "SELECT * FROM T_MAHASISWA_16N10011 WHERE NIM = '".$rowData[0][2]."'";
                    $koko = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                    if (ibase_fetch_row($koko)) {
                      $jml2++;
                    }else{
                    // Save ke history pembayaran kalau tidak ada
                    $values = "( '".$rowData[0][2]."','".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][3]."')";
                    $sql = "INSERT INTO T_MAHASISWA_16N10011 VALUES";
                    $full =  $sql.$values;
                    ibase_query($conn_fire,$full) or die(ibase_errmsg());
                    $jml++;
                    }
            }

            header("Location: upload.php?message=".$message.$jml." dan jumlah yang tidak masuk karna nim sama".$jml2);
        }
        break;

        case 'table_matkul':
        $target='upload-excel/'.basename($_FILES['excel']['name']);
        $file = $_FILES['excel']['tmp_name'];
        if(move_uploaded_file($_FILES['excel']['tmp_name'],$target)) {
            $inputFileName = $target;
            //  Read your Excel workbook
            try {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            $message = "Jumlah data kedalam mata kuliah ";
            $jml = 0;
            $jml2 = 0;
            //  Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++){
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                    $check = "SELECT * FROM T_MATAKULIAH_16N10011 WHERE KDMK_JUR = '".$rowData[0][0]."'";
                    $koko = ibase_query($conn_fire,$check) or die(ibase_errmsg());
                    if (ibase_fetch_row($koko)) {
                      $jml2++;
                    }else{
                    // Save ke history pembayaran kalau tidak ada
                    $values = "( '".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."')";
                    $sql = "INSERT INTO T_MATAKULIAH_16N10011 VALUES";
                    $full =  $sql.$values;
                    ibase_query($conn_fire,$full) or die(ibase_errmsg());
                    $jml++;
                    }
            }

            header("Location: upload.php?message=".$message.$jml." dan jumlah yang tidak masuk karna kode matkul sama".$jml2);
        }
        break;

    default:
        # code...
        break;
}

//

?>
