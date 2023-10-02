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
    <title>Edit Distribusi</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 

    // mendapatkan id pembayaran
    $id_distribusi = $_GET['id_distribusi'];
    
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
                <p class="well lead" style="margin-top: 10px;">Ubah Data Distribusi</p>

                <?php 

                // mendapatkan data pembayaran yg dipilih
                $getData = "SELECT * FROM `tb_distribusi` WHERE `id_distribusi` = $id_distribusi"; 
                if ($res = mysqli_query($koneksi, $getData)) { 
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                
                <div class="col-1 col-sm-8 bg-secondary" style="margin-bottom: 50px;">
                    <form method="post" action="cek_ubah_distribusi.php">
                        <input type="hidden" name="id_distribusi" value="<?= $row['id_distribusi']?>" >
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select name="nama" id="nama" class="form-control" required>
                                <option value=""> <?php echo $row['nama'] ?> </option>
                                <?php 
                                $sql=mysqli_query($koneksi, "SELECT * FROM tb_distribusi");
                                while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?=$data['nama']?>"><?=$data['nama']?></option> 
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value=""> <?php echo $row['kategori'] ?> </option>
                                <?php 
                                $sql=mysqli_query($koneksi, "SELECT * FROM mustahik");
                                while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?=$data['kategori_mustahik']?>"><?=$data['kategori_mustahik']?></option> 
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jml_tanggungan">Jumlah Tanggungan</label>
                            <input type="number" class="form-control"  name="jml_tanggungan"value="<?php echo $row['jml_tanggungan'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="besar">Nominal</label>
                            <input type="float" class="form-control" name="besar" value="<?php echo $row['besar'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="date" class="form-control" name="waktu" required>
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