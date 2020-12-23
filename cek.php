<?php
include 'koneksi.php';
$nik = $_GET['nik'];
$sqlcek = mysqli_query($db, "SELECT * FROM datatamu WHERE nik = '$nik'");
$cek = mysqli_fetch_array($sqlcek);

$data = array(
            'nama' => $cek['nama'],
            'pekerjaan' => $cek['pekerjaan'],
            'alamat' => $cek['alamat'],
            'nohp' => $cek['nohp'],
            'keperluan' => $cek['keperluan']
        );

//tampil data
echo json_encode($data);

?>