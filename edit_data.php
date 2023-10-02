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
    $id = $_GET['id'];
    
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
            <li><a href="add_data.php">Tambah Data Zakat</a></li>
            <li><a href="list_data.php">Data Zakat</a></li>
            <li><a href="logout.php">Keluar</a></li>
        </ul>
        </div>
          
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
                <div class="col-md-12">
                <p class="well lead" style="margin-top: 10px;">Ubah Data Zakat</p>

                <?php 

                // mendapatkan data pembayaran yg dipilih
                $getData = "SELECT * FROM `tb_pembayaran_zakat` WHERE `id_pembayaran` = $id"; 
                if ($res = mysqli_query($koneksi, $getData)) { 
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                
                <div class="col-1 col-sm-8 bg-secondary" style="margin-bottom: 50px;">
                    <form method="post" action="cek_ubah_data.php">
                        <input type="hidden" name="id_pembayaran" value="<?= $row['id_pembayaran']?>" >
                        <div class="form-group">
                            <label for="jenis">Jenis Zakat</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value=""> -- Masukan Pilihan -- </option>
                                <?php 
                                $sql=mysqli_query($koneksi, "SELECT * FROM tb_zakat");
                                while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?=$data['jenis_zakat']?>"><?=$data['jenis_zakat']?></option> 
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Bayar Zakat</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value=""> -- Masukan Pilihan -- </option>
                                <?php 
                                $sql=mysqli_query($koneksi, "SELECT * FROM tb_bayar");
                                while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?=$data['jenis_bayar']?>"><?=$data['jenis_bayar']?></option> 
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Jumlah(Kg/Rp)</label>
                            <input type="number" class="form-control" placeholder="Masukan Nominal" name="nominal" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap'] ?>" required>
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
</body>
</html>