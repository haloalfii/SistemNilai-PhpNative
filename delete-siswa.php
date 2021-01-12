|<?php
    include_once 'proses.php';

    $nis = $_GET['nis'];
    $siswaku = new Siswaku;
    $delete = $siswaku->delete($nis);
    if ($delete){
        echo "<script>alert('Data Category berhasil dihapus');window.location = 'lihat-siswa.php';</script>";
    }

    $deleteNilai = $siswaku->deleteNilai($nis);
?>