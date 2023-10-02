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
    <title>Master Data Muzakki</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/menu.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    
    //cek notifikasi
    if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "berhasil_hapus_data"){
            echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
        }else if($_GET['pesan'] == 'gagal_hapus_data'){
            echo "<script type='text/javascript'>alert('Gagal Menghapus Data');</script>";
        }else if($_GET['pesan'] == 'berhasil_ubah_data'){
            echo "<script type='text/javascript'>alert('Berhasil Mengubah Data');</script>";
        }else if($_GET['pesan'] == 'gagal_ubah_data'){
            echo "<script type='text/javascript'>alert('Gagal Mengubah Data');</script>";
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
            <div class="row>
                <div class="col-md-12">
                    <p class="well lead">Master Data Muzakki</p>
                </div>
            </div>
            <div class="row" style="margin-left: 8px;">
                <div class="col-md-12">
                    <button class='btn btn-primary glyphicon glyphicon-add' onclick="location.href='tambah_muzakki.php'"> Tambah</button>
                </div>
            </div>
            
            <div id="data_zakat" style='margin: 20px 20px 20px 20px;'>
                <?php
                $sql = "SELECT * FROM muzakki"; 
                $i = 1;
                if ($res = mysqli_query($koneksi, $sql)) { 
                    if (mysqli_num_rows($res) > 0) { 
                        echo "<table class='table table-striped'>"; 
                        echo "<thead><tr class='bg-primary'; text-light'>"; 
                        echo "<th scope='col' style='max-width: 30px;'>No.</th>"; 
                        echo "<th scope='col' style='max-width: 150px;'>Nama muzakki</th>"; 
                        echo "<th scope='col' style='max-width: 150px;'>Jumlah Tanggungan</th>"; 
                        echo "<th scope='col' style='max-width: 150px;'>Uang</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Beras</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Jumlah bayar</th>";
                        echo "<th scope='col' style='max-width: 150px;'>Edit</th>";
                        echo "</thead></tr>"; 
                        while ($row = mysqli_fetch_array($res)) { 
                            echo "<tbody><tr>";
                            echo "<th scope='row'>$i</th>"; 
                            echo "<td>".$row['nama_muzakki']."</td>";
                            echo "<td>".$row['jml_tanggungan']."</td>";
                            echo "<td>".$row['uang']."</td>";
                            echo "<td>".$row['beras']." Kg</td>";
                            echo "<td>".$row['jml_bayar']."</td>";
                            $i++;
                            ?>
                            <td>
                            <button class='btn btn-info glyphicon glyphicon-edit' onclick="location.href='edit_muzakki.php?id_muzakki=<?php echo $row['id_muzakki'] ?>'">Ubah</button>
                            <button class='btn btn-danger glyphicon glyphicon-trash' onclick="location.href='hapus_muzakki.php?id_muzakki=<?php echo $row['id_muzakki'] ?>'">Hapus</button>
                            </td>
                            </tbody></th></tr>
                        <?php }
                        echo "</table>"; 
                    } 
                    else { 
                        echo "Belum Ada Data"; 
                    } 
                } 
                else { 
                    echo "ERROR: Could not able to execute $sql. ".mysqli_error($koneksi); 
                } 

                ?>
            </div>
        </div>
    </div>


</body>
</html>