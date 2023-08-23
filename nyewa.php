<?php
session_start();
$username = $_SESSION['username'];
if(empty($_SESSION['username'])){
    header("location:login.php?pesan=belum_login");
}

require 'functions.php';
$id = $_GET["id"];
$id2 = $_GET["id2"];
$alat2 = query("SELECT * FROM alat WHERE id_alat = $id")[0];
$user = query("SELECT * FROM user WHERE id = $id2")[0];

if(isset($_POST['submit'])){//cek apakah tombol submit sdh ditekan 
        if(sewa($_POST)  > 0){
            echo "<script>
                    alert('pemesanan berhasil ditambahkan!');
                    document.location.href = 'nyewa2.php';
            </script>";
        }
        else {
            echo mysqli_error($conn); 
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>sewa alat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    Selamat datang, <?php echo $username ?>
    <center><div class="sewa">
    <h2>Sewa peralatan</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $alat2['id_alat'];?>">
        <input type="hidden" name="id2" value="<?= $user['id'];?>">
        <table>
            <tr>
                <td>Nama Penyewa</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td><input type="text" name="telp"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="namabarang" value="<?= $alat2['nama_barang'] ;?>"></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td>:</td>
                <td><input type="text" name="brand" value="<?= $alat2['brand'] ;?>"></td>
            </tr>
            <tr>
                <td>Sewa berapa hari?</td>
                <td>:</td>
                <td><input type="number" name="hari"></td>
            </tr>
            <tr>
                <td>Tanggal Pengambilan</td>
                <td>:</td>
                <td><input type="date" placeholder="dd/mm/yyyy" name="ambil" class="panjang"></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td>:</td>
                <td><input type="date" placeholder="dd/mm/yyyy" name="kembali" class="panjang"></td>
            </tr>
        </table>
        <input type="hidden" name="sewaperhari" value="<?= $alat2['hargasewa_perhari'];?>">
        <br>
        <button type="submit" name="submit" class="btn btn-info">sewa</button>
    </form>
    </div></center>
</body>
</html>