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
    $id_pby = $_POST['id_pembayaran'];
    $jenis  = $_POST['jenis'];
    $kategori = $_POST['kategori'];
    $nominal = $_POST['nominal'];
    $nama_lengkap = $_POST['nama_lengkap'];

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

    $sql = "UPDATE tb_pembayaran_zakat 
        SET jenis = '$jenis',
        kategori = '$kategori',
        nominal = '$nominal',
        nama_lengkap = '$nama_lengkap' 
        WHERE id_pembayaran = '$id_pby' ";
    
    if (mysqli_query($koneksi, $sql)) { 
        header("location:list_data.php?pesan=berhasil_ubah_data");
    }else{ 
        header("location:list_data.php?pesan=gagal_ubah_data");
    } 

    mysqli_close($koneksi); 
?>