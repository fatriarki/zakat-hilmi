<!DOCTYPE html>
<html>
<head>
    <title>Distribusi Zakat</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- cek apakah sudah login -->
    <?php 
    include 'koneksi.php';
    session_start();
    
    //cek status login
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
    }

    //cek notifikasi
    if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "berhasil_tambah_data"){
            echo "<script type='text/javascript'>alert('Berhasil Menambahkan Data');</script>";
        }else if($_GET['pesan'] == 'gagal_tambah_data'){
            echo "<script type='text/javascript'>alert('Gagal Menambahkan Data');</script>";
        }
    }
    
	?>

        <div id="wrapper" class="active">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
            <li class="sidebar-brand"><img class="img-thumbnail" src="assets/img/zakat.png" alt="" style="width: 100px; height: 100px; margin-top:10px;border-radius: 20px 20px 20px 20px;"></li>
        </ul>
        <ul id="sidebar_menu" class="sidebar-nav" style="margin-top: 60px;">
            <li class="sidebar-brand"><a id="menu-toggle" href="index.php">Beranda<span id="main_icon"></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">  
            <li><a href="muzakki.php">Muzakki</a></li>   
            <li><a href="add_data.php">Bayar Zakat</a></li>
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
                <p class="well lead" style="margin-top: 10px;">Tambah Data Distribusi Zakat</p>
                
                <div class="col-1 col-sm-8 bg-secondary" style="margin-bottom: 50px;">
                    <form method="post" action="cek_distribusi.php">
                        <div class="form-group">
                            <label for="nama">Nama Penerima</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                <option value=""> -- Masukan Pilihan -- </option>
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
                            <input type="number" class="form-control" placeholder="Masukan Jumlah Tanggungan" name="jml_tanggungan" required>
                        </div>

                        <div class="form-group">
                            <label for="besar">Nominal Beras</label>
                            <input type="float" class="form-control" placeholder="Masukan Nominal Beras" name="besar" required>
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
                </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
</body>
</html>