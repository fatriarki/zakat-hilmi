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
    $id_muzakki = $_POST['id_muzakki'];
    $nama_muzakki  = $_POST['nama_muzakki'];
    $jml_tanggungan = $_POST['jml_tanggungan'];
    $uang = $_POST['uang'];
    $beras = $_POST['beras'];

    // //pengambilan id zakat dari jenis zakat
    // $zakat = "SELECT id_zakat FROM tb_zakat WHERE jenis_zakat='$jenis_zakat'";
    // if ($res = mysqli_query($koneksi, $zakat)) { 
	// 	if (mysqli_num_rows($res) > 0) { 
	// 		while ($row = mysqli_fetch_array($res)) { 
    //             $id_zakat = $row['id_zakat'];
	// 		}
	// 	}
	// 	else { 
	// 		echo "No matching records are found."; 
	// 	}
	// } 
	// else { 
	// 	echo "ERROR: Could not able to execute $sql. "
	// 								.mysqli_error($link); 
    // }

    $sql = "UPDATE muzakki
        SET nama_muzakki = '$nama_muzakki',
        jml_tanggungan = '$jml_tanggungan',
        uang = '$uang',
        beras = '$beras' 
        WHERE id_muzakki = '$id_muzakki' ";
    
    if (mysqli_query($koneksi, $sql)) { 
        header("location:muzakki.php?pesan=berhasil_ubah_data");
    }else{ 
        header("location:muzakki.php?pesan=gagal_ubah_data");
    } 

    mysqli_close($koneksi); 
?>