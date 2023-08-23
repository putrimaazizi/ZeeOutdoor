<?php
    session_start();
    $username = $_SESSION['username'];
    if(empty($_SESSION['username'])){
        header("location:login.php?pesan=belum_login");
    }
    require 'functions.php';
    $sewa = query("SELECT * FROM sewa");
?>
<!DOCTYPE html>
<html>
<head>
    <title>konfirmasi sewa alat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
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
    Selamat datang, <?php echo $username ?>
    <h1 class="display-4">Konfirmasi Penyewaan</h1>
    <br>sewa alat lagi?<a href="sewa2.php"><button>YA</button></a>
    <br><br>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama Barang</th>        
        <th>Brand</th> 
        <th>Tanggal ambil</th>
        <th>Tanggal kembali</th>
        <th>Lama sewa</th>
        <th>Harga sewa/hari</th> 
        <th>Total pembayaran</th> 
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    <?php foreach($sewa as $row) : ?> 
    <tr>
      <th scope="row"><?= $i; ?></th>
        <td><?= $row["nama_barang"]; ?></td>
        <td><?= $row["brand"]; ?></td>
        <td><?= $row["tgl_ambil"]; ?></td>
        <td><?= $row["tgl_kembali"]; ?></td>
        <td><?= $row["lama_sewa(hari)"]; ?></td>
        <td><?= $row["hargasewa_perhari"]; ?></td>
        <td><?= $row["total"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
    </table>
    <br><br>
    <div class="zee">
    <h6>Metode Pembayaran :<h6>
    <h6>OVO (082225658484 an. Putrima Azizi)</h6>
    <h6>DANA (082225658484 an. Putrima Azizi)</h6>
    <h6>BNI (no rek : 35681523318 an. Putrima Azizi)</h6>
    <br><br>
    <h6>setelah melakukan pembayaran, lakukan konfirmasi melalui WhatsApp/Telp. 081328056999</h6>
    <h6>Terimakasih telah menyewa alat di Zee Outdoor:)</h6>
    </div>
    <center><a href="logout.php"><button>Logout</button></a></center>
</body>
</html>