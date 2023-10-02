<?php
    include "koneksi.php";
    include "function.php";
$querycetak = "SELECT * FROM tb_pembayaran_zakat";
$cetak = mysqli_query($koneksi, $querycetak);

// ambil data dari URL
$id_pembayaran = $_GET["cetak_laporan"];
//Query data guru berdasarkan id
$bayar = query("SELECT * FROM tb_pembayaran_zakat  WHERE id_pembayaran = $id_pembayaran")[0];
    date_default_timezone_set('Asia/Jakarta'); 
    $today = date("d-m-Y");

    date_default_timezone_set('Asia/Jakarta'); 
    $today = date("d-m-Y");
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
		<script>
			function generatePDF() {
			const element = document.getElementById('containet');
			var opt = {
				  margin:       0.2,
				  filename:     '<?= $bayar['nama_lengkap']; ?>.pdf',
				  image:        { type: 'jpeg', quality: 0.98 },
				  html2canvas:  { scale: 2 },
				  jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
				};
				// Choose the element that our invoice is rendered in.
				html2pdf().set(opt).from(element).save();
			}
		</script>
		</head>
	<body style="font-family: 'Work Sans', sans-serif;">
    <div class="container_content" id="container_content" >
        <div style="border: 1px black solid; width: 700px; padding: 10px;">
            <div style="display: flex;">
                <img src="./assets/img/zakat.png" alt="" style="width: 200px; height: 100px;">
                <div>
                    <h3 style="font-weight: 700;">Amil Zakat</h3>
                    <p>Badan Zakat Lokal</p>
                    <p>Indonesia</p>
                </div>
            </div>
            <hr>
            <h4 style="font-weight: 700; text-align: center; text-decoration: underline;">Tanda Bukti Pembayaran</h4>

            <p>Telah Diterima Dari : <?= $bayar["nama_lengkap"]; ?></p>
            <p><?= $bayar["kategori"]; ?> sebesar <?= $bayar["nominal"]; ?>,-</p>
            <p>Untuk Pembayaran : <?= $bayar['jenis']; ?></p>
            
            <div style="text-align: right;">
                <p style="font-weight: 700;"><?=$today?></p>
                <img src="./img/ttd.png" alt="" style="height: 100px; margin-right: 20px; border-bottom: 1px black solid; text-align: center;">
                <p style="margin-top: 10px; margin: 10px; font-weight: 700;">Amil Zakat</p>
            </div>
        </div>
    </div>
    <script>
        generatePDF();
    </script>
    <meta="refresh" content="0.2;url=./list_data.php" />
</body>
</html>