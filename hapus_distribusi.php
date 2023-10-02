<?php

    // mulai session
    session_start();

    // menghubungkan dengan koneksi
    include 'koneksi.php';

    //cek status login
    if(!isset($_SESSION['status'])){
        header("location:login.php?pesan=belum_login");
    }

    session_start();

    $id_distribusi = $_GET['id_distribusi'];

    $sql = "DELETE FROM `tb_distribusi` WHERE `id_distribusi` = $id_distribusi";

    if (mysqli_query($koneksi, $sql)) { 
        header("location:list_distribusi.php?pesan=berhasil_hapus_data");
    }else{ 
        header("location:list_distribusi.php?pesan=gagal_hapus_data");
    }

?>