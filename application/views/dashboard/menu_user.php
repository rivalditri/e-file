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

    <title>E-Filling Perumda Tugu Tirta</title>

    <!-- CSS FILES -->
    <link href="<?= base_url('vendor/user/') ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/templatemo-kind-heart-charity.css" rel="stylesheet">
    <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">


    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="<?= base_url('vendor/user/') ?>images/logo.png" class="logo img-fluid"
                    alt="Kind Heart Charity">
                <span>
                    Helllo, User
                    <small>Direktur Utama(Jabatan)</small>
                </span>

                <div id="mm2" style="width:100px;">

                    <div style="float: center;">
                        <a href="<?= base_url('auth/logout') ?>">LogOut</a>
                    </div>
                </div>
            </a>


        </div>
    </nav>

    <main>



        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-8 text-center mx-auto">
                        <h2 class="mb-5">Welcome to E-Filling Perumda Tugu Tirta</h2>
                    </div>


                    <div class="col-lg-3 col-md-6 col-12 mb-4 ">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#" class="d-block">
                                <img src="<?= base_url('vendor/user/') ?>images/icons/folder1.png"
                                    class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"> Data <strong>Pribadi</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 ">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="<?= base_url('sk') ?>" class="d-block">
                                <img src="<?= base_url('vendor/user/') ?>images/icons/folder1.png" class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"> Surat <strong>Keputusan</strong></p>
                            </a>
                        </div>
                    </div>

                    <!-- <div class="col-lg-2 col-md-6 col-8 mb-4 ">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#" class="d-block">
                                <img src="<?= base_url('vendor/user/') ?>images/icons/data1.png"
                                    class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"> Data <strong>1</strong></p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-12 mb-4 ">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#" class="d-block">
                                <img src="<?= base_url('vendor/user/') ?>images/icons/data2.png"
                                    class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"> Data <strong>1</strong></p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12 mb-4 ">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#" class="d-block">
                                <img src="<?= base_url('vendor/user/') ?>images/icons/data.png"
                                    class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"> Data <strong>1</strong></p>
                            </a>
                        </div>
                    </div> -->

                    <div class="col-lg-3 col-md-6 col-12 mb-4 ">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="menu_sk" class="d-block">
                                <a href="menu_sk.php" class="d-block">
                                    <img src="<?= base_url('vendor/user/') ?>images/icons/surat.png"
                                        class="featured-block-image img-fluid" alt="">

                                    <p class="featured-block-text"> <strong> Ijazah</strong></p>
                                </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="detail_data.html" class="d-block">
                                <img src="<?= base_url('vendor/user/') ?>images/icons/folder2.png"
                                    class="featured-block-image img-fluid" alt="">

                                <p class="featured-block-text"> <strong>Sertifikat</strong></p>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main>



    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url('vendor/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/jquery.sticky.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/click-scroll.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/counter.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/custom.js"></script>

</body>

</html>