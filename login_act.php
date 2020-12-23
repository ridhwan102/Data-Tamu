<?php
session_start();
include "koneksi.php";

/////////// Untuk form login
if (isset($_POST['login'])) 
{
    $user = addslashes($_POST['user']);
    $pass = $_POST['pass'];
    $sqlcek = mysqli_query($db, "SELECT * FROM akun WHERE user = '$user'");
    $cek = mysqli_fetch_array($sqlcek);

    $salt = $cek['salt'];
    $finalpass = md5($salt.md5($salt).md5($pass));    

    if(($user == $cek['user']) && ($finalpass == $cek['password']))
    {
        echo "
        <script>
        location='tamu.php';
        </script>
        ";
        $_SESSION['user'] = $user;
    }
    else
    {
        echo "
        <script>
        location='login.php';
        alert('Nomor HP atau Password salah');
        </script>
        ";
    }
}

?>