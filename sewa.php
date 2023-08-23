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

    $alat = query("SELECT * FROM alat"); //variabel alat diisi wadah yg udh ada isi dari lemari
    if(isset($_POST["cari"])){
        $alat = cari($_POST["keyword"]);
    }    
?>

<!DOCTYPE html>
<html>
<head>
    <title>HALAMAN ADMIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            background-color: #f2f2f2;
        }
        h1{
            text-align: center;
        }
        
    </style>
</head>
<body>
    Halo <?php echo $username ?> <br>
    <h1 class="display-4">Daftar Peralatan</h1>
    <a href="formsewa.php"><button type="button" class="btn btn-light" width=>Tambah data peralatan</button></a>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" placeholder="masukkan keyword pencarian..">
        <button type="submit" name="cari">Cari alat</button>
    </form><br>
    
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama Barang</th>        
        <th>Brand</th> 
        <th>Harga sewa/hari</th> 
        <th>Gambar</th>
        <th>Aksi</th> 
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    <?php foreach($alat as $row) : ?> 
    <tr>
      <th scope="row"><?= $i; ?></th>
        <td><?= $row["nama_barang"]; ?></td>
        <td><?= $row["brand"]; ?></td>
        <td><?= $row["hargasewa_perhari"]; ?></td>
        <td><img src="img/<?= $row["gambar"];?>" width="70"></td>
        <td>
            <a href="ubah.php?id=<?= $row["id_alat"]; ?>">ubah</a> <b>|</b>
            <a href="hapus.php?id=<?= $row["id_alat"]; ?>" onclick="return confirm('yakin mau hapus data?');">hapus</a>        
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
    </table>
    <center><a href="logout.php"><button type="button" class="btn btn-light">Logout</button></a></center>
</body>
</html>