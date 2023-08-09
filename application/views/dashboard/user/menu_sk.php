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