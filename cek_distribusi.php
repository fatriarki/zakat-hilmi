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
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $jml_tanggungan = $_POST['jml_tanggungan'];
    $besar = $_POST['besar'];
    $waktu = $_POST['waktu'];



    $sql = "INSERT INTO `tb_distribusi`(
         
        `nama`,
        `kategori`, 
        `jml_tanggungan`, 
        `besar`,
        `waktu`) 
        VALUES (
            
            '$nama',
            '$kategori',
            '$jml_tanggungan',
            '$besar',
            '$waktu'
        )";

    if (mysqli_query($koneksi, $sql)) { 
        header("location:add_data.php?pesan=berhasil_tambah_data");
    }else{ 
        header("location:add_data.php?pesan=gagal_tambah_data");
    } 

    mysqli_close($koneksi); 

?>