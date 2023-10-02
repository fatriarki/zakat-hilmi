<?php
// mulai session
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

//cek status login
if(!isset($_SESSION['status'])){
    header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Zakat</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 

    // mendapatkan id pembayaran
    $id_muzakki = $_GET['id_muzakki'];
    
	?>

        <div id="wrapper" class="active">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
            <li class="sidebar-brand"><img class="img-thumbnail" src="assets/img/logo.png" alt="" style="width: 100px; height: 100px; margin-top:10px;border-radius: 20px 20px 20px 20px;"></li>
        </ul>
        <ul id="sidebar_menu" class="sidebar-nav" style="margin-top: 60px;">
            <li class="sidebar-brand"><a id="menu-toggle" href="index.php">Beranda<span id="main_icon"></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">     
            <li><a href="muzakki.php">Muzakki</a></li>
            <li><a href="add_data.php">Tambah Data Zakat</a></li>
            <li><a href="list_data.php">Data Zakat</a></li>
            <li><a href="distribusi.php">Distribusi Zakat</a></li>
            <li><a href="list_distribusi.php">Data Distribusi</a></li>
            <li><a href="logout.php">Keluar</a></li>
        </ul>
        </div>
          
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
                <div class="col-md-12">
                <p class="well lead" style="margin-top: 10px;">Ubah Data Muzakki</p>

                <?php 

                // mendapatkan data pembayaran yg dipilih
                $getData = "SELECT * FROM `muzakki` WHERE `id_muzakki` = $id_muzakki"; 
                if ($res = mysqli_query($koneksi, $getData)) { 
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                
                <div class="col-1 col-sm-8 bg-secondary" style="margin-bottom: 50px;">
                    <form method="post" action="cek_ubah_muzakki.php">
                        <div class="form-group">
                            <label for="nama_muzakki">Nama Muzakki</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama_muzakki" required>
                        </div>
                        <div class="form-group">
                            <label for="jml_tanggungan">Jumlah tanggungan</label>
                            <input type="number" class="form-control" placeholder="Masukan Jumlah" name="jml_tanggungan" id="jml_tgg" onchange = "update()">
                        </div>
                        <div class="form-group">
                            <label for="jml_bayar">jumlah bayar</label>
                            <input type="float" class="form-control" name="jml_bayar" id="jml_bayar" required>
                        </div>
                        <div class="form-group">
                            <label for="uang">uang</label>
                            <input type="float" class="form-control" name="uang" id="uang" required>
                        </div>
                        <div class="form-group">
                            <label for="beras">beras</label>
                            <input type="float" class="form-control" name="beras" id="beras" required>
                        </div>
                        <div>
                            <input type="submit" id="button-login" name="button-login" class="btn btn-primary" style="min-width: 100px;">
                            <input type="reset" value="Batal" id="button-login" name="button-login" class="btn btn-primary" style="min-width: 100px;">
                        </div>
                        
                    </form>

                    <?php
                            }
                        }
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($koneksi); 
                    }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
    <script>
                    // Mendapatkan referensi elemen input
                    var jmlTanggunganInput = document.getElementById('jml_tgg');
                    var jmlDibayarInput = document.getElementById('jml_bayar');
                    var bayarUangInput = document.getElementById('uang');
                    var bayarBerasInput = document.getElementById('beras');
                    

                    // Menambahkan event listener pada input jumlah tanggungan yang dibayar
                    jmlDibayarInput.addEventListener('input', function() {
                        // Mengambil nilai jumlah tanggungan yang dibayar
                        var jmlDibayar = parseFloat(jmlDibayarInput.value);
                        
                        // Mengambil nilai jumlah tanggungan
                        var jmlTanggungan = parseFloat(jmlTanggunganInput.value);

                        // Menghitung jumlah beras dan uang
                        var satuanUang = 35000; // Satuan uang per tanggungan (Rp)
                        var satuanBeras = 2.5; // Satuan beras per tanggungan (kg)
                        
                        var bayarUang = jmlDibayar * satuanUang;
                        var bayarBeras = jmlDibayar  * satuanBeras;
                        

                        // Menyimpan nilai ke input beras dan uang
                        bayarUangInput.value = bayarUang;
                        bayarBerasInput.value = bayarBeras;
                        
                    });
    </script>
</body>
</html>