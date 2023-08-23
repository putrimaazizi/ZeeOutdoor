<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","projek2020");
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password_='$password'") or die (mysqli_error($conn));
    $cek = mysqli_num_rows($query);
    
    function cekstatus($username){
        global $conn;
        $query = "SELECT nilai FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        $status = mysqli_fetch_assoc($result)['nilai'];
        return $status; 
    }

    if($cek>0 && cekstatus($username)==1){
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        
        header("location:sewa.php");
    }
    else if ($cek>0 && cekstatus($username)==0) {
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        
        header("location:sewa2.php");
        echo mysqli_error($conn);
    }
    else {
        header("location:login.php?pesan=gagal");
        echo mysqli_error($conn);
    }
?>