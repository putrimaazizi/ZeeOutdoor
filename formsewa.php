<?php
require 'functions.php';
session_start();
$username = $_SESSION['username'];
if(empty($_SESSION['username']) ){
    header("location:login.php?pesan=belum_login");
}
else if (cekstatus($username)==0){
    echo "<script>
            alert('maaf halaman yang Anda tuju adalah halaman Admin! Anda tidak dapat mengakses halaman');
            document.location.href = 'sewa2.php';
    </script>";
}

if(isset($_POST['submit'])){//cek apakah tombol submit sdh ditekan
        if(tambah($_POST)  > 0){
            echo "<script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'sewa.php';
            </script>";
        }
        else {
            echo "<script>
                alert('data gagal ditambahkan!');
                document.location.href = 'sewa.php';
            </script>"; 
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>inputdata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    Halo <?php echo $username ?> <br>
    <center><div class="ubah">
    <h2>input peralatan</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nama Alat</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td>:</td>
                <td><select name="brand" class="panjang">
                    <option>Consina</option>
                    <option>Eiger</option>
                    <option>Rei</option>
                </select></td>
            </tr>
            <tr>
                <td>Harga sewa/hari</td>
                <td>:</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="text" name="gambar"></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="submit" class="btn btn-info">Tambah</button>
        <a href="sewa.php" class="btn btn-info">Lihat data</a>
    </form>
    </div><center>
</body>
</html>