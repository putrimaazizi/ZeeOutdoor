<?php
include "functions.php";
if(isset($_POST["submit"])) {
    if(registrasi($_POST)>0) {
    echo "<script>
        alert('registrasi berhasil!');
        </script>";
} else {
    echo mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="reg">
    <h2>Registrasi</h2>
    <form action="" method="POST">
        Username<br>
        <input type="text" name="username" placeholder="masukkan username"><br>
        Password<br> 
        <input type="text" name="password" placeholder="masukkan password" autocomplete="off"><br>
        <br><button type="submit" name="submit">Register</button>
    </form>
    <br>sudah registrasi? <a href="login.php">login disini</a>
    </div>
</body>
</html>