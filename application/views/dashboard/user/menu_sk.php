<?php
//if session nip is not set, redirect to auth
if (!isset($_SESSION['nip'])) {
    redirect('auth');
} else {
    //if session nip is set, check role_id
    if ($_SESSION['role_id'] != 0) {
        redirect('admin');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $title ?>
    </title>

    <!-- CSS FILES -->
    <link href="<?= base_url('vendor/user/') ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/templatemo-kind-heart-charity.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/datatables.min.css" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">
    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
    
    <div class="col-3" style="width:0px;">
    <a class="bx bxs-log-out" href="<?= base_url('User') ?>">Back</a>
    </div>

        <div class="container">
            <a class="navbar-brand" href="<?= base_url('User') ?>">
                <img src="<?= base_url('vendor/user/') ?>images/logo.png" class="logo img-fluid"
                    alt="E-link Perumda Tugu Tirta">
                <span>
                    Helllo, User
                    <small>Direktur Utama(Jabatan)</small>
                </span>
            </a>


        </div>
    </nav>
    
    <main>
        <section class="section-padding">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-12 col-8 text-center mx-auto">
                        <h2 class="mb-5">Surat Keputusan Perumda Tugu Tirta</h2>
                    </div>

                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Dokumen</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Kode Jabatan</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dokumen as $dok): ?>
                                <tr>
                                    <td>
                                        <?= $dok['nama_dokumen'] ?>
                                    </td>
                                    <td>
                                        <?= $dok['nip'] ?>
                                    </td>
                                    <td>
                                        <?= $dok['nama_karyawan'] ?>
                                    </td>
                                    <td>
                                        <?= $dok['kode_jabatan'] ?>
                                    </td>
                                    <td>
                                        <?= $dok['jabatan'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">

<div class="section  container clearfix mx-auto nomargin nopadding">
    <style>
        #kantorperumdatugutirta { width: 100%; height: 300px;}
    </style>
    <div class="row col-mb-50">
            <div class="col-lg-4">
                 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
                   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
                   crossorigin=""/>
                   
                <!-- Make sure you put this AFTER Leaflet's CSS -->
                 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                   crossorigin=""></script>
                   
                <div id="kantorperumdatugutirta"></div>
                <script>
                     
                    var map = L.map('kantorperumdatugutirta').setView([-7.9679572,112.6519638], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    
                    L.marker([-7.966977,112.6374427])
                    .addTo(map)
                    .bindPopup('Kantor Unit Panglima Sudirman.')
                    .openPopup();
                    
                    L.marker([-7.9711973,112.6677675])
                    .addTo(map)
                    .bindPopup('Kantor Pusat Sawojajar.')
                    .openPopup();
                </script>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <h5 class="site-footer-title mb-3">Link Terkait</h5>

                <ul class="footer-menu">
                    <li class="footer-menu-item"><a href="http://www.malangkota.go.id/" alt="Pemerintah Kota Malang">Pemerintah Kota Malang</a></li>

                    <li class="footer-menu-item"><a href="http://sambat.malangkota.go.id/" alt="Sambat Kota Malang">Sambat Online Kota Malang</a></li>

                    <li class="footer-menu-item"><a href="http://www.lapor.go.id/" alt="lapor.go.id">Lapor.go.id</a></li>

                    <li class="footer-menu-item"><a href="http://lpse.pdamkotamalang.com/" alt="LPSE Perumda Tugu Tirta Kota Malang">LPSE Perumda Tugu Tirta Kota Malang</a></li>

                    <li class="footer-menu-item"><a href="https://cettar.jatimprov.go.id/" alt="Cettar Pemprov Jatim">Cettar Pemprov Jatim</a></li>
                </ul>
            </div>            


<div class="col-lg-3 col-md-6 col-12 mx-auto">
    <h5 class="site-footer-title mb-3">Contact Infomation</h5>

    <p class="text-white d-flex mb-2">
        <i class="bi-telephone me-2"></i>

        <a href="tel: (+62) 0341-715-103" class="site-footer-link">
            (+62) 0341-715-103
        </a>
    </p>

    <p class="text-white d-flex">
        <i class="bi-envelope me-2"></i>

        <a href="mailto:humas@perumdatugutirta.co.id" class="site-footer-link">
            humas@perumdatugutirta.co.id
        </a>
    </p>

    <p class="text-white d-flex mt-3">
        <i class="bi-geo-alt me-2"></i>
        Jl. Terusan Danau Sentani no. 100 Kota Malang - Jawa Timur, Indonesia.
    </p>

    <a href="#" class="custom-btn btn mt-3">Get Direction</a>
</div>
</div>
</div>

<div class="site-footer-bottom">
<div class="container">
<div class="row">
    <div id="copyrights">
        <div class="container">
            
            <div class="row col-mb-30">
                <div class="col-md-6 text-center text-md-left">
                    Copyrights &copy; 2020 All Rights Reserved by PERUMDA Air Minum Tugu Tirta<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>


    <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
        <ul class="social-icon">
            <li class="social-icon-item">
                <a href="https://twitter.com/tugutirtamalang" class="social-icon-link bi-twitter"></a>
            </li>

            <li class="social-icon-item">
                <a href="https://www.facebook.com/profile.php?id=100010269646736" class="social-icon-link bi-facebook"></a>
            </li>

            <li class="social-icon-item">
                <a href="https://www.instagram.com/perumdatugutirta/" class="social-icon-link bi-instagram"></a>
            </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
            <li class="social-icon-item">
                <a href="https://www.youtube.com/channel/UCcEKUrpMLqX_r4aoNCkyz3g" class="social-icon-link bi-youtube"></a>
            </li>
        </ul>
    </div>

</div>
</div>
</div>
</footer>

    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url('vendor/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/jquery.sticky.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/click-scroll.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/counter.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/custom.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatables').DataTable();
        });
    </script>
</body>

</html>