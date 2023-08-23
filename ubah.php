<?php 
require 'functions.php';
session_start();
$username = $_SESSION['username'];
if(empty($_SESSION['username'])){
    header("location:login.php?pesan=belum_login");
}
else if (cekstatus($username)==0){
    echo "<script>
            alert('maaf halaman yang Anda tuju adalah halaman Admin!
            Anda tidak dapat mengakses halaman');
            document.location.href = 'sewa2.php';
    </script>";
}

//ambil data di URL
$id = $_GET["id"];
//query data alat berdasarkan id
$alat = query("SELECT * FROM alat WHERE id_alat = $id")[0];

if(isset($_POST['submit'])){//cek apakah tombol submit sdh ditekan
        if(ubah($_POST)  > 0){
            echo "<script>
                    alert('data berhasil diubah!');
                    document.location.href = 'sewa.php';
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
    <title>edit data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    Halo <?php echo $username ?> <br>
    <center><div class="ubah">
    <h2>ubah data peralatan</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $alat['id_alat'];?>">
        <table>
            <tr>
                <td>Nama Alat</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?= $alat["nama_barang"];?>"></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td>:</td>
                <td><select name="brand" class="panjang" value="<?= $alat['brand'] ;?>">
                    <option>Consina</option>
                    <option>Eiger</option>
                    <option>Rei</option>
                </select></td>
            </tr>
            <tr>
                <td>Harga sewa/hari</td>
                <td>:</td>
                <td><input type="number" name="harga" value="<?= $alat['hargasewa_perhari'] ;?>"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="text" name="gambar" value="<?= $alat['gambar'] ;?>"></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="submit" class="btn btn-info">Ubah</button>
    </form>
    </div><center>
</body>
</html>