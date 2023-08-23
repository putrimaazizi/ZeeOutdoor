<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
     if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){
                echo "Login gagal! username / password salah!";
            }
            else if($_GET['pesan']=="belum_login"){
                echo "Anda harus login untuk mengakses halaman sewa";
            }
        }
    ?>
    <div class="log">
    <h2>Login</h2>
    <form action="ceklogin.php" method="POST">
        Username<br>
        <input type="text" name="username" placeholder="masukkan username"><br>
        Password<br> 
        <input type="text" name="password" placeholder="masukkan password" autocomplete="off"><br>
        <br><button type="submit" name="login">Login</button>
    </form>
    <br>belum registrasi? <a href="registrasi.php">klik disini</a>
    </div>
</body>
</html>