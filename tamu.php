<?php
    session_start();
    include 'koneksi.php';
    if(isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
    }
    else
    {
        echo "
        <script>
        location='index.php';
        alert('Silahkan Login Dahulu');
        </script>
        ";
    }

    //syntax untuk paging
    $jumlahdata = 5;
    $halaman =isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai =($halaman>1) ? ($halaman * $jumlahdata) - $jumlahdata : 0;
    $hitung = mysqli_query($db, "SELECT * FROM datatamu");
    $total = mysqli_num_rows($hitung);
    $pages = ceil($total/$jumlahdata);
    $sql = mysqli_query($db, "SELECT * FROM datatamu ORDER BY idtamu DESC LIMIT $mulai, $jumlahdata");

    // syntax untuk load pegawai
    $cekpeg = mysqli_query($db, "SELECT * FROM pegawai");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tamu</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>
<body>
<!-- daftar tamu -->
    <div class="w3-container">
    <h2>Daftar Tamu</h2>
    <table class="w3-table-all w3-centered">
    <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Pekerjaan</th>
        <th>Alamat / Instansi</th>
        <th>No HP</th>
        <th>Keperluan</th>
        <th>Foto</th>
    </tr>

    <?php while ($no = mysqli_fetch_array($sql)) {
        echo "<tr>";
        echo "<td>".$no['nik']."</td>";
        echo "<td>".$no['nama']."</td>";
        echo "<td>".$no['pekerjaan']."</td>";
        echo "<td>".$no['alamat']."</td>";
        echo "<td>".$no['nohp']."</td>";
        echo "<td>".$no['keperluan']."</td>";
        echo "<td><img style='height: 200px;' src='foto/".$no['nik'].".".$no['extfoto']."'></td>";
        echo "</tr>";
    } ?>
    </table>
    <br>

    <!-- Paging -->
    <div class="w3-center">
        <div class="w3-bar">
            <a href="?halaman=1" class="w3-bar-item w3-button"><</a>
        <?php
            for ($i=1; $i<=$pages ; $i++){
                if ($halaman == $i) { ?>
            <a href="?halaman=<?php echo $i; ?>" class="w3-button w3-black"><?php echo $i; ?></a>
        <?php }
                else { ?>
            <a href="?halaman=<?php echo $i; ?>" class="w3-button"><?php echo $i; ?></a>
               <?php }
            }  ?>
        <a href="?halaman=<?php echo $pages; ?>" class="w3-button">></a>
    </div></div>
    <!-- Akhir Paging -->
    </div>
<!-- Akhir daftar tamu -->

<!-- Tambah tamu -->
    <div class="w3-container">
        <h2>Tambah Data Tamu</h2>

        <form method="POST" action="tamu_act.php" enctype="multipart/form-data">
            <label>NIK</label><br>
            <input type="text" name="nik" id="nik" onkeyup="ceknik()" class="w3-input w3-border" required="">
            
            <br>
            <label>Nama</label>
            <input type="text" name="nama" id="nama" class="w3-input w3-border" required="">
            
            <br>
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" class="w3-input w3-border" required="">
            
            <br>
            <label>Alamat / Instansi</label>
            <input type="text" name="alamat" id="alamat" class="w3-input w3-border" required="">
            
            <br>
            <label>Nomor HP</label>
            <input type="text" name="nohp" id="nohp" class="w3-input w3-border" required="">
            
            <br>
            <label>Keperluan</label>
            <input type="text" name="keperluan" id="keperluan" class="w3-input w3-border" required="">
            
            <br>
            <label>Foto</label>
            <input type="file" name="foto" class="w3-input w3-border" required>

            <br>
            <label>Pilih Pegawai yang Ingin Ditemui</label>
            <select name="pegawai" id="pegawai" class="w3-select">
                <?php
                while($pegawai = mysqli_fetch_array($cekpeg)) 
                {
                 echo "<option value='".$pegawai['nama']."'>".$pegawai['nama']." - ".$pegawai['jabatan']."</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" name="tambah" value="Tambah" class="w3-btn w3-green">
        </form>
    </div>

<script type="text/javascript">
        function ceknik(){
                var nik = $("#nik").val();
                $.ajax({
                    url: 'cek.php',
                    data:"nik="+nik ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#pekerjaan').val(obj.pekerjaan);
                    $('#alamat').val(obj.alamat);
                    $('#nohp').val(obj.nohp);
                    $('#keperluan').val(obj.keperluan);
                });
            }
    </script>
</body>
</html>