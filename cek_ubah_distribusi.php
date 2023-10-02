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
    $id_distribusi = $_POST['id_distribusi'];
    $nama  = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $jml_tanggungan = $_POST['jml_tanggungan'];
    $besar = $_POST['besar'];
    $waktu = $_POST['waktu'];

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

    $sql = "UPDATE tb_distribusi 
        SET nama = '$nama',
        kategori = '$kategori',
        jml_tanggungan = '$jml_tanggungan',
        besar = '$besar',
        waktu = '$waktu' 
        WHERE id_distribusi = '$id_distribusi' ";
    
    if (mysqli_query($koneksi, $sql)) { 
        header("location:list_distribusi.php?pesan=berhasil_ubah_data");
    }else{ 
        header("location:list_distribusi.php?pesan=gagal_ubah_data");
    } 

    mysqli_close($koneksi); 
?>