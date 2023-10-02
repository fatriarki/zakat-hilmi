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
    $jenis = $_POST['jenis'];
    $kategori = $_POST['kategori'];
    $nominal = $_POST['nominal'];
    $nama_lengkap = $_POST['nama_lengkap'];



    $sql = "INSERT INTO `tb_pembayaran_zakat`(
         
        `jenis`,
        `kategori`, 
        `nominal`, 
        `nama_lengkap`) 
        VALUES (
            
            '$jenis',
            '$kategori',
            '$nominal',
            '$nama_lengkap'
        )";

    if (mysqli_query($koneksi, $sql)) { 
        header("location:add_data.php?pesan=berhasil_tambah_data");
    }else{ 
        header("location:add_data.php?pesan=gagal_tambah_data");
    } 

    mysqli_close($koneksi); 

?>