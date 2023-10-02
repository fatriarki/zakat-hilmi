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
    <title>Beranda</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
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
        <div class="page-content inset">
          <div class="row">
              <div class="col-md-12">
              <p class="well lead" style="margin-top: 10px;">Beranda</p>
            </div>
          </div>
        </div>

        <div class="page-content inset">
          <div class="jumbotron" style="margin: 20px 20px 20px 20px; padding: 20px 20px 20px 20px">
              <h2 class="text-center">
              Aplikasi Zakat Fitrah 
              </h2>
              <h3 class="text-center">
              Aplikasi php sederhana untuk mendata pembayaran Zakat
              </h3>
              <br>
              <p>
                Apa Itu Zakat?<br>
                  <ul>
                    Zakat berasal dari bahasa Arab yang artinya menyucikan. Zakat adalah bentuk sedekah kepada umat islam. Zakat diperlakukan dalam islam sebagai kewajiban atau seperti pajak. Di dalam rukun Islam, berzakat ada di urutan ketiga, setelah sholat. Meskipun zakat diwajibkan bagi umat islam, tidak semua orang bisa berzakat. Ada beberapa syarat untuk berzakat, misalnya memiliki harta yang cukup atau tidak kekurangan.<br>
                    Dalam pandangan Islam, memberikan hartanya kepada orang lain yang membutuhkan bisa mensucikan jiwa mereka dan juga sebagai pengingat bahwa harta itu bukanlah milik mereka, namun milik Allah SWT yang dititipkan kepada mereka. Umat Islam percaya bahwa semakin banyak memberi maka Allah SWT akan memberikan nya berkali-kali lipat di akhirat.
                  </ul>
              </p>
          </div>
        </div>
        
      </div>
      
    </div>
</body>
</html>