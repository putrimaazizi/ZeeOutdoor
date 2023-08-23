<?php
    require 'functions.php';
    $alat = query("SELECT * FROM alat"); //variabel alat diisi wadah yg udh ada isi dari lemari
    if(isset($_POST["cari"])){
        $alat = cari($_POST["keyword"]);
    }
    $user = query2("SELECT * FROM user");
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Katalog</title>
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
    <h1 class="display-4">Daftar Peralatan</h1>
    
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
        <a href="login.php?pesan=belum_login">sewa</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>