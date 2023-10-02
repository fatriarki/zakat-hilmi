<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Zakat</title>
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
                <p class="well lead" style="margin-top: 10px;">Tambah Data Zakat</p>
                
                <div class="col-1 col-sm-8 bg-secondary" style="margin-bottom: 50px;">
                    <form method="post" action="cek_tambah_data.php">
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
                            <input type="number" class="form-control" placeholder="Masukan Jumlah" name="nominal" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="tanggungan">Jumlah(tanggungan)</label>
                            <input type="float" class="form-control" placeholder="Masukan Jumlah" id= "jml2" onchange = "update()" name="tanggungan" required>
                        </div>
                        <div class="form-group">
                            <label for="nominal">nominal</label>
                            <input type="float" class="form-control" placeholder="Masukan Jumlah" name="nominal" required>
                        </div> -->
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama_lengkap" required>
                        </div>
                        <div>
                            <input type="submit" id="button-login" name="button-login" class="btn btn-primary" style="min-width: 100px;">
                            <input type="reset" value="Batal" id="button-login" name="button-login" class="btn btn-primary" style="min-width: 100px;">
                        </div>
                        
                    </form>
                    <!-- <script type="text/javascript">
                        var jmlDibayarInput = document.getElementById('jml2');
                        var bayarBerasInput = document.getElementById('input');
                        var bayarUangInput = document.getElementById('inputs');
                        jmlDibayarInput.addEventListener('input', function() {
                        var jmlDibayar = parseFloat(jmlDibayarInput.value);
                        var satuanBeras = 2.5; // Satuan beras per tanggungan (kg)
                        var satuanUang = 10000; // Satuan uang per tanggungan (Rp)
                        var bayarBeras = jmlDibayar  * satuanBeras;
                        var bayarUang = jmlDibayar * satuanUang;
                        bayarBerasInput.value = bayarBeras + ' '+'Kg';
                        bayarUangInput.value = bayarUang ;

                        });
                    </script> -->
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>