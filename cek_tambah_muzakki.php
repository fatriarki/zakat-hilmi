<?php
    // mulai session
    session_start();

    // menghubungkan dengan koneksi
    include 'koneksi.php';

    //cek status login
    if(!isset($_SESSION['status'])){
        header("location:login.php?pesan=belum_login");
    }
    
    // mengambil data yang dikirim dari form
    $nama_muzakki = $_POST['nama_muzakki'];
    $jml_tgg = $_POST['jml_tanggungan'];
    $uang = $_POST['uang'];
    $beras = $_POST['beras'];
    $jml_bayar = $_POST['jml_bayar'];



    $sql = "INSERT INTO `muzakki`(
         
        `nama_muzakki`,
        `jml_tanggungan`, 
        `uang`, 
        `beras`,
        `jml_bayar`) 
        VALUES (
            
            '$nama_muzakki',
            '$jml_tgg',
            '$uang',
            '$beras',
            '$jml_bayar'
        )";

    if (mysqli_query($koneksi, $sql)) { 
        header("location:muzakki.php?pesan=berhasil_tambah_data");
    }else{ 
        header("location:muzakki.php?pesan=gagal_tambah_data");
    } 

    mysqli_close($koneksi); 

?>