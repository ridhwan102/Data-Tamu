<?php
include 'koneksi.php';

/////////// Untuk form tambah tamu
if (isset($_POST['tambah'])) 
{
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $keperluan = $_POST['keperluan'];
    $pegawai = $_POST['pegawai'];
    $extfoto = '.png';  ///// ganti !!

    $sqlcek = mysqli_query($db, "SELECT * FROM datatamu WHERE nik = '$nik'");
    $cek = mysqli_fetch_array($sqlcek);
    if ($nik == $cek['nik']) 
    {
        // update data sesuai nik
        $update = mysqli_query($db, "UPDATE datatamu SET nama='$nama', pekerjaan='$pekerjaan', alamat='$alamat', nohp='$nohp', keperluan='$keperluan dengan $pegawai', extfoto='$extfoto'  WHERE nik = '$nik'");
        if ($update) 
        {
            echo "
            <script>
            location='tamu.php';
            alert('Data berhasil diupdate');
            </script>
            ";
        }
        else
        {
            echo "
            <script>
            location='tamu.php';
            alert('Data gagal diupdate');
            </script>
            ";
        }
    }
    else
    {
        // tambahkan dalam database
        $insert = mysqli_query($db, "INSERT INTO datatamu (nohp) VALUES ('$nohp')");
        if ($insert) 
        {
            echo "
            <script>
            location='tamu.php';
            alert('Data berhasil ditambahkan');
            </script>
            ";
        }
        else
        {
            echo "
            <script>
            location='tamu.php';
            alert('Data gagal ditambahkan');
            </script>
            ";
        }
    }
}


?>