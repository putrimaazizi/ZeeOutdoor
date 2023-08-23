<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","projek2020");
if($conn -> connect_error){
    die('koneksi gagal : '. $connect->connect_error);
}

function registrasi ($data) {
    global $conn;

    //lalu kita ambil datanya, kita simpan dalam variabel
    $username = $data["username"];
    $password = $data["password"];
    //$username = strtolower($conn, $data["username"]); 
    //$password = '$conn, $data["password"]'; 

    //cek username udah ada/belum di db
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert ('gagal registrasi! username sudah terdaftar')
            </script>";
        return false;
    }

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '0')");
        //untuk menghasilkan angka 1 jika berhasil  dan -1 jika gagal
        return mysqli_affected_rows($conn); 
}

function cekstatus($username){
    global $conn;
    $query = "SELECT nilai FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $status = mysqli_fetch_assoc($result)['nilai'];
    return $status; 
}

function query($query){
    global $conn; //variabel didlm function beda sama yg diluar, dikasih global biar mengacu sm yg diluar
    $result =  mysqli_query($conn, $query); //result adalah lemari
    $rows = []; //array kosong utk wadah
    while($row = mysqli_fetch_assoc($result)){ //row= isi dlm lemari yg diambil
        $rows[] = $row;
    }
    return $rows;
}
function query2($query){
    global $conn; //variabel didlm function beda sama yg diluar, dikasih global biar mengacu sm yg diluar
    $result =  mysqli_query($conn, $query); //result adalah lemari
    
    $row2 = mysqli_fetch_assoc($result)['id'];//row= isi dlm user yg diambil
    return $row2;
    echo mysqli_error($conn);
}

function tambah($data) {
    global $conn; 
    $nama = $data["nama"];
    $brand = $data["brand"];
    $harga = $data["harga"];
    $gambar = $data["gambar"];

    $query = "INSERT INTO alat VALUES ('', '$nama', '$brand', '$harga', '$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM alat WHERE id_alat = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $brand = $data["brand"];
    $harga = $data["harga"];
    $gambar = $data["gambar"];

    $query = "UPDATE alat SET nama_barang ='$nama', brand = '$brand', hargasewa_perhari = '$harga', 
                                gambar = '$gambar' WHERE id_alat = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM alat WHERE nama_barang LIKE '%$keyword%' OR brand LIKE '%$keyword%' OR 
    hargasewa_perhari LIKE '%$keyword%' ";
    return query($query);
    
}

function sewa($data) {
    global $conn;
    $id = $data["id"];
    $id2 = $data["id2"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $telp = $data["telp"];
    $namabarang = $data["namabarang"];
    $brand = $data["brand"];
    $perhari = $data["sewaperhari"];
    $hari = $data["hari"];
    $ambil = $data["ambil"];
    $kembali = $data["kembali"];
    $total = $data["sewaperhari"] * $data["hari"];
    
    $query = "INSERT INTO sewa VALUES ('', '$id2', '$id', '$nama', '$alamat', '$telp', '$namabarang', '$brand', '$perhari', '$ambil', '$kembali', '$hari', '$total')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    
}
?>