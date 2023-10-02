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

    $id_muzakki = $_GET['id_muzakki'];

    $sql = "DELETE FROM `muzakki` WHERE `id_muzakki` = $id_muzakki";

    if (mysqli_query($koneksi, $sql)) { 
        header("location:muzakki.php?pesan=berhasil_hapus_data");
    }else{ 
        header("location:muzakki.php?pesan=gagal_hapus_data");
    }

?>